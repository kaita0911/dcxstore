<?php

// ==================== GET COMPONENT ====================
$rs_tinhnang = $GLOBALS['sp']->getRow("SELECT * FROM $GLOBALS[db_sp].component WHERE id=2");
$smarty->assign("tinhnang", $rs_tinhnang);

// ==================== SAFE CATEGORY VARIABLES ====================
// $cat_id   = isset($cat1['id']) ? (int)$cat1['id'] : 0;
// $cattitle['comp'] = isset($cat1['comp']) ? (int)$cat1['comp'] : 0;
// $cat_key  = $cat1['unique_key'] ?? '';

// ==================== PARSE URL QUERY SAFELY ====================
$sort = '';
$page = 1;
$url  = $_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($url);

$params = [];
if (!empty($parsedUrl['query']) && is_string($parsedUrl['query'])) {
	parse_str($parsedUrl['query'], $params);
	if (is_array($params)) {
		$sort = $params['sort'] ?? '';
		$page = max(1, (int)($params['page'] ?? 1));
	}
}
$smarty->assign('sort_select', $sort);

// ==================== GET CATEGORY TITLE ====================
$sql = "SELECT * FROM $GLOBALS[db_sp].menu WHERE unique_key = '{$cat1}'";
$cat_id = $GLOBALS["sp"]->getRow($sql);
$sql1 = "SELECT * FROM $GLOBALS[db_sp].menu_detail WHERE menu_id = '{$cat_id['id']}'";
$cattitle = $GLOBALS["sp"]->getRow($sql1);
//var_dump($cattitle['comp']);

// $cattitle = $GLOBALS['sp']->getRow(
// 	"SELECT * FROM $GLOBALS[db_sp].menu_detail WHERE menu_id={$cat_id} AND languageid=$numlang"
// );

// ==================== BUILD SQL BASED ON CATEGORY ====================
$sql = $sql_sum = "";

switch ($sort) {
	case "bestseller":
		$sql = "SELECT * FROM $GLOBALS[db_sp].articlelist WHERE comp=2 AND hot=1 AND active=1 ORDER BY id DESC";
		break;

	case "low-high":
		$sql = "SELECT a.* FROM $GLOBALS[db_sp].articlelist a
                    JOIN $GLOBALS[db_sp].price p ON a.id=p.articlelist_id
                    WHERE a.comp=2 AND a.active=1
                    ORDER BY p.price ASC";
		break;

	case "high-low":
		$sql = "SELECT a.* FROM $GLOBALS[db_sp].articlelist a
                    JOIN $GLOBALS[db_sp].price p ON a.id=p.articlelist_id
                    WHERE a.comp=2 AND a.active=1
                    ORDER BY p.price DESC";
		break;

	default:
		$sql = "SELECT * FROM $GLOBALS[db_sp].articlelist WHERE comp={$cat_id['comp']} AND active=1 ORDER BY id DESC";
}

$sql_sum = "SELECT COUNT(id) FROM $GLOBALS[db_sp].articlelist WHERE active=1 AND comp={$cat_id['comp']}";


// ==================== PAGINATION ====================
$count = (int)$GLOBALS['sp']->getOne($sql_sum);
$num_rows_page = ($cat_id['comp'] === 2) ? 24 : 10;
$num_page = max(1, ceil($count / $num_rows_page));
$begin = ($page - 1) * $num_rows_page;

$linkpg = "";
if ($num_page > 1) {
	$linkpg = pagi($page, $num_page, $cat_key, $sort);
	$smarty->assign("Checkpg", "1");
}

$sql .= " LIMIT $begin, $num_rows_page";

// ==================== ASSIGN TO SMARTY ====================
$rs = $GLOBALS['sp']->getAll($sql);
$smarty->assign([
	"CheckNull" => $count,
	"view"      => $rs,
	"linkpg"    => $linkpg
]);

$rscomp = $GLOBALS['sp']->getRow("SELECT * FROM $GLOBALS[db_sp].component WHERE id='{$cat_id['comp']}'");
//var_dump($cat_id['comp']);
switch ($cat_id['comp']) {
	case "2":
		$sql = "SELECT * FROM $GLOBALS[db_sp].articlelist WHERE comp=2 AND hot=1 AND active=1 ORDER BY id DESC";
		break;

	default:
		$sql = "SELECT a.img_thumb_vn, a.unique_key, ad.name, ad.short
	FROM $GLOBALS[db_sp].articlelist a
	LEFT JOIN $GLOBALS[db_sp].articlelist_detail ad
	ON a.id = ad.articlelist_id AND ad.languageid = $numlang
	WHERE a.comp = {$cat_id['comp']}
	ORDER BY a.num ASC
	";
}

$rs = $GLOBALS["sp"]->getAll($sql);
$template = ($rscomp['do']) . "/viewsub.tpl";

$smarty->assign([
	"linkTitle" => $linkTitle ?? '',
	"seo"       => $cattitle
]);

// ==================== DISPLAY TEMPLATE ====================
$smarty->assign("view", $rs);
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");
