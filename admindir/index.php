<?php
@session_start();
include_once("#include/config.php");
include_once("functions/function.php");
include_once("functions/categories.class.php");

// -----------------------------
// ⚙️ Lấy dữ liệu cấu hình cơ bản
// -----------------------------
function getInfo($id)
{
	return $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id = {$id}");
}

// Thông tin hiển thị
$smarty->assign("showvouchers", getInfo(22));
$smarty->assign("showphiship", getInfo(23));
$smarty->assign("showcart", getInfo(12));
$smarty->assign("showform", getInfo(14));
$smarty->assign("showanhdanhmuc", getInfo(19));
$smarty->assign("showtime", getInfo(13));
$smarty->assign("logoadmin", getInfo(1));

// // -----------------------------
// // 🧩 Danh sách ngôn ngữ
// // -----------------------------
// $sql_lg = "SELECT * FROM {$GLOBALS['db_sp']}.language WHERE active = 1";
// $rs_lg = $GLOBALS["sp"]->getAll($sql_lg);
// $smarty->assign("languages", $rs_lg);
// $smarty->assign("countlang", count($rs_lg));

// -----------------------------
// 👤 Thông tin admin
// -----------------------------
$adminInfo = $GLOBALS["sp"]->getRow("SELECT * FROM {$GLOBALS['db_sp']}.admin WHERE id = 3");
$smarty->assign("admin", $adminInfo);

// -----------------------------
// 📋 Sinh danh sách menu bên trái
// -----------------------------
$sql = "
    SELECT * 
    FROM {$GLOBALS['db_sp']}.component 
    WHERE active = 1 
      AND id NOT IN (8, 23, 14, 15)
    ORDER BY num ASC
";
$components = $GLOBALS["sp"]->getAll($sql);

$listMenuLeft = [];
foreach ($components as $item) {
	$menu = [
		'id' => $item['id'],
		'name' => $item['name'],
		'icon' => $item['iconfont'],
		'links' => [
			'add' => "index.php?do=articlelist&act=add&comp={$item['id']}",
			'list' => "index.php?do=articlelist&comp={$item['id']}",
		],
	];

	if ($item['nhomcon'] == 1) {
		$menu['category'] = "index.php?do=categories&comp={$item['id']}";
	}
	if ($item['hinhmodule'] == 1 || $item['motamodule'] == 1) {
		$menu['detail'] = "index.php?do=component&act=edit&id={$item['id']}";
	}
	if ($item['kichthuoc'] == 1) {
		$menu['size'] = "index.php?do=articlelist&comp=14";
	}
	if ($item['mausac'] == 1) {
		$menu['color'] = "index.php?do=articlelist&comp=15";
	}

	$listMenuLeft[] = $menu;
}
$smarty->assign("ListMenuLeft", $listMenuLeft);

// -----------------------------
// 🚧 Kiểm tra trạng thái web
// -----------------------------
$rsweb = getInfo(13);
if ($rsweb['open'] == 1 && ($_SESSION["admin_artseed_username"] ?? '') == 'admin') {
	echo "<div class='coloseweb'>
            <img class='closeweb' 
                 style='position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);' 
                 src='{$config['BASE_URL']}/images/giahan.jpg' />
          </div>";
	exit;
}

// -----------------------------
// 📄 Xử lý router trang admin
// -----------------------------
$page = $_REQUEST['p'] ?? 1;
$do = $_GET['do'] ?? 'main';

if (!isset($_SESSION["store_anthinh_login"])) {
	$do = "login";
}

$sourcePath = "./sources/{$do}.php";
if (!file_exists($sourcePath)) {
	die("Function '{$do}' not found!");
}

require $sourcePath;
