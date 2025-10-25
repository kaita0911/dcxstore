<?php
include_once('../#include/config.php');
include_once('../#include/get_languages.php');
session_start();
header('Content-Type: application/json');

//$do_search = trim($_GET['do_search'] ?? '');
$keyword = trim($_GET['keyword'] ?? '');
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$per_page = 10;
$start = ($page - 1) * $per_page;

$whereDetail = '';
$params = [];
if ($keyword !== '') {
    $whereDetail = " AND d.name LIKE ? ";
    $params['keyword'] = "%$keyword%";
}

// Lấy tổng số bản ghi
$countSql = "SELECT COUNT(*) 
FROM {$GLOBALS['db_sp']}.articlelist AS a
LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
  ON a.id = d.articlelist_id AND d.languageid = {$langid}
WHERE a.comp = 2 AND a.active = 1 $whereDetail";

$total = $GLOBALS['sp']->getOne($countSql, $params);
$total_pages = ceil($total / $per_page);

// Lấy dữ liệu trang hiện tại
$sql = "SELECT a.id, a.comp, a.num, a.unique_key, a.img_thumb_vn,a.dated,
 d.name AS name_detail, d.unique_key, 
 d.short AS short_detail, 
 d.content AS content_detail, p.price,p.priceold
FROM {$GLOBALS['db_sp']}.articlelist AS a
LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
ON a.id = d.articlelist_id AND d.languageid = {$langid}
LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
ON p.articlelist_id = a.id   -- nối với bảng giá
WHERE a.comp = 2 AND a.active = 1 $whereDetail
ORDER BY a.num DESC LIMIT $start, $per_Page";

$results = $GLOBALS['sp']->getAll($sql, $params);

// render HTML bằng Smarty template
$smarty->assign('view', $results);
$smarty->assign('CheckNull', count($results));
$smarty->assign('current_page', $page);
$smarty->assign('total_pages', $total_pages);
$smarty->assign('keyword', $keyword);

// fetch ra html và pagination
$html = $smarty->fetch("search/list_ajax.tpl");
$pagination = $smarty->fetch("search/ajax_pagination.tpl");

echo json_encode([
    'success' => true,
    'html' => $html,
    'pagination' => $pagination
]);
