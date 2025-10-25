<?php
include_once('../#include/config.php'); // config, db, Smarty...

$comp_id = intval($_GET['comp'] ?? 0);
$sort    = $_GET['sort'] ?? 'id_desc';
$page    = max(1, intval($_GET['page'] ?? 1));
$perPage = 12;
$offset  = ($page - 1) * $perPage;

// Build ORDER BY
$orderBy = "a.num DESC";
switch ($sort) {
    case 'price_asc':
        $orderBy = "p.price ASC";
        break;
    case 'price_desc':
        $orderBy = "p.price DESC";
        break;
    case 'name_asc':
        $orderBy = "d.name ASC";
        break;
    case 'name_desc':
        $orderBy = "d.name DESC";
        break;
}

// Lấy danh sách sản phẩm
$sql = "SELECT a.id, a.comp, a.num, a.unique_key, a.img_thumb_vn,
               d.name AS name_detail, d.short AS short_detail, d.content AS content_detail,
               p.price, p.priceold
        FROM {$GLOBALS['db_sp']}.articlelist AS a
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
          ON a.id = d.articlelist_id AND d.languageid = {$langid}
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
          ON p.articlelist_id = a.id
        WHERE a.comp = ? AND a.active = 1
        ORDER BY $orderBy
        LIMIT ?, ?";
$articles = $GLOBALS['sp']->GetAll($sql, [$comp_id, $offset, $perPage]);
$smarty->assign('view', $articles);

// Tổng số bản ghi
$countSql = "SELECT COUNT(*) FROM {$GLOBALS['db_sp']}.articlelist WHERE comp = ? AND active = 1";
$total = $GLOBALS['sp']->getOne($countSql, [$comp_id]);
$smarty->assign('CheckNull', $total);

// Tạo link phân trang
$totalPages = ceil($total / $perPage);
$linkpg = '';
for ($i = 1; $i <= $totalPages; $i++) {
    $active = $i == $page ? 'class="active"' : '';
    $linkpg .= "<a href='?comp=$comp_id&sort=$sort&page=$i' $active>$i</a> ";
}
$smarty->assign('linkpg', $linkpg);

// Render template AJAX
$html = $smarty->fetch('products/ajax_list.tpl');

echo json_encode([
    'success' => true,
    'html' => $html,
    'pagination' => $linkpg
]);
exit;
