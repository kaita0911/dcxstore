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
        $admin_lang = $_SESSION['admin_lang'] ?? 1;
        $menu = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.menu WHERE id={$id}");
        $menuDetail = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.menu_detail WHERE menu_id={$id} AND languageid={$admin_lang}");
        $smarty->assign([
            'edit'        => $menu,
            'menuDetail'  => $menuDetail,
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
    case 'updateOrder':
        ob_clean(); // Xóa toàn bộ output trước đó (tránh lỗi JSON)
        header('Content-Type: application/json; charset=utf-8');

        $ids = $_POST['id'] ?? [];
        $ordering = $_POST['num'] ?? [];

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
                $sql = "
                    UPDATE {$GLOBALS['db_sp']}.menu
                    SET num = CASE id {$cases} END
                    WHERE id IN ({$idsString})
                ";

                try {
                    $res = $GLOBALS["sp"]->execute($sql);
                    echo json_encode(['success' => true]);
                } catch (Exception $e) {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Lỗi SQL: ' . $e->getMessage()
                    ]);
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
        $lang_id = intval($_SESSION['admin_lang'] ?? 1);
        $menus = $GLOBALS["sp"]->getAll("SELECT m.*, d.name AS name_lang, d.unique_key FROM {$GLOBALS['db_sp']}.menu AS m 
        LEFT JOIN {$GLOBALS['db_sp']}.menu_detail AS d 
            ON m.id = d.menu_id AND d.languageid = {$lang_id}
        ORDER BY m.num ASC");
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
    global $act;
    $id = intval($_POST['id'] ?? 0);
    $language_id = intval($_SESSION['admin_lang'] ?? 1); // ✅ lấy ngôn ngữ hiện tại từ session

    // 1️⃣ Tính num tự động nếu thêm mới
    if ($act === 'addsm') {
        $maxNum = $GLOBALS['sp']->getOne("SELECT MAX(num) FROM {$GLOBALS['db_sp']}.menu");
        $newNum = $maxNum ? $maxNum + 1 : 1;
    } else {
        $newNum = intval($_POST["num"] ?? 0);
    }

    // 2️⃣ Dữ liệu bảng menu
    $arr = [
        'link_out' => trim($_POST['link'] ?? ''),
        'choose'   => trim($_POST['choose'] ?? ''),
        'comp'     => intval($_POST['menu'] ?? 0),
        'has_sub'  => !empty($_POST['menucon']) ? 1 : 0,
        'active'   => !empty($_POST['active']) ? 1 : 0,
        'num'      => $newNum,
    ];

    // 3️⃣ Thêm / sửa bảng menu
    if ($act === 'addsm') {
        vaInsert('menu', $arr);
        $id = $GLOBALS['sp']->Insert_ID(); // ✅ lấy ID mới
    } else {
        vaUpdate('menu', $arr, "id={$id}");
    }

    // 4️⃣ Dữ liệu chi tiết theo ngôn ngữ hiện tại
    $name = trim($_POST["name"] ?? '');
    if ($name !== '') {
        $unique_key = trim($_POST["unique_key"] ?? '') ?: StripUnicode($name);

        // Kiểm tra trùng unique_key
        $exists = $GLOBALS["sp"]->getOne(
            "
            SELECT COUNT(*) FROM {$GLOBALS['db_sp']}.menu_detail 
            WHERE unique_key='{$unique_key}' 
            " . ($id ? "AND menu_id<>$id" : '')
        );

        $unique_key_final = $exists ? "{$unique_key}-{$id}" : $unique_key;

        $arrDetail = [
            'menu_id'     => $id,
            'languageid'  => $language_id,
            'name'        => $name,
            'unique_key'  => $unique_key_final,
        ];

        // Kiểm tra xem chi tiết đã tồn tại chưa
        $detail = $GLOBALS["sp"]->getRow("
            SELECT * FROM {$GLOBALS['db_sp']}.menu_detail 
            WHERE menu_id={$id} AND languageid={$language_id}
        ");

        if ($detail) {
            vaUpdate('menu_detail', $arrDetail, "id={$detail['id']}");
        } else {
            vaInsert('menu_detail', $arrDetail);
        }
    }
}
