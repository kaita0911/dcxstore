
<?php
// ============================
// Controller: articlelist.php
// ============================
require_once "functions/categories.php"; // ✅ gọi hàm buildCategoryTree()
require_once "functions/pagination.php"; // ✅ gọi phan trang
global $db_sp, $sp;

// ============================
// 🧩 Lấy act & URL hiện tại
// ============================
$act = $_REQUEST['act'] ?? '';
$comp = intval($_GET['comp'] ?? 0);
$page = intval($_GET['page'] ?? 1);
$id = intval($_GET['id'] ?? 0);


// ============================
// 🧱 Lấy dữ liệu cơ bản
// ============================
$tinhnang = $sp->getRow("SELECT * FROM {$GLOBALS['db_sp']}.component WHERE id = {$comp}");
$smarty->assign('tinhnang', $tinhnang);

// Lấy ID bài viết (edit)
$id = intval($_GET['id'] ?? 0);

////get Thương hiệu
function saveArticleBrand($article_id, $brand_id)
{
    // Xóa thương hiệu cũ của bài viết (nếu có)
    $GLOBALS['sp']->execute("DELETE FROM {$GLOBALS['db_sp']}.articlelist_brands WHERE articlelist_id = ?
          AND brands_id IN (SELECT id FROM {$GLOBALS['db_sp']}.categories WHERE comp = 76)
    ", [$article_id]);

    // Nếu người dùng chọn thương hiệu mới → lưu lại
    if (!empty($brand_id)) {
        $GLOBALS['sp']->execute("INSERT INTO {$GLOBALS['db_sp']}.articlelist_brands (articlelist_id, brands_id)
            VALUES (?, ?)
        ", [$article_id, $brand_id]);
    }
}

function getBrandsForArticle($article_id)
{
    $language_id = $_SESSION['admin_lang'] ?? 1;

    // Lấy tất cả thương hiệu
    $brands = $GLOBALS['sp']->getAll("
        SELECT c.*, cd.name AS detail_name
        FROM {$GLOBALS['db_sp']}.categories c
        LEFT JOIN {$GLOBALS['db_sp']}.categories_detail cd
            ON cd.categories_id = c.id
           AND cd.languageid = ?
        WHERE c.comp = 76
        ORDER BY c.num ASC
    ", [$language_id]);

    // Lấy thương hiệu mà bài viết đang chọn
    $selectedBrandId = $GLOBALS['sp']->getOne("
        SELECT brands_id
        FROM {$GLOBALS['db_sp']}.articlelist_brands
        WHERE articlelist_id = ?
          AND brands_id IN (
              SELECT id FROM {$GLOBALS['db_sp']}.categories WHERE comp = 76
          )
        LIMIT 1
    ", [$article_id]);

    return [
        'brands' => $brands,
        'selectedBrandId' => $selectedBrandId
    ];
}
// Lấy danh sách thương hiệu + thương hiệu hiện tại
$brandData = getBrandsForArticle($article_id);

$smarty->assign('brands', $brandData['brands']);
$smarty->assign('selectedBrandId', $brandData['selectedBrandId']);
// ============================
// 🔹 Lấy danh mục đã chọn (bao gồm cha)
// ============================
$selected = [];
if ($id) {
    // Lấy các category đã lưu cho article này
    $selected = $GLOBALS['sp']->getCol("
        SELECT categories_id 
        FROM {$GLOBALS['db_sp']}.articlelist_categories 
        WHERE articlelist_id = {$id}
    ");

    // Lấy bảng quan hệ cha-con
    $relations = $GLOBALS['sp']->getAll("SELECT category_id, related_id FROM {$GLOBALS['db_sp']}.categories_related");
    $parentMap = [];
    foreach ($relations as $rel) {
        $parentMap[$rel['category_id']] = $rel['related_id'];
    }

    // Build tất cả cha của các category đã chọn
    $finalSelected = [];
    $getAllParents = function ($catId) use (&$parentMap) {
        $parents = [];
        $current = $catId;
        while (isset($parentMap[$current]) && $parentMap[$current] > 0) {
            $parents[$parentMap[$current]] = $parentMap[$current];
            $current = $parentMap[$current];
        }
        return $parents;
    };

    foreach ($selected as $catId) {
        $finalSelected[$catId] = $catId;
        $parents = $getAllParents($catId);
        foreach ($parents as $pid) {
            $finalSelected[$pid] = $pid;
        }
    }

    $selected = array_values($finalSelected);
}

$smarty->assign('selected', $selected);

// ============================
// 🔹 Build danh mục cây
// ============================
$categories = buildCategoryTree($comp, 0, $id);
$smarty->assign('categories', $categories);

// ============================
// 🔁 Xử lý các hành động
// ============================
switch ($act) {
    /////////Xoa nhieu anh//////////
    case 'deleteimage':
        ob_clean();
        $id = intval($_POST['id'] ?? 0);
        if ($id > 0) {
            // Lấy đường dẫn file ảnh
            $row = $GLOBALS['sp']->getRow("SELECT img_vn FROM {$GLOBALS['db_sp']}.gallery_sp WHERE id=$id");
            if ($row) {
                $filePath = '../' . $row['img_vn'];
                if (file_exists($filePath)) unlink($filePath); // xóa file
                $GLOBALS['sp']->query("DELETE FROM {$GLOBALS['db_sp']}.gallery_sp WHERE id=$id"); // xóa DB
            }
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;

    case 'edit':
        $id = intval($_GET['id'] ?? 0);
        $brands = getBrandsForArticle($id);
        $smarty->assign('selectedBrandId', $brands['selectedBrandId']);
        $language_id = $_SESSION['admin_lang'] ?? '1';
        // thuộc tính
        $rs_properties = $sp->getAll("SELECT * FROM {$GLOBALS['db_sp']}.properties_component WHERE comp_id = {$comp} ORDER BY properties_id ASC");
        $smarty->assign('namethuoctinh', $rs_properties);
        $smarty->assign('check_count_thuoctinh', count($rs_properties));

        // danh mục cha
        $cats = $sp->getAll("SELECT * FROM {$GLOBALS['db_sp']}.categories WHERE active=1 AND comp={$comp}");
        $smarty->assign('checkcatdm', count($cats));

        // Lấy danh sách hình
        $rs_multi = $sp->getAll("SELECT * FROM {$GLOBALS['db_sp']}.gallery_sp WHERE articlelist_id={$id} ORDER BY num ASC");
        $smarty->assign('multiimages', $rs_multi);
        $smarty->assign('count_multi_images', count($rs_multi));

        ///Chi tiet////
        $id = intval($_GET['id'] ?? 0);
        $articlelist = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.articlelist WHERE id={$id}");
        $articlelistDetail = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.articlelist_detail WHERE articlelist_id = {$id} AND languageid = {$language_id}");
        $priceRow = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.articlelist_price WHERE articlelist_id={$id}");

        // ✅ Format giá khi ra smarty
        if ($priceRow) {
            $priceRow['price']     = number_format($priceRow['price'] ?? 0, 0, ',', '.');
            $priceRow['priceold']  = number_format($priceRow['priceold'] ?? 0, 0, ',', '.');
        }

        $smarty->assign([
            "articlelistDetail" => $articlelistDetail,
            "articlelist" => $articlelist,
            "articlelistPrice"   => $priceRow
        ]);

        $template = 'articlelist/edit.tpl';
        break;


    case 'add':
        $template = 'articlelist/create.tpl';
        break;

    case 'dellistajax':
        ob_clean(); // Xóa mọi thứ đã in ra trước đó
        $ids = $_POST['cid'] ?? '';
        if ($ids !== '') {
            $idList = implode(',', array_map('intval', explode(',', $ids)));

            // 🔹 Xóa ảnh đại diện bài viết
            $thumbs = $GLOBALS["sp"]->getCol("SELECT img_thumb_vn FROM {$GLOBALS['db_sp']}.articlelist WHERE id IN ($idList)");
            foreach ($thumbs as $thumb) {
                $file = '../' . $thumb;
                if (file_exists($file)) @unlink($file);
            }

            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.articlelist_detail WHERE articlelist_id IN ($idList)");
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.articlelist WHERE id IN ($idList)");
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.articlelist_price WHERE articlelist_id IN ($idList)");
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.articlelist_categories WHERE articlelist_id IN ($idList)");
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.articlelist_brands WHERE articlelist_id IN ($idList)");

            // Xóa hình ảnh liên quan
            $images = $GLOBALS["sp"]->getCol("SELECT img_vn FROM {$GLOBALS['db_sp']}.gallery_sp WHERE articlelist_id IN ($idList)");
            foreach ($images as $img) {
                $file = '../' . $img;
                if (file_exists($file)) @unlink($file);
            }
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.gallery_sp WHERE articlelist_id IN ($idList)");

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;


    case 'refreshlistajax':
        ob_clean();
        $ids = $_POST['cid'] ?? '';
        if ($ids === '') {
            echo json_encode(['success' => false, 'message' => 'Không có ID nào được chọn!']);
            exit;
        }

        $idList = array_map('intval', explode(',', $ids));
        $now = date("Y-m-d H:i:s");
        $count = 0;

        foreach ($idList as $id) {
            $r = $sp->getRow("SELECT * FROM {$GLOBALS['db_sp']}.articlelist WHERE id={$id}");
            if (!$r) continue;

            // Sao chép bản chính
            $newArr = [
                'name_vn'     => $r['name_vn'] . ' - Copy',
                'unique_key'  => $r['unique_key'] . '-' . time(),
                'comp'        => $r['comp'],
                'active'      => $r['active'],
                'new'         => $r['new'],
                'hot'         => $r['hot'],
                'mostview'    => $r['mostview'],
                'num'         => intval($sp->getOne("SELECT MAX(num) FROM {$GLOBALS['db_sp']}.articlelist")) + 1,
                'dated'       => $now,
                'dated_edit'  => $now,
                'code'        => $r['code'],
            ];

            // Sao chép ảnh chính nếu tồn tại
            if (!empty($r['img_thumb_vn']) && file_exists('../' . $r['img_thumb_vn'])) {
                $info = pathinfo($r['img_thumb_vn']);
                $newFile = $info['filename'] . '_copy_' . time() . '.' . $info['extension'];
                $newPath = '../hinh-anh/san-pham/' . $newFile;
                @copy('../' . $r['img_thumb_vn'], $newPath);
                $newArr['img_thumb_vn'] = str_replace('../', '', $newPath);
            }

            // Thêm bản sao vào DB
            $id_new = vaInsert('articlelist', $newArr);

            // Sao chép chi tiết ngôn ngữ
            $details = $sp->getAll("SELECT * FROM {$GLOBALS['db_sp']}.articlelist_detail WHERE articlelist_id={$id}");
            foreach ($details as $dt) {
                vaInsert('articlelist_detail', [
                    'articlelist_id' => $id_new,
                    'languageid'     => $dt['languageid'],
                    'name'           => $dt['name'] . ' - Copy',
                    'unique_key'     => $dt['unique_key'] . '-' . time(),
                    'short'          => $dt['short'],
                    'content'        => $dt['content'],
                    'keyword'        => $dt['keyword'],
                    'des'            => $dt['des']
                ]);
            }

            // Sao chép giá
            $price = $sp->getRow("SELECT * FROM {$GLOBALS['db_sp']}.articlelist_price WHERE articlelist_id={$id}");
            if ($price) {
                vaInsert('articlelist_price', [
                    'articlelist_id' => $id_new,
                    'price'          => $price['price'],
                    'priceold'       => $price['priceold']
                ]);
            }

            $count++;
        }

        echo json_encode([
            'success' => true,
            'message' => "Đã sao chép {$count} bản ghi thành công!",
            'count'   => $count
        ]);
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
            FROM {$GLOBALS['db_sp']}.articlelist
        ");
            $maxNum = intval($row['maxnum'] ?? 0);
            $newNum = $maxNum + 1;

            $GLOBALS['sp']->execute("
            UPDATE {$GLOBALS['db_sp']}.articlelist 
            SET num = {$newNum} 
            WHERE id = {$id}
        ");

            $item = $GLOBALS['sp']->getRow("
            SELECT id, name_vn, num, active 
            FROM {$GLOBALS['db_sp']}.articlelist 
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
                $sql = "UPDATE {$GLOBALS['db_sp']}.articlelist 
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

    case 'addsm':
    case 'editsm':
        saveArticle();
        page_transfer2("index.php?do=articlelist&comp={$comp}");
        break;

    default:
        $language_id = $_SESSION['admin_lang'] ?? '1';
        // ===== Điều kiện lọc cơ bản =====
        $where = "WHERE a.comp = {$comp}";
        $join = ""; // nếu cần JOIN bảng khác thì thêm
        $order = "ORDER BY a.num DESC";

        // ==== Tham số phân trang ====
        $page = intval($_GET['page'] ?? 1);
        $per_page = 20;

        // ==== Gọi hàm paginate ====
        $result = paginate($GLOBALS["sp"], "{$GLOBALS['db_sp']}.articlelist AS a", $join, $where, $order, $page, $per_page);

        $articles = $result['data'];
        $pagination = $result['pagination'];

        // ==== Gộp chi tiết và giá ====
        $details = $GLOBALS["sp"]->getAll("SELECT * FROM {$GLOBALS['db_sp']}.articlelist_detail WHERE languageid = {$language_id}");
        $prices = $GLOBALS["sp"]->getAll("SELECT * FROM {$GLOBALS['db_sp']}.articlelist_price");

        $articlelistDetail = [];
        foreach ($details as $d) {
            $articlelistDetail[$d['articlelist_id']] = $d;
        }

        $articlelistPrice = [];
        foreach ($prices as $p) {
            $p['price'] = number_format($p['price'] ?? 0, 0, ',', '.');
            $p['priceold'] = number_format($p['priceold'] ?? 0, 0, ',', '.');
            $articlelistPrice[$p['articlelist_id']] = $p;
        }

        // Gộp detail + price vào từng bài viết trong $articles
        foreach ($articles as &$item) {
            $id = $item['id'];
            $item['details'] = $articlelistDetail[$id] ?? [];
            $item['price'] = $articlelistPrice[$id] ?? [];
        }
        unset($item);

        // ==== Truyền sang Smarty ====
        $smarty->assign('articlelist', $articles);
        $smarty->assign('pagination', $pagination);
        $template = 'articlelist/list.tpl';
        break;
}

// ============================
// 🧩 Hiển thị giao diện
// ============================
$smarty->assign('tabmenu', 0);
$smarty->display('header.tpl');
$smarty->display($template);
$smarty->display('footer.tpl');

function saveArticle(): void
{
    global $act, $comp;
    $sp    = $GLOBALS['sp'];
    $id  = intval($_POST['id'] ?? 0);
    $now = date("Y-m-d H:i:s");
    $brand_id = $_POST['brand_id'] ?? '';

    // ==== 1️⃣ Xử lý num tự động ====
    $newNum = ($act === 'addsm')
        ? (($sp->getOne("SELECT MAX(num) FROM {$GLOBALS['db_sp']}.articlelist") ?: 0) + 1)
        : intval($_POST['num'] ?? 0);

    // ==== 2️⃣ Lấy dữ liệu POST cơ bản ====
    $arr = [
        'new'         => !empty($_POST['new']) ? 1 : 0,
        'mostview'        => !empty($_POST['mostview']) ? 1 : 0,
        'active'    => !empty($_POST['active']) ? 1 : 0,
        'hot'         => !empty($_POST['hot']) ? 1 : 0,
        'num'         => $newNum,
        'comp'      => $comp,
        'dated_edit' => $now,
        'dated' => $now,
        'code'       => trim($_POST["code"] ?? ''),
        'link_out'       => trim($_POST["link_out"] ?? ''),
    ];

    // 2️⃣ Upload ảnh
    define('UPLOAD_DIR', '../hinh-anh/san-pham/'); // thư mục upload

    if (!empty($_FILES['img_thumb_vn']['name']) && $_FILES['img_thumb_vn']['error'] === UPLOAD_ERR_OK) {
        // === Xác định thư mục theo comp ===
        switch ($comp) {
            case 7:
                $uploadDir = '../hinh-anh/banner/';
                break;
            case 2:
                $uploadDir = '../hinh-anh/san-pham/';
                break;
            case 27:
                $uploadDir = '../hinh-anh/dich-vu/';
                break;
            case 10:
                $uploadDir = '../hinh-anh/du-an/';
                break;
            case 1:
                $uploadDir = '../hinh-anh/tin-tuc/';
                break;
            case 29:
                $uploadDir = '../hinh-anh/doi-tac/';
                break;
            default:
                $uploadDir = '../hinh-anh/thong-tin-chung/';
        }
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $file = $_FILES['img_thumb_vn'];
        $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $name_vn = trim($_POST['name'] ?? '');
        $slug = StripUnicode($name_vn);
        $filename = $slug . '-' . time() . '.' . $ext;
        $uploadPath = $uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            $arr['img_thumb_vn'] = str_replace('../', '', $uploadPath);
        }
    }


    // 3️⃣ Giữ ảnh cũ nếu edit và không chọn file mới
    if ($act !== 'addsm') {
        $currentImg = $GLOBALS["sp"]->getOne("SELECT img_thumb_vn FROM articlelist WHERE id=$id");
        if (!isset($arr['img_thumb_vn']) || $arr['img_thumb_vn'] === '') {
            $arr['img_thumb_vn'] = $currentImg;
        }
    }

    if ($act === 'addsm') {
        vaInsert('articlelist', $arr);
        $id = $GLOBALS['sp']->Insert_ID(); // ✅ Lấy ID mới insert
    } else {
        vaUpdate('articlelist', $arr, "id=$id");
    }

    // ==== Cập nhật num của ảnh cũ nếu kéo thả đổi vị trí ====
    $idsOld = $_POST['id_old'] ?? []; // mảng id ảnh cũ
    $numsOld = $_POST['num_old'] ?? []; // mảng num mới từ JS

    if (!empty($idsOld) && count($idsOld) === count($numsOld)) {
        foreach ($idsOld as $index => $imgId) {
            $imgIdInt = intval($imgId);
            $num = intval($numsOld[$index]);
            $GLOBALS['sp']->query("UPDATE {$GLOBALS['db_sp']}.gallery_sp SET num = $num WHERE id = $imgIdInt");
        }
    }
    if (!empty($_FILES['multiimages']['name'][0])) {
        define('UPLOAD_DIR_MULTI', '../hinh-anh/hinh-san-pham/');

        if (!is_dir(UPLOAD_DIR_MULTI)) mkdir(UPLOAD_DIR_MULTI, 0755, true);
        // Lấy num hiện tại lớn nhất của bài viết
        $maxNum = (int) $GLOBALS['sp']->getOne("SELECT MAX(num) FROM {$GLOBALS['db_sp']}.gallery_sp WHERE articlelist_id = $id");

        $files = $_FILES['multiimages'];
        $numFiles = count($files['name']);

        for ($i = 0; $i < $numFiles; $i++) {
            if ($files['error'][$i] !== UPLOAD_ERR_OK) continue;

            $ext = strtolower(pathinfo($files['name'][$i], PATHINFO_EXTENSION));
            $filename = time() . '_' . rand(1000, 9999) . '.' . $ext;
            $uploadPath = UPLOAD_DIR_MULTI . $filename;

            if (move_uploaded_file($files['tmp_name'][$i], $uploadPath)) {
                $maxNum++; // tăng num tự động
                // Lưu vào DB
                $GLOBALS['sp']->query("
                INSERT INTO {$GLOBALS['db_sp']}.gallery_sp (articlelist_id, img_vn, num)
                VALUES ($id, '" . str_replace('../', '', $uploadPath) . "', $maxNum)
            ");
            }
        }
    }


    // Lưu ngon ngu tu session
    $language_id = $_SESSION['admin_lang'] ?? '1';
    // Lấy thông tin từ form
    $name        = trim($_POST['name'] ?? '');
    $short       = trim($_POST['short'] ?? '');
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
        "SELECT COUNT(*) FROM {$GLOBALS['db_sp']}.articlelist_detail WHERE unique_key='{$unique_key}'"
            . ($id ? " AND articlelist_id<>$id" : '')
    );
    $unique_key_final = $exists ? $unique_key . "-$id" : $unique_key;
    // Mảng lưu dữ liệu
    $arrDetail = [
        'articlelist_id' => $id,
        'languageid'     => $language_id,
        'name'           => $name,
        'unique_key'     => $unique_key_final,
        'short'          => $short,
        'content'        => $content,
        'keyword'        => $keyword,
        'des'            => $des
    ];
    // Kiểm tra đã tồn tại bản ghi cho articlelist_id + languageid chưa
    $detail = $GLOBALS["sp"]->getRow(
        "SELECT * FROM {$GLOBALS['db_sp']}.articlelist_detail WHERE articlelist_id=$id AND languageid=$language_id"
    );
    if ($detail) {
        vaUpdate('articlelist_detail', $arrDetail, "id={$detail['id']}");
    } else {
        vaInsert('articlelist_detail', $arrDetail);
    }

    // ==== 6️⃣ Lưu giá vào bảng articlelist_price ====
    $price     = (int) str_replace('.', '', $_POST['price'] ?? 0);
    $priceold  = (int) str_replace('.', '', $_POST['priceold'] ?? 0);
    $priceRow = $sp->getRow("SELECT * FROM {$GLOBALS['db_sp']}.articlelist_price WHERE articlelist_id=$id");

    if ($priceRow) {
        // Update
        vaUpdate('articlelist_price', [
            'price' => $price,
            'priceold' => $priceold,
        ], "articlelist_id=$id");
    } else {
        // Insert
        vaInsert('articlelist_price', [
            'articlelist_id' => $id,
            'price' => $price,
            'priceold' => $priceold,
        ]);
    }
    // ============================
    // 💾 Lưu danh mục chọn
    // ============================
    // ============================
    // 💾 Lưu danh mục chọn (tối ưu, insert 1 query)
    // ============================
    $selectedCategories = $_POST['parentids'] ?? [];
    $categoriesToSave = [];

    if (!empty($selectedCategories)) {
        // Lấy quan hệ cha-con từ categories_related
        $relations = $GLOBALS['sp']->getAll("SELECT category_id, related_id FROM {$GLOBALS['db_sp']}.categories_related");
        $parentMap = [];
        foreach ($relations as $rel) {
            $parentMap[$rel['category_id']] = $rel['related_id']; // category_id => cha
        }

        // Hàm lấy tất cả cha của 1 category
        $getAllParents = function ($catId) use (&$parentMap) {
            $parents = [];
            $current = $catId;
            while (isset($parentMap[$current]) && $parentMap[$current] > 0) {
                $parents[$parentMap[$current]] = $parentMap[$current];
                $current = $parentMap[$current];
            }
            return $parents;
        };

        // Duyệt các category được chọn
        foreach ($selectedCategories as $catId) {
            $catId = intval($catId);
            if ($catId <= 0) continue;

            $categoriesToSave[$catId] = $catId;

            // Thêm các cha
            $parents = $getAllParents($catId);
            foreach ($parents as $pid) {
                $categoriesToSave[$pid] = $pid;
            }
        }

        $categoriesToSave = array_values($categoriesToSave); // Chuyển thành mảng số
    }

    // Lưu vào DB
    if ($id > 0) {
        // Xóa các danh mục cũ
        $GLOBALS['sp']->query("DELETE FROM {$GLOBALS['db_sp']}.articlelist_categories WHERE articlelist_id = {$id}");

        // Insert nhiều record cùng lúc
        if (!empty($categoriesToSave)) {
            $values = [];
            foreach ($categoriesToSave as $catId) {
                $catId = intval($catId);
                $values[] = "($id, $catId)";
            }

            $valuesString = implode(',', $values);
            $sql = "INSERT INTO {$GLOBALS['db_sp']}.articlelist_categories (articlelist_id, categories_id) VALUES $valuesString";
            $GLOBALS['sp']->query($sql);
        }
    }
    // Lưu brand
    saveArticleBrand($id, $brand_id);
}
