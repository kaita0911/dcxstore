<?php
// ================== TẮT WARNINGS & DEPRECATED ==================
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED & ~E_NOTICE & ~E_WARNING);

// ================== LOAD LIBRARIES ==================
require_once($config['BASE_DIR'] . '/libraries/smarty/libs/Smarty.class.php');
require_once($config['BASE_DIR'] . '/libraries/adodb5/adodb-exceptions.inc.php');
require_once($config['BASE_DIR'] . '/libraries/adodb5/adodb.inc.php');
require_once($config['BASE_DIR'] . '/libraries/multilang.class.php');
//echo 'Smarty version: ' . Smarty::SMARTY_VERSION;

// ================== CONNECT DATABASE ==================
if (!isset($DBTYPE) || empty($DBTYPE)) {
	$DBTYPE = 'mysqli';
}

$conn = ADONewConnection($DBTYPE);
try {
	$conn->Connect($DBHOST, $DBUSER, $DBPASSWORD, $DBNAME);
	$conn->Execute("SET NAMES 'utf8mb4'");
} catch (Exception $e) {
	die("❌ Lỗi kết nối database: " . $e->getMessage());
}

$GLOBALS["db_sp"] = $DBNAME;
$GLOBALS["sp"]    = $conn;

// ================== MULTILANGUAGE ==================
$language = $_COOKIE["language"] ?? "vn";
$_SESSION['language'] = $language;

// ================== KHỞI TẠO SMARTY ==================
$smarty = new SmartyML($language);
$GLOBALS['smarty'] = $smarty;

// ================== SMARTY CONFIG ==================
$smarty->left_delimiter  = '{';
$smarty->right_delimiter = '}';
$smarty->caching         = false;
$smarty->compile_check   = true;
$smarty->force_compile   = true;
$smarty->compile_dir     = $config['BASE_DIR'] . "/templates/template_c/";
$smarty->template_dir    = $config['BASE_DIR'] . "/templates/tpl/";
$smarty->cache_dir       = $config['BASE_DIR'] . "/templates/cache/";

// ⚠️ Tắt warnings nhỏ + deprecated của Smarty
if (method_exists($smarty, 'muteExpectedErrors')) {
	$smarty->muteExpectedErrors();
}

// ================== PATH VARIABLES ==================
$path_url = $config['BASE_URL'];
$path_dir = $config['BASE_DIR'] . "/";
$smarty->assign([
	"path_url" => $path_url,
	"path_dir" => $path_dir,
	"lang"     => $language
]);

// ================== LANGUAGE TEXTS ==================
if ($language === 'vn') {
	$numlang = 1;
	$texts = [
		"title"      => "title",
		"des"        => "des",
		"keyword"    => "keyword",
		"title_link" => "title_link",
		"title_img"  => "title_img",
		"alt_img"    => "alt_img",
		"home"       => "Trang chủ",
		"contact"    => "Liên hệ",
		"xemthem"    => "Xem thêm"
	];
} else {
	$numlang = 2;
	$texts = [
		"title"      => "title_en",
		"des"        => "des_en",
		"keyword"    => "keyword_en",
		"title_link" => "title_link_en",
		"title_img"  => "title_img_en",
		"alt_img"    => "alt_img_en",
		"home"       => "Home",
		"contact"    => "Contact",
		"xemthem"    => "Read more"
	];
}

$smarty->assign($texts);
$smarty->assign('path_url', $config['BASE_URL']);
$smarty->assign("numlang", $numlang);
