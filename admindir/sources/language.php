<?php
$act = $_REQUEST['act'] ?? "";
$template = "";
$smarty->assign("tabmenu", 0);

switch ($act) {
    case "edit":
        $id = (int)($_GET['id'] ?? 0);
        if ($id > 0) {
            $sql = "SELECT * FROM {$GLOBALS['db_sp']}.language WHERE id = $id";
            $rs = $GLOBALS['sp']->getRow($sql);
            $smarty->assign("edit", $rs);
            $template = "language/edit.tpl";
        }
        break;

    case "add":
        $template = "language/create.tpl";
        break;

    case 'dellistajax':
        ob_clean(); // Xóa mọi thứ đã in ra trước đó
        $ids = $_POST['cid'] ?? '';
        if ($ids !== '') {
            $idList = implode(',', array_map('intval', explode(',', $ids)));
            $GLOBALS["sp"]->query("DELETE FROM {$GLOBALS['db_sp']}.language WHERE id IN ($idList)");
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        exit;

    case "dellist":
    case "show":
    case "hide":
        $idList = $_POST['iddel'] ?? [];
        $activeValue = null;

        if ($act === "show") $activeValue = 1;
        if ($act === "hide") $activeValue = 0;

        foreach ($idList as $id) {
            $id = (int)$id;
            if ($act === "dellist") {
                $GLOBALS['sp']->execute("DELETE FROM {$GLOBALS['db_sp']}.language WHERE id = $id");
            } elseif ($activeValue !== null) {
                $GLOBALS['sp']->execute("UPDATE {$GLOBALS['db_sp']}.language SET active = $activeValue WHERE id = $id");
            }
        }
        page_transfer2("index.php?do=language");
        break;

    case "order":
        $ids = $_POST['id'] ?? [];
        $ordering = $_POST['ordering'] ?? [];
        foreach ($ids as $i => $id) {
            $id = (int)$id;
            $num = (int)($ordering[$i] ?? 0);
            $GLOBALS['sp']->execute("UPDATE {$GLOBALS['db_sp']}.language SET num = $num WHERE id = $id");
        }
        page_transfer2("index.php?do=language");
        break;

    case "addsm":
    case "editsm":
        Editsm($act);
        page_transfer2("index.php?do=language");
        break;

    default:
        $sql = "SELECT * FROM {$GLOBALS['db_sp']}.language ORDER BY id ASC";
        $rs = $GLOBALS['sp']->getAll($sql);
        $smarty->assign("view", $rs);
        $template = "language/list.tpl";
        break;
}

// Hiển thị template
$smarty->display("header.tpl");
if ($template) $smarty->display($template);
$smarty->display("footer.tpl");

// Hàm thêm/sửa language
function Editsm($act)
{
    $arr = [
        'name'   => trim($_POST['name'] ?? ''),
        'code'   => trim($_POST['code'] ?? ''),
        'active' => ($_POST['active'] ?? '') === 'active' ? 1 : 0
    ];

    if ($act === "addsm") {
        vaInsert('language', $arr);
    } else {
        $id = (int)($_POST['id'] ?? 0);
        if ($id > 0) {
            vaUpdate('language', $arr, "id = $id");
        }
    }
}
