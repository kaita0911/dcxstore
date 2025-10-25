<?php
include_once('../#include/config.php');
include_once('../#include/get_languages.php');
session_start();
header('Content-Type: application/json');

// Lấy từ khóa tìm kiếm
$keyword = trim($_GET['keyword'] ?? '');
$page = max(1, intval($_GET['page'] ?? 1));
$per_Page = 10;
$start = ($page - 1) * $per_Page;

// ===== Điều kiện tìm kiếm =====

$whereDetail = '';
$params = [];
if ($keyword !== '') {
    // Nếu dùng PDO, nên bind parameter
    // $whereDetail = " AND LOWER(d.name) LIKE LOWER(?) ";
    $whereDetail = " AND d.name LIKE ? ";
    $params['keyword'] = "%$keyword%";
}
// ===== Phân trang =====
$per_Page = 4; // số bản ghi trên 1 trang
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$start = ($page - 1) * $per_Page;

// ===== Lấy tổng số bản ghi =====

$countSql = "SELECT COUNT(*) as total
FROM {$GLOBALS['db_sp']}.articlelist AS a
LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
ON a.id = d.articlelist_id AND d.languageid = {$langid}
WHERE a.comp = 2 AND a.active = 1 $whereDetail";

$total = $GLOBALS['sp']->getOne($countSql, $params); // tổng số bản ghi
$total_pages = ceil($total / $per_Page);

///////////
// ===== SQL chính có LIMIT =====
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

// ===== Gán biến Smarty =====
$smarty->assign([
    'view'        => $results,
    'CheckNull'   => $total,
    'total_pages' => $total_pages,
    'current_page' => $page,
    'keyword'     => $keyword
]);

$html = $smarty->fetch("search/list.tpl");
$pagination = $smarty->fetch("search/pagination.tpl");

echo json_encode([
    'success' => true,
    'html' => $html,
    'pagination' => $pagination
]);
