<?php
// ==========================
// MENU CONTROLLER (Smarty 4.3+ Clean Version)
// ==========================

$act  = $_REQUEST['act'] ?? '';
$comp = intval($_GET['comp'] ?? 0);

// Lấy danh sách component (liên kết)
$sql_menu = "SELECT * FROM {$GLOBALS['db_sp']}.component ORDER BY id ASC";
$lienket = $GLOBALS["sp"]->getAll($sql_menu);

// Lấy danh sách ngôn ngữ
$languages = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.language WHERE active=1 ORDER BY id ASC");
$smarty->assign("languages", $languages);


// Khởi tạo Smarty
$smarty->assign([
    'lienket' => $lienket,
    'tabmenu' => 0,
]);

switch ($act) {
    // ================
    // CHỈNH SỬA MENU
    // ================
    case 'edit':
        $id = intval($_GET['id'] ?? 0);
        $menu = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.menu WHERE id={$id}");
        $menu_details = $GLOBALS["sp"]->getAll("SELECT * FROM {$GLOBALS['db_sp']}.menu_detail WHERE menu_id={$id} ORDER BY languageid ASC");
        $menuDetail = [];
        foreach ($menu_details as $d) {
            $menuDetail[$d['languageid']] = $d;
        }
        $smarty->assign([
            'edit'        => $menu,
            'menuDetail'   => $menuDetail,
            //'checklang'   => ceil(count($menu_details)),
        ]);

        $template = 'menu/edit.tpl';
        break;

    // ================
    // THÊM MỚI MENU
    // ================
    case 'add':
        $template = 'menu/create.tpl';
        break;

    // =====================
    // XOÁ DANH SÁCH MENU
    // =====================

    case 'dellistajax':
        ob_clean(); // Xóa mọi thứ đã in ra trước đó
        $ids = $_POST['cid'] ?? '';
        if ($ids !== '') {
            $idList = implode(',', array_map('intval', explode(',', $ids)));

            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.menu WHERE id IN ($idList)");
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.menu_detail WHERE menu_id IN ($idList)");

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;

        // =====================
        // ẨN / HIỆN MENU
        // =====================
    case 'show':
    case 'hide':
        $ids = $_POST['iddel'] ?? [];
        $active = ($act === 'show') ? 1 : 0;
        foreach ($ids as $id) {
            $id = intval($id);
            $GLOBALS["sp"]->execute("UPDATE {$GLOBALS['db_sp']}.menu SET active={$active} WHERE id={$id}");
        }
        page_transfer2('index.php?do=menu');
        break;

    // =====================
    // SẮP XẾP MENU
    // =====================
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
                $sql = "UPDATE {$GLOBALS['db_sp']}.menu 
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


        // =====================
        // THÊM HOẶC SỬA MENU (SUBMIT)
        // =====================
    case 'addsm':
    case 'editsm':
        saveMenu();
        page_transfer2('index.php?do=menu');
        break;

    // =====================
    // MẶC ĐỊNH: DANH SÁCH MENU
    // =====================
    default:
        $menus = $GLOBALS["sp"]->getAll("SELECT * FROM {$GLOBALS['db_sp']}.menu ORDER BY num ASC");
        $smarty->assign('view', $menus);
        $template = 'menu/list.tpl';
        break;
}

// Render template
$smarty->display('header.tpl');
$smarty->display($template);
$smarty->display('footer.tpl');


// ==========================
// HÀM XỬ LÝ THÊM / SỬA MENU
// ==========================
function saveMenu()
{
    global $languages, $act;
    $id = intval($_POST['id'] ?? 0);
    $name_vn = trim($_POST["name_1"] ?? '');

    // 1️⃣ Tính num tự động nếu thêm mới
    if ($act === 'addsm') {
        $maxNum = $GLOBALS['sp']->getOne("SELECT MAX(num) FROM menu");
        $newNum = $maxNum ? $maxNum + 1 : 1;
    } else {
        $newNum = intval($_POST["num"] ?? 0); // cập nhật nếu chỉnh sửa
    }
    $arr = [
        'link_out'   => trim($_POST['link'] ?? ''),
        'choose'     => trim($_POST['choose'] ?? ''),
        'comp'       => intval($_POST['menu'] ?? 0),
        'has_sub'    => !empty($_POST['menucon']) ? 1 : 0,
        'active'     => !empty($_POST['active']) ? 1 : 0,
        'num'       => $newNum,
        'name_vn'   => $name_vn,
    ];

    // // Upload hình ảnh
    // if (!empty($_FILES['img_vn']['name'])) {
    //     $filename = uploadImage($_FILES['img_vn'], '../hinh-anh/banner/');
    //     if ($filename) {
    //         $arr['img_vn'] = 'hinh-anh/banner/' . $filename;
    //     }
    // }

    // =========== ADD ===========
    if ($act === 'addsm') {
        vaInsert('menu', $arr);
        $id = $GLOBALS['sp']->Insert_ID(); // ✅ Lấy ID mới insert
    } else {
        vaUpdate('menu', $arr, "id=$id");
    }
    // Lưu chi tiết ngôn ngữ
    foreach ($languages as $lang) {
        $lang_id = $lang['id'];
        $name = trim($_POST["name_" . $lang_id] ?? '');
        if ($name === '') continue; // bỏ qua nếu không nhập tên

        $unique_key = trim($_POST["unique_key_" . $lang_id] ?? '') ?: StripUnicode($name);
        $exists = $GLOBALS["sp"]->getOne(
            "SELECT COUNT(*) FROM {$GLOBALS['db_sp']}.menu_detail WHERE unique_key='{$unique_key}'"
                . ($id ? " AND menu_id<>$id" : '')
        );
        $unique_key_final = $exists ? $unique_key . "-$id" : $unique_key;

        $arrDetail = [
            'menu_id' => $id,
            'languageid'    => $lang_id,
            'name'          => $name,
            'unique_key'    => $unique_key_final,
        ];

        $detail = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.menu_detail WHERE menu_id=$id AND languageid=$lang_id");
        if ($detail) {
            vaUpdate('menu_detail', $arrDetail, "id={$detail['id']}");
        } else {
            vaInsert('menu_detail', $arrDetail);
        }
    }

    // ==========================
    // HÀM XỬ LÝ UPLOAD HÌNH ẢNH
    // ==========================
    // function uploadImage(array $file, string $uploadDir): ?string
    // {
    //     $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    //     $baseName = pathinfo($file['name'], PATHINFO_FILENAME);
    //     $filename = strtolower(RenameFile($baseName . '-' . time() . '.' . $ext));

    //     $tmp = $file['tmp_name'];
    //     $dest = $uploadDir . $filename;

    //     if (move_uploaded_file($tmp, $dest)) {
    //         return $filename;
    //     }

    //     return null;
    // }
}
