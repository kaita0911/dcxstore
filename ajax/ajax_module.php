<?php

include_once('../#include/config.php');
include_once('../#include/get_languages.php');

//$cat1 = $_GET['cat1'] ?? '';       // ví dụ 'tin-tuc'
$comp_id = $_GET['comp'] ?? '';
$module = $_GET['module'] ?? '';
$sub = $_GET['sub'] ?? '';
$cate_id = $_GET['cate_id'] ?? '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_Page = 6;
$start = ($page - 1) * $per_Page;
$sort = $_GET['sort'] ?? '';
$whereDetail = '';
$joinSql = '';

if (!empty($cate_id)) {
    $whereDetail = " AND ac.categories_id = {$cate_id} ";
    $joinSql .= "
        INNER JOIN {$GLOBALS['db_sp']}.articlelist_categories AS ac
            ON ac.articlelist_id = a.id";
}

switch ($comp_id) {
    case '1':
        $per_Page = 3; // <-- đặt riêng cho case 1
        $start = ($page - 1) * $per_Page;
        // Xem danh sách bài viết
        $sql = "SELECT a.id, a.comp, a.num, a.unique_key, a.img_thumb_vn,a.dated,
               d.name AS name_detail, d.unique_key, 
               d.short AS short_detail, 
               d.content AS content_detail
        FROM {$GLOBALS['db_sp']}.articlelist AS a
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
        ON a.id = d.articlelist_id AND d.languageid = {$langid}
        WHERE a.comp = {$comp_id} AND a.active = 1
        ORDER BY a.num DESC  LIMIT $start, $per_Page";

        $articles = $GLOBALS["sp"]->getAll($sql);
        $smarty->assign("view", $articles);

        // Tổng số bản ghi
        $countSql = "SELECT COUNT(*) FROM {$GLOBALS['db_sp']}.articlelist WHERE comp = ? AND active = 1";
        $total = $GLOBALS['sp']->getOne($countSql, [$comp_id]);

        // --- Tổng số trang ---
        $smarty->assign("totalPages", ceil($total / $per_Page));
        $smarty->assign("Checkpg", $totalPages > 1 ? 1 : 0);
        $smarty->assign("currentPage", $page);

        $smarty->assign("CheckNull", $total);
        $smarty->assign('per_Page', $per_Page);
        //$smarty->assign('module', $module);
        $smarty->assign('comp', $comp_id);
        $html = $smarty->fetch("articles/list.tpl");
        $pagination = $smarty->fetch("articles/pagination.tpl");
        break;

    case '2':
        $per_Page = 12;
        $start = ($page - 1) * $per_Page;

        // Build ORDER BY
        $orderBy = match ($sort) {
            'price_asc' => 'p.price ASC',
            'price_desc' => 'p.price DESC',
            'name_asc' => 'd.name ASC',
            'name_desc' => 'd.name DESC',
            default => 'a.num DESC'
        };

        // Xem danh sách bài viết
        $sql = "SELECT a.id, a.comp, a.num, a.unique_key, a.img_thumb_vn,a.dated,
        d.name AS name_detail, d.unique_key, 
        d.short AS short_detail, 
        d.content AS content_detail, p.price,p.priceold
        FROM {$GLOBALS['db_sp']}.articlelist AS a
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
        ON a.id = d.articlelist_id AND d.languageid = {$langid}
        {$joinSql}
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
        ON p.articlelist_id = a.id   -- nối với bảng giá
        WHERE a.comp = {$comp_id} AND a.active = 1 
        {$whereDetail}
        ORDER BY $orderBy LIMIT $start, $per_Page";
        $articles = $GLOBALS["sp"]->getAll($sql);
        $smarty->assign("view", $articles);

        // Tổng số bản ghi
        $countSql = "SELECT COUNT(a.id) FROM {$GLOBALS['db_sp']}.articlelist AS a
          {$joinSql}
         WHERE a.comp = {$comp_id} AND a.active = 1 {$whereDetail}";
        $total = $GLOBALS['sp']->getOne($countSql);

        // --- Tổng số trang ---
        $totalPages = ceil($total / $per_Page);
        $smarty->assign("totalPages", $totalPages);
        $smarty->assign("Checkpg", $totalPages > 1 ? 1 : 0);
        $smarty->assign("currentPage", $page);

        $smarty->assign("CheckNull", $total);
        //$smarty->assign('per_Page', $per_Page);
        $smarty->assign('module', $module);
        $smarty->assign('comp', $comp_id);
        $smarty->assign('sort', $sort);
        $html = $smarty->fetch("products/list.tpl");
        $pagination = $smarty->fetch("products/pagination.tpl");
        break;

    default:
        echo json_encode(["success" => false, "message" => "comp không tồn tại"]);
        exit;
}

// Trả về JSON
echo json_encode([
    "success" => true,
    "html" => $html,
    "pagination" => $pagination
]);
exit;
