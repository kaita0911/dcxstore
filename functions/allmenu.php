<?php
// // Lấy thông tin website
// $sql = "SELECT * FROM $GLOBALS[db_sp].infos WHERE id=13";
// $rsweb = $GLOBALS["sp"]->getRow($sql);

// Gán random CSS id
$smarty->assign('randcss', rand(1, 10000000));
// =================== Mặc định các biến ===================


$now = (new DateTime())->format('YmdHis');
$smarty->assign('currentTime', $now);
/////////////////////////// Load Menu Top ///////////////////////////
// 2️⃣ Lặp qua từng menu để lấy danh mục con (category)
$sql_cat = "SELECT c.id, c.comp, c.active,
           d.name AS name_detail, d.unique_key
            FROM {$GLOBALS['db_sp']}.categories AS c
            LEFT JOIN {$GLOBALS['db_sp']}.categories_detail AS d
                ON d.categories_id = c.id AND d.languageid = {$langid}
            WHERE c.active = 1
            ORDER BY c.num ASC";
$categories = $GLOBALS['sp']->getAll($sql_cat);
// Gom lại thành mảng theo id
$catMap = [];
foreach ($categories as $c) {
    $catMap[$c['id']] = $c;
}
// 2️⃣ Lấy quan hệ cha - con từ bảng articlecat_related
$sql_rel = "SELECT category_id, related_id FROM {$GLOBALS['db_sp']}.categories_related";
$relations = $GLOBALS['sp']->getAll($sql_rel);

// Gom nhóm con theo cha
$childrenMap = [];
$childIds = [];

foreach ($relations as $r) {
    $parentIds[] = $r['related_id'];
    $childrenMap[$r['related_id']][] = $r['category_id'];
}
$childIds = array_unique($childIds);

// 3️⃣ Tìm danh mục cha cấp 1 (những cái không nằm trong category_id)
$childIds = array_column($relations, 'category_id');
$rootCats = [];
foreach ($categories as $c) {
    if (!in_array($c['id'], $childIds)) {
        $rootCats[] = $c;
    }
}
// 4️⃣ Hàm đệ quy dựng cây danh mục
function buildCategoryTree($cat, $childrenMap, $catMap)
{
    $catId = $cat['id'];
    $cat['children'] = [];

    if (!empty($childrenMap[$catId])) {
        foreach ($childrenMap[$catId] as $childId) {
            if (isset($catMap[$childId])) {
                $cat['children'][] = buildCategoryTree($catMap[$childId], $childrenMap, $catMap);
            }
        }
    }

    return $cat;
}
// 5️⃣ Dựng cây danh mục hoàn chỉnh
$categoryTree = [];
foreach ($rootCats as $root) {
    $categoryTree[] = buildCategoryTree($root, $childrenMap, $catMap);
}

$smarty->assign("categories_tree", $categoryTree);

$sql = "SELECT m.id,m.comp,
               d.name AS name_detail, d.unique_key AS unique_key_detail
        FROM {$GLOBALS['db_sp']}.menu AS m
        LEFT JOIN {$GLOBALS['db_sp']}.menu_detail AS d
            ON d.menu_id = m.id AND d.languageid = {$langid}
        WHERE m.active = 1
        ORDER BY m.num ASC";

$menus = $GLOBALS['sp']->getAll($sql);
///

foreach ($menus as &$menu) {
    // var_dump($menu['unique_key_detail']);
    // Nếu là menu "Giới thiệu" (hoặc comp tương ứng)
    if ($menu['unique_key_detail'] === 'gioi-thieu') {

        $first_article = $GLOBALS['sp']->getRow("
            SELECT d.unique_key
            FROM {$GLOBALS['db_sp']}.articlelist AS a
            LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
                ON d.articlelist_id = a.id AND d.languageid = {$langid}
            WHERE a.comp = {$menu['comp']} AND a.active = 1
            ORDER BY a.num ASC");
        if ($first_article) {
            $menu['unique_key_detail'] = $first_article['unique_key'] . '.html';
        }
    }
}
// Gắn categoryTree theo comp
foreach ($menus as &$m) {
    $m['categories'] = array_filter($categoryTree, fn($c) => $c['comp'] == $m['comp']);
}
unset($m);
$smarty->assign("menus", $menus);

/////////////////////////// Load Infos ///////////////////////////
// Danh sách id cần lấy từ bảng infos
$infos_ids = [
    1 => 'logoHome',
    3 => 'map',
    4 => 'banknd',
    5 => 'hotline',
    6 => 'email',
    7 => 'phoneaddressemail',

    11 => 'introfooter',
    12 => 'showcart',
    14 => 'showkichomausac',
    15 => 'seo',
    17 => 'headerscript',
    18 => 'bodyscript',
    22 => 'makm'
];

foreach ($infos_ids as $id => $varname) {
    $rs = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id=$id") ?? [];
    $smarty->assign($varname, $rs);
}

// // Meta Copyright & Author
// $copyright = $GLOBALS['sp']->getOne("SELECT content_{$lang} FROM {$GLOBALS['db_sp']}.infos WHERE id=8");
// $smarty->assign("copyrightMeta", trim(strip_tags($copyright)));

// $author = $GLOBALS['sp']->getOne("SELECT content_{$lang} FROM {$GLOBALS['db_sp']}.infos WHERE id=5");
// $smarty->assign("author", trim(strip_tags($author)));

// /////////////////////////// Load thành phố, quận/huyện ///////////////////////////
// $thanhpho = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.thanhpho ORDER BY num ASC");
// $quanhuyen = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.quanhuyen");

// $smarty->assign("thanhpho", $thanhpho);
// $smarty->assign("quanhuyen", $quanhuyen);

// /////////////////////////// Load Vouchers ///////////////////////////
// $listvouchers = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.vouchers WHERE active=1 ORDER BY id DESC");
// $smarty->assign("listvouchers", $listvouchers);

// /////////////////////////// Load Language ///////////////////////////
// $rs_lg = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.language WHERE active = 1");
// $smarty->assign("countlg", $rs_lg);
// $smarty->assign("checklg", ceil(count($rs_lg)));

// /////////////////////////// Footer ///////////////////////////
// $rs_footer = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.footer ORDER BY id ASC LIMIT 1");
// if ($rs_footer) {
//     $smarty->assign("gioithieuFooter", $rs_footer);
//     $rs_footer_detail = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.footer_detail WHERE languageid = {$numlang} AND footer_id = {$rs_footer['id']}");
//     $smarty->assign("Footer", $rs_footer_detail);
// }
