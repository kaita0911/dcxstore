<?php
$act = $_REQUEST['act'] ?? '';
$db = $GLOBALS['sp'];

// Lấy properties và languages
$smarty->assign("properties", $db->getAll("SELECT * FROM {$GLOBALS['db_sp']}.properties WHERE active=1"));
$smarty->assign("languages", $db->getAll("SELECT * FROM {$GLOBALS['db_sp']}.language WHERE active=1"));

$template = null; // Init template

switch ($act) {

    // ==================== EDIT ====================
    case "edit":
        $id = (int)($_GET["id"] ?? 0);
        if ($id > 0) {
            $editDetails = $db->getAll("SELECT * FROM {$GLOBALS['db_sp']}.component_detail WHERE component_id=$id ORDER BY id ASC");
            $smarty->assign("checklang", count($editDetails));
            $smarty->assign("edit_name", $editDetails);
            $smarty->assign("edit", $db->getRow("SELECT * FROM {$GLOBALS['db_sp']}.component WHERE id=$id"));
            $template = "component/edit.tpl";
        }
        break;

    // ==================== ADD ====================
    case "add":
        $maxNumComp = $db->getRow("SELECT * FROM {$GLOBALS['db_sp']}.component WHERE num=(SELECT MAX(num) FROM {$GLOBALS['db_sp']}.component)");
        $smarty->assign("numkai", $maxNumComp);
        $template = "component/create.tpl";
        break;

    // ==================== DELETE ====================
    case "dellist":
        if (!checkPermision($_GET["cid"], 3)) {
            page_permision();
            page_transfer2("index.php");
        } else {
            foreach ($_POST["iddel"] as $id) {
                DeleteCat((int)$id);
            }
            page_transfer2("index.php?do=component");
        }
        break;

    // ==================== SHOW/HIDE ====================
    case "show":
    case "hide":
        $active = $act === "show" ? 1 : 0;
        foreach ($_POST["iddel"] as $id) {
            $db->execute("UPDATE {$GLOBALS['db_sp']}.component SET active=? WHERE id=?", [$active, $id]);
        }
        page_transfer2("index.php?do=component");
        break;

    // ==================== ORDER ====================
    case "order":
        $ids = $_POST["id"];
        $orderings = $_POST["ordering"];
        foreach ($ids as $i => $id) {
            $db->execute("UPDATE {$GLOBALS['db_sp']}.component SET num=? WHERE id=?", [$orderings[$i], $id]);
        }
        page_transfer2("index.php?do=component");
        break;

    // ==================== SAVE ADD/EDIT ====================
    case "addsm":
    case "editsm":
        $id = $_GET["id"] ?? null;
        Editsm($act);
        if ($act === "editsm" && ($_SESSION['admin_artseed_username'] ?? '') !== 'kaita') {
            page_transfer2("index.php?do=articlelist&comp=$id");
        } else {
            page_transfer2("index.php?do=component");
        }
        break;

    // ==================== DEFAULT: LIST ====================
    default:
        $smarty->assign("view", $db->getAll("SELECT * FROM {$GLOBALS['db_sp']}.component ORDER BY num ASC"));
        $template = "component/list.tpl";
        break;
}

// Chỉ display template khi $template được set
if ($template) {
    $smarty->assign("tabmenu", 0);
    $smarty->display("header.tpl");
    $smarty->display($template);
    $smarty->display("footer.tpl");
    exit; // Ngăn code phía dưới chạy, tránh form rỗng hiển thị ngoài ý muốn
}

