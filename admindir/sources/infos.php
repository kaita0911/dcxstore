<?php
// Khởi tạo
$act  = $_REQUEST['act'] ?? '';
$comp = $_GET['comp'] ?? '';
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

// Switch theo action
switch ($act) {
    // ================== EDIT ==================
    case "edit":
        $id = (int)($_GET["id"] ?? 0);
        if ($id <= 0) {
            die("Invalid ID");
        }

        $sql = "SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id = ?";
        $rs  = $GLOBALS["sp"]->getRow($sql, [$id]);
        $smarty->assign("edit", $rs);

        $template = "infos/edit.tpl";
        break;

    // ================== SAVE (ADD / EDIT) ==================
    case "addsm":
    case "editsm":
        Editsm();
        page_transfer2("index.php?do=infos&comp={$comp}");
        exit;

        // ================== LIST (DEFAULT) ==================
    default:
        // Lọc quyền user
        $sqlBase = ($_SESSION["admin_artseed_username"] == 'kaita')
            ? "SELECT * FROM {$GLOBALS['db_sp']}.infos ORDER BY id ASC"
            : "SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE active = 1 ORDER BY id ASC";

        // Đếm tổng
        $total = $GLOBALS["sp"]->getOne("SELECT COUNT(*) FROM ({$sqlBase}) AS t");
        $num_rows_page = $numPageAll ?? 20;
        $num_page  = ceil($total / $num_rows_page);
        $begin     = ($page - 1) * $num_rows_page;

        $sql = "{$sqlBase} LIMIT {$begin}, {$num_rows_page}";
        $rs  = $GLOBALS["sp"]->getAll($sql);

        // Tạo link phân trang
        $url = "index.php?do=infos";
        $link_url = ($num_page > 1) ? paginator($num_page, $page, 20, $url) : '';

        // Gán sang template
        $smarty->assign([
            "link_url" => $link_url,
            "view"     => $rs,
            "checkPer2" => checkPermision($idpem ?? '', 2) ? "true" : "",
        ]);

        $template = "infos/list.tpl";
        break;
}

// Tab menu & hiển thị
$smarty->assign("tabmenu", 2);
$smarty->display("header.tpl");
$smarty->display($template);
$smarty->display("footer.tpl");

// ================== FUNCTION ==================
function Editsm()
{
    global $path_url, $GLOBALS;

    $act = $_REQUEST['act'] ?? '';
    $id  = (int)($_POST['id'] ?? 0);

    // Gom dữ liệu
    $arr = [
        'name_vn'        => $_POST["name_vn"] ?? '',
        'domain'         => $_POST["domain"] ?? '',
        'plain_text_vn'  => trim($_POST["plain_text_vn"] ?? ''),
        'plain_text_en'  => trim($_POST["plain_text_en"] ?? ''),
        'email'          => trim($_POST["email"] ?? ''),
        'phone'          => trim($_POST["phone"] ?? ''),
        'address_vn'     => trim($_POST["address_vn"] ?? ''),
        'googlemap'      => trim($_POST["googlemap"] ?? ''),
        'content_vn'     => $_POST["content_vn"] ?? '',
        'content_en'     => $_POST["content_en"] ?? '',
        'facebook'       => trim($_POST["facebook"] ?? ''),
        'google'         => trim($_POST["google"] ?? ''),
        'twitter'        => trim($_POST["twitter"] ?? ''),
        'instagram'      => trim($_POST["instagram"] ?? ''),
        'youtube'        => trim($_POST["youtube"] ?? ''),
        'printest'       => trim($_POST["printest"] ?? ''),
        'active'         => isset($_POST['active']) ? 1 : 0,
        'phiship'        => isset($_POST['phiship']) ? 1 : 0,
        'open'           => isset($_POST['open']) ? 1 : 0,
        'ngaythang'      => isset($_POST['ngaythang']) ? 1 : 0,
        'keyword'        => trim($_POST["keyword"] ?? ''),
        'desc'           => trim($_POST["desc"] ?? ''),
    ];

    $arr2 = [
        'email'          => trim($_POST["plain_text_vn"] ?? ''),
    ];

    // Upload ảnh
    if (!empty($_FILES['img_thumb_vn']['name']) && $_FILES['img_thumb_vn']['size'] > 0) {
        $img = $_FILES['img_thumb_vn']['name'];
        $ext = pathinfo($img, PATHINFO_EXTENSION);
        $filename = 'trg-' . time() . '.' . strtolower($ext);
        $filename = RenameFile($filename);
        $target = "../hinh-anh/trung-gian/{$filename}";
        copy($_FILES['img_thumb_vn']['tmp_name'], $target);
        $arr['img_thumb_vn'] = "hinh-anh/trung-gian/{$filename}";
    }

    // Update
    if ($act === "editsm" && $id > 0) {
        vaUpdate('infos', $arr, "id={$id}");
        vaUpdate('admin', $arr2, "id=1");
    }
}
