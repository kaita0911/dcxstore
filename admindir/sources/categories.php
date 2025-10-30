<?php
$act = $_REQUEST['act'] ?? '';
$comp = intval($_GET['comp'] ?? 0);

// // Lấy danh sách ngôn ngữ
// $languages = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.language WHERE active=1 ORDER BY id ASC");
// $smarty->assign("languages", $languages);

// ==========================
// Xây cây danh mục dựa vào bảng categories_related
// ==========================
function buildCategoryTree($comp, $level = 0, $excludeId = 0)
{

    // Lấy tất cả danh mục của component này
    $allCategories = $GLOBALS['sp']->getAll("
    SELECT * FROM {$GLOBALS['db_sp']}.categories 
    WHERE comp = {$comp} 
    " . ($excludeId ? "AND id <> {$excludeId}" : "") . " 
    ORDER BY num DESC");

    // Map danh mục theo id để dễ tra
    $catMap = [];
    foreach ($allCategories as $cat) {
        $catMap[$cat['id']] = $cat;
    }

    // Lấy toàn bộ quan hệ cha–con từ bảng categories_related
    $relations = $GLOBALS['sp']->getAll("
        SELECT category_id, related_id 
        FROM {$GLOBALS['db_sp']}.categories_related
    ");

    // Gắn danh mục con vào danh mục cha
    $childrenMap = [];
    foreach ($relations as $rel) {
        $childrenMap[$rel['related_id']][] = $rel['category_id'];
    }
    $language_id = $_SESSION['admin_lang'] ?? '1';
    // Hàm đệ quy dựng cây
    $build = function ($parentIds, $level, $parent_id = 0) use (&$build, &$catMap, &$childrenMap, &$excludeId, $language_id) {
        $tree = [];
        foreach ($parentIds as $pid) {

            // ❌ Bỏ qua chính danh mục đang edit
            if ($pid == $excludeId) continue;

            if (!isset($catMap[$pid])) continue;
            $cat = $catMap[$pid];

            //Thêm thông tin ngôn ngữ
            $detail = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.categories_detail WHERE categories_id = {$cat['id']} AND languageid = {$language_id}");
            //$cat['details'][1]['name'] ?? $cat['name'];

            if (is_array($detail) && !empty($detail)) {
                $cat['details'] = $detail;
            } else {
                // fallback: tạo mảng detail từ dữ liệu chính
                $cat['details'] = $cat;
            }
            // var_dump($cat['details']);
            // exit;
            // Thêm thông tin cấp và cha
            $cat['level'] = $level;
            $cat['parent_id'] = $parent_id; // ✅ thêm parent_id ở đây


            // Nếu có con, đệ quy
            if (isset($childrenMap[$pid])) {
                $cat['children'] = $build($childrenMap[$pid], $level + 1, $pid);
            } else {
                $cat['children'] = [];
            }

            $tree[] = $cat;
        }
        return $tree;
    };

    // Xác định danh mục gốc (những cái không phải là category_id trong bảng quan hệ)
    $allIds = array_column($allCategories, 'id');
    $childIds = array_column($relations, 'category_id');
    $rootIds = array_diff($allIds, $childIds);

    // Dựng cây từ danh mục gốc
    return $build($rootIds, 0, 0);
}


// ==========================
// Lấy các category đã liên quan (khi edit)
// ==========================
$categoryRelatedIds = [];
if ($act === 'edit') {
    $id = intval($_GET['id'] ?? 0);
    $categoryRelatedIds = $GLOBALS['sp']->getCol("
        SELECT related_id 
        FROM {$GLOBALS['db_sp']}.categories_related 
        WHERE category_id = {$id}
    ");
}
$smarty->assign("categoryRelatedIds", $categoryRelatedIds);


// ==========================
// Xử lý action
// ==========================
switch ($act) {
    case 'edit':
        $id = intval($_GET['id'] ?? 0);
        $language_id = $_SESSION['admin_lang'] ?? '1';
        $category = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.categories WHERE id={$id}");
        $categoryDetail = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.categories_detail WHERE categories_id={$id} AND languageid = {$language_id}");
        $categories = buildCategoryTree($comp, 0, $id);
        $smarty->assign([
            "category" => $category,
            "categoryDetail" => $categoryDetail,
            "categories" => $categories
        ]);
        $template = "categories/edit.tpl";
        break;

    case 'add':
        $categories = buildCategoryTree($comp);
        $smarty->assign([
            "categories" => $categories
        ]);
        $template = "categories/create.tpl";
        break;

    case 'addsm':
    case 'editsm':
        saveCategory();
        page_transfer2("index.php?do=categories&comp={$comp}");
        exit;

    case 'dellistajax':
        ob_clean(); // Xóa mọi thứ đã in ra trước đó
        $ids = $_POST['cid'] ?? '';
        if ($ids !== '') {
            $idList = implode(',', array_map('intval', explode(',', $ids)));

            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.categories WHERE id IN ($idList)");
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.categories_detail WHERE categories_id IN ($idList)");
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.categories_related WHERE category_id IN ($idList)");

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;
    case 'updatenumajax':
        ob_clean();
        $id = intval($_POST['id'] ?? 0);
        if ($id <= 0) {
            echo json_encode(['success' => false, 'message' => 'ID không hợp lệ']);
            exit;
        }

        try {
            $row = $GLOBALS['sp']->getRow("
                SELECT MAX(num) AS maxnum 
                FROM {$GLOBALS['db_sp']}.categories
            ");
            $maxNum = intval($row['maxnum'] ?? 0);
            $newNum = $maxNum + 1;

            $GLOBALS['sp']->execute("
                UPDATE {$GLOBALS['db_sp']}.categories 
                SET num = {$newNum} 
                WHERE id = {$id}
            ");

            $item = $GLOBALS['sp']->getRow("
                SELECT id, name_vn, num, active 
                FROM {$GLOBALS['db_sp']}.categories 
                WHERE id = {$id}
            ");

            echo json_encode([
                'success' => true,
                'newNum' => $newNum,
                'item' => $item
            ]);
        } catch (Exception $e) {
            error_log("updatenumajax error: " . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'Lỗi server: ' . $e->getMessage()
            ]);
        }
        exit;

    case 'order':
        ob_clean(); // Xóa tất cả output trước đó
        $ids = $_POST['id'] ?? [];
        $ordering = $_POST['numOrder'] ?? [];

        //header('Content-Type: application/json');

        if (!empty($ids) && !empty($ordering) && count($ids) === count($ordering)) {
            $cases = '';
            $idList = [];

            for ($i = 0; $i < count($ids); $i++) {
                $idInt = intval($ids[$i]);
                $num = intval($ordering[$i]);
                $cases .= "WHEN {$idInt} THEN {$num} ";
                $idList[] = $idInt;
            }

            if (!empty($idList)) {
                $idsString = implode(',', $idList);
                $sql = "UPDATE {$GLOBALS['db_sp']}.categories 
                            SET num = CASE id {$cases} END 
                            WHERE id IN ({$idsString})";

                $res = $GLOBALS["sp"]->execute($sql);

                if ($res !== false) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Cập nhật thất bại!']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Danh mục không hợp lệ!']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Không có dữ liệu để sắp xếp!']);
        }
        exit;

    default:
        $categories = buildCategoryTree($comp);
        $smarty->assign("categories", $categories);
        $template = "categories/list.tpl";
        break;
}

$smarty->assign([
    "comp" => $comp,
    "tabmenu" => 0
]);
$smarty->display("header.tpl");
$smarty->display($template);
$smarty->display("footer.tpl");

// ==========================
// Hàm lưu category
// ==========================
function saveCategory()
{


    global $act, $languages;
    $language_id = $_SESSION['admin_lang'] ?? '1';
    $id = intval($_POST['id'] ?? 0);
    $comp = intval($_POST['comp'] ?? 0);
    $name_vn = trim($_POST["name"] ?? '');

    // 1️⃣ Tính num tự động nếu thêm mới
    if ($act === 'addsm') {
        $maxNum = $GLOBALS['sp']->getOne("SELECT MAX(num) FROM categories");
        $newNum = $maxNum ? $maxNum + 1 : 1;
    } else {
        $newNum = intval($_POST["num"] ?? 0); // cập nhật nếu chỉnh sửa
    }

    $arr = [
        'link'      => trim($_POST["link"] ?? ''),
        'type'      => trim($_POST['type'] ?? ''),
        'menutren'  => !empty($_POST['menutren']) ? 1 : 0,
        'menusp'    => !empty($_POST['menusp']) ? 1 : 0,
        'home'      => !empty($_POST['home']) ? 1 : 0,
        'active'    => !empty($_POST['active']) ? 1 : 0,
        'comp'      => $comp,
        'num'       => $newNum,
        'name_vn'   => $name_vn,
    ];

    // 2️⃣ Upload ảnh
    if (!empty($_FILES['img_vn']['name']) && $_FILES['img_vn']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['img_vn'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $filename = 'trg-' . time() . rand(1000, 9999) . '.' . $ext;
        $uploadDir = "../hinh-anh/cate/";
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);
        $uploadPath = $uploadDir . $filename;
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            $arr['img_vn'] = "hinh-anh/cate/" . $filename;
        }
    }

    // 3️⃣ Giữ ảnh cũ nếu edit và không chọn file mới
    if ($act !== 'addsm') {
        $currentImg = $GLOBALS["sp"]->getOne("SELECT img_vn FROM categories WHERE id=$id");
        if (!isset($arr['img_vn']) || $arr['img_vn'] === '') {
            $arr['img_vn'] = $currentImg;
        }
    }
    if ($act === 'addsm') {
        vaInsert('categories', $arr);
        $id = $GLOBALS['sp']->Insert_ID(); // ✅ Lấy ID mới insert
    } else {
        vaUpdate('categories', $arr, "id=$id");
    }


    // Lưu ngon ngu tu session
    $language_id = $_SESSION['admin_lang'] ?? '1';
    // Lấy thông tin từ form
    $name        = trim($_POST['name'] ?? '');
    $content     = trim($_POST['content'] ?? '');
    $keyword     = trim($_POST['keyword'] ?? '');
    $des         = trim($_POST['des'] ?? '');
    // Bỏ qua nếu không có tên
    if ($name === '') {
        // xử lý lỗi hoặc return
        exit('Tên bài viết không được để trống');
    }
    // Tạo unique_key
    $unique_key = trim($_POST['unique_key'] ?? '') ?: StripUnicode($name);
    $exists = $GLOBALS["sp"]->getOne(
        "SELECT COUNT(*) FROM {$GLOBALS['db_sp']}.categories_detail WHERE unique_key='{$unique_key}'"
            . ($id ? " AND categories_id<>$id" : '')
    );
    $unique_key_final = $exists ? $unique_key . "-$id" : $unique_key;
    // Mảng lưu dữ liệu
    $arrDetail = [
        'categories_id' => $id,
        'languageid'     => $language_id,
        'name'           => $name,
        'unique_key'     => $unique_key_final,
        'content'        => $content,
        'keyword'        => $keyword,
        'des'            => $des
    ];
    // Kiểm tra đã tồn tại bản ghi cho categories_id + languageid chưa
    $detail = $GLOBALS["sp"]->getRow(
        "SELECT * FROM {$GLOBALS['db_sp']}.categories_detail WHERE categories_id=$id AND languageid=$language_id"
    );
    if ($detail) {
        vaUpdate('categories_detail', $arrDetail, "id={$detail['id']}");
    } else {
        vaInsert('categories_detail', $arrDetail);
    }

    $parentIds = $_POST['parentids'] ?? [];

    // 1️⃣ Xóa toàn bộ quan hệ cũ
    $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.categories_related WHERE category_id = $id");

    // 2️⃣ Chỉ lưu cha mới (người dùng trực tiếp chọn)
    $filteredParents = array_filter($parentIds, fn($pid) => $pid != $id);

    // 3️⃣ Insert cha mới
    foreach ($filteredParents as $pid) {
        vaInsert('categories_related', [
            'category_id' => $id,
            'related_id'  => intval($pid),
            'is_parent'   => 0
        ]);
    }
}