// ==================== FUNCTIONS ====================
function Editsm($act)
{
    global $db, $GLOBALS;

    $arr = [
        'do' => trim($_POST["do"] ?? ''),
        'iconfont' => trim($_POST["iconfont"] ?? ''),
        'nhomcon' => isset($_POST['nhomcon']) ? '1' : '0',
        'brand' => isset($_POST['brand']) ? '1' : '0',
        'nhieuhinh' => isset($_POST['nhieuhinh']) ? '1' : '0',
        'masp' => isset($_POST['masp']) ? '1' : '0',
        'price' => isset($_POST['price']) ? '1' : '0',
        'priceold' => isset($_POST['priceold']) ? '1' : '0',
        'voucher' => isset($_POST['voucher']) ? '1' : '0',
        'phiship' => isset($_POST['phiship']) ? '1' : '0',
        'mausac' => isset($_POST['mausac']) ? '1' : '0',
        'kichthuoc' => isset($_POST['kichthuoc']) ? '1' : '0',
        'active' => isset($_POST['active']) ? '1' : '0',
        'new' => isset($_POST['new']) ? '1' : '0',
        'hot' => isset($_POST['hot']) ? '1' : '0',
        'mostview' => isset($_POST['mostview']) ? '1' : '0',
        'viewed' => isset($_POST['viewed']) ? '1' : '0',
        'hinhanh' => isset($_POST['hinhanh']) ? '1' : '0',
        'short' => isset($_POST['short']) ? '1' : '0',
        'des' => isset($_POST['des']) ? '1' : '0',
        'metatag' => isset($_POST['metatag']) ? '1' : '0',
        'hinhmodule' => isset($_POST['hinhmodule']) ? '1' : '0',
        'hinhdanhmuc' => isset($_POST['hinhdanhmuc']) ? '1' : '0',
        'motamodule' => isset($_POST['motamodule']) ? '1' : '0',
        'link_out' => isset($_POST['link_out']) ? '1' : '0',
        'num' => $_POST["num"] ?? 0,
        'name' => $_POST["name_1"] ?? '',
        'unique_key' => $_POST["unique_key_1"] ?? ''
    ];

    // Upload ảnh
    if (!empty($_FILES['img_vn']['name']) && $_FILES['img_vn']['size'] > 0) {
        $ext = strtolower(strrchr($_FILES['img_vn']['name'], "."));
        $filename = RenameFile('trg-' . time() . $ext);
        copy($_FILES['img_vn']['tmp_name'], "../hinh-anh/trung-gian/" . $filename);
        $arr['img_vn'] = "hinh-anh/trung-gian/" . $filename;
    }

    if ($act === "addsm") {
        $arr['num'] += 1;
        $id_comp = vaInsert('component', $arr);
        insertComponentDetails($id_comp);
    } else {
        $id_comp = $_POST["id"];
        updateComponentDetails($id_comp);
        vaUpdate('component', $arr, "id=$id_comp");
        $db->execute("DELETE FROM {$GLOBALS['db_sp']}.properties_component WHERE comp_id=?", [$id_comp]);
    }

    // Thêm properties
    if (!empty($_POST["properties"])) {
        foreach ($_POST["properties"] as $prop_id) {
            $prop = $db->getRow("SELECT * FROM {$GLOBALS['db_sp']}.properties WHERE id=?", [$prop_id]);
            if ($prop) {
                $arrProp = ['properties_id' => $prop_id, 'comp_id' => $id_comp, 'name' => $prop['name_vn']];
                $exists = $db->getRow("SELECT * FROM {$GLOBALS['db_sp']}.properties_component WHERE properties_id=? AND comp_id=?", [$prop_id, $id_comp]);
                if (!$exists) vaInsert('properties_component', $arrProp);
            }
        }
    }
}

function insertComponentDetails($comp_id)
{
    global $db;
    $languages = $db->getAll("SELECT * FROM {$GLOBALS['db_sp']}.language WHERE active=1");
    foreach ($languages as $lang) {
        $name = trim($_POST["name_" . $lang['id']] ?? '');
        $unique_key = empty($_POST['unique_key']) ? StripUnicode($name) : trim($_POST['unique_key']);
        vaInsert('component_detail', [
            'num' => $_POST["num"] ?? 0,
            'component_id' => $comp_id,
            'languageid' => $lang['id'],
            'code' => $lang['code'],
            'name' => $name,
            'unique_key' => $unique_key,
            'content' => $_POST["content_" . $lang['id']] ?? ''
        ]);
    }
}

function updateComponentDetails($comp_id)
{
    global $db;
    $details = $db->getAll("SELECT * FROM {$GLOBALS['db_sp']}.component_detail WHERE component_id=?", [$comp_id]);
    if ($details) {
        foreach ($details as $detail) {
            $name = trim($_POST["name_" . $detail['languageid']] ?? '');
            vaUpdate('component_detail', [
                'name' => $name,
                'unique_key' => StripUnicode($name),
                'content' => $_POST["content_" . $detail['languageid']] ?? ''
            ], "id=" . $detail['id']);
        }
    } else {
        insertComponentDetails($comp_id);
    }
}

function DeleteCat($id)
{
    global $db;
    $comp = $db->getRow("SELECT * FROM {$GLOBALS['db_sp']}.component WHERE id=?", [$id]);
    if ($comp) $db->execute("DELETE FROM {$GLOBALS['db_sp']}.component WHERE id=?", [$id]);
}
