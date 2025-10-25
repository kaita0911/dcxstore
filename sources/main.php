<?php
// ================== HELPER FUNCTIONS ==================

// Lấy một row chi tiết theo table và id
// function getDetailRow(string $table, string $idField, int $id, int $lang): array
// {
//     $sql = "SELECT * FROM $GLOBALS[db_sp].$table WHERE $idField = $id AND languageid = $lang";
//     return $GLOBALS['sp']->getRow($sql);
// }

// Lấy danh sách banner home
// function getBannerHome(int $numlang): array
// {
//     $sql = "SELECT a.*, ad.name
//             FROM $GLOBALS[db_sp].articlelist a
//             LEFT JOIN $GLOBALS[db_sp].articlelist_detail ad
//             ON a.id = ad.articlelist_id AND ad.languageid = $numlang
//             WHERE a.active = 1 AND a.comp = 7
//             ORDER BY a.id DESC";
//     return $GLOBALS['sp']->getAll($sql);
// }

// Lấy block news
// function getBlockNew(int $numlang, int $limit = 10): array
// {
//     $sql = "SELECT a.img_thumb_vn, a.unique_key, ad.name, ad.short
//             FROM $GLOBALS[db_sp].articlelist a
//             LEFT JOIN $GLOBALS[db_sp].articlelist_detail ad
//             ON a.id = ad.articlelist_id AND ad.languageid = $numlang
//             WHERE a.comp = 1
//             ORDER BY a.num ASC
//             LIMIT $limit";
//     return $GLOBALS['sp']->getAll($sql);
// }

// // Lấy danh sách categories
// function getListCat(int $numlang): array
// {
//     $sql = "SELECT c.id, c.img_vn, c.unique_key, cd.name
//             FROM $GLOBALS[db_sp].categories c
//             LEFT JOIN $GLOBALS[db_sp].categories_detail cd
//             ON c.id = cd.categories_id AND cd.languageid = $numlang
//             WHERE c.comp = 2 AND c.parentid = 0
//             ORDER BY c.num ASC";
//     return $GLOBALS['sp']->getAll($sql);
// }

// // ================== MAIN LOGIC ==================

// // 1. Content Product
// $contentProduct = $GLOBALS['sp']->getRow(
//     "SELECT * FROM $GLOBALS[db_sp].component_detail WHERE component_id = 2 AND languageid = $numlang"
// );
// $smarty->assign("contentproduct", $contentProduct);

// // 2. Banner Home
// $banners = getBannerHome($numlang);
// $smarty->assign("banners", $banners);

// // 3. Block New
// $listnew = getBlockNew($numlang);
// $smarty->assign("listnew", $listnew);
// // var_dump($listnew);



// // 4. Categories
// $listCat = getListCat($numlang);
// $smarty->assign("listcat", $listCat);

// ================== DEFAULT VARIABLES ==================
// $checkHome    = $checkHome ?? 0;  // 0 = không phải trang chủ, 1 = trang chủ
// $checkcontact = $checkcontact ?? 0;
// $checksearch  = $checksearch ?? 0;

// $smarty->assign("checkHome", $checkHome);
// $smarty->assign("seo", $cat1 ?? []); // $cat1 nếu có

// ================== DISPLAY TEMPLATES ==================
// $rs = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id=15");
// $smarty->assign($seo, $rs);
$is_home = 1;
$smarty->assign('is_home', $is_home);
