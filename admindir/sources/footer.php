<?php

$act = $_REQUEST['act'] ?? '';

// $languages = $GLOBALS["sp"]->getAll("SELECT * FROM {$GLOBALS['db_sp']}.language WHERE active=1");
// $smarty->assign("languages", $languages);

switch ($act) {
    case "edit":
        $id = (int)($_GET['id'] ?? 0);

        $footerDetails = $GLOBALS["sp"]->getAll("SELECT * FROM {$GLOBALS['db_sp']}.footer_detail WHERE footer_id=$id");
        $smarty->assign("checklang", count($footerDetails));
        $smarty->assign("edit_name", $footerDetails);

        $footer = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.footer WHERE id=$id");
        $smarty->assign("edit", $footer);

        $template = "footer/edit.tpl";
        break;

    case "add":
        $template = "footer/create.tpl";
        break;

    case 'dellistajax':
        ob_clean(); // Xóa mọi thứ đã in ra trước đó
        $ids = $_POST['cid'] ?? '';
        if ($ids !== '') {
            $idList = implode(',', array_map('intval', explode(',', $ids)));

            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.footer_detail WHERE footer_id IN ($idList)");
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.footer WHERE id IN ($idList)");
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;


    case "addsm":
    case "editsm":
        saveFooter();
        page_transfer2("index.php?do=footer");
        exit;

    default:
        $language_id = $_SESSION['admin_lang'] ?? '1';
        $footers = $GLOBALS["sp"]->getAll("SELECT * FROM {$GLOBALS['db_sp']}.footer");
        $details = $GLOBALS["sp"]->getAll("SELECT * FROM {$GLOBALS['db_sp']}.footer_detail WHERE languageid = {$language_id}");
        $articlelistDetail = [];
        foreach ($details as $d) {
            $articlelistDetail[$d['footer_id']] = $d;
        }
        foreach ($footers as &$item) {
            $id = $item['id'];
            $item['details'] = $articlelistDetail[$id] ?? [];
        }

        $smarty->assign("view", $footers);
        $template = "footer/list.tpl";
        break;
}

$smarty->display("header.tpl");
$smarty->display($template);
$smarty->display("footer.tpl");

function saveFooter()
{
    global $act;
    $id  = intval($_POST['id'] ?? 0);
    // ==== 2️⃣ Lấy dữ liệu POST cơ bản ====
    $arr = [
        'hotline'       => trim($_POST["hotline"] ?? ''),
        'email'       => trim($_POST["email"] ?? ''),
        'map'       => trim($_POST["map"] ?? ''),
    ];
    if ($act === 'addsm') {
        vaInsert('footer', $arr);
        $id = $GLOBALS['sp']->Insert_ID(); // ✅ Lấy ID mới insert
    } else {
        vaUpdate('footer', $arr, "id=$id");
    }
    // Lưu ngon ngu tu session
    $language_id = $_SESSION['admin_lang'] ?? '1';
    // Lấy thông tin từ form
    $name        = trim($_POST['name'] ?? '');
    $address       = trim($_POST['address'] ?? '');
    $content     = trim($_POST['content'] ?? '');

    $arrDetail = [
        'footer_id' => $id,
        'languageid'     => $language_id,
        'name'           => $name,
        'content'        => $content,
        'address'        => $address
    ];
    // Kiểm tra đã tồn tại bản ghi cho articlelist_id + languageid chưa
    $detail = $GLOBALS["sp"]->getRow(
        "SELECT * FROM {$GLOBALS['db_sp']}.footer_detail WHERE footer_id=$id AND languageid=$language_id"
    );
    if ($detail) {
        vaUpdate('footer_detail', $arrDetail, "id={$detail['id']}");
    } else {
        vaInsert('footer_detail', $arrDetail);
    }
}
