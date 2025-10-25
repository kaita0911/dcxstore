<?php
include_once('#include/config.php');
include_once('functions/function.php');
include_once('#include/get_languages.php');
include_once('functions/allmenu.php');

$cat1       = $_GET['cat1'] ?? '';
$unique_key = $_GET['unique_key'] ?? '';

$menu_list = $GLOBALS["sp"]->getAll("
    SELECT m.id, m.comp, m.has_sub, d.name AS name_detail, d.unique_key AS unique_key_detail
    FROM {$GLOBALS['db_sp']}.menu AS m
    LEFT JOIN {$GLOBALS['db_sp']}.menu_detail AS d
        ON d.menu_id = m.id AND d.languageid = {$langid}
");

function determineRoute($cat1, $unique_key, $menu_list, $langid, $db)
{
    $result = [
        'do'        => 'main',
        'act'       => 'main',
        'page_flag' => 'home',
        'comp_id'   => 0,
        'cate_id'   => 0,
        'menu_name' => 'Trang chủ'
    ];

    $fixed_pages = ['404', 'thanh-toan', 'finish', 'dat-hang', 'gio-hang', 'mua-nhanh', 'addajax', 'lien-he', 'tim-kiem'];
    $cat1_data = null;
    foreach ($menu_list as $item) {
        if ($item['unique_key_detail'] === $cat1) {
            $cat1_data = $item;
            break;
        }
    }

    if ($cat1_data) {
        $result['menu_name'] = $cat1_data['name_detail'];
        $result['comp_id']   = $cat1_data['comp'];
        $url = $cat1_data['unique_key_detail'];

        // Nếu menu là fixed page
        if (in_array($url, $fixed_pages)) {
            switch ($url) {
                case '404':
                    $result['do'] = 'error-404';
                    break;

                case 'gio-hang':
                    $result['do'] = 'cart';
                    $result['act'] = 'list';
                    break;
                case 'mua-nhanh':
                case 'thanh-toan':
                    $result['do'] = 'cart';
                    $result['act'] = 'thanh-toan';
                    break;
                case 'dat-hang':
                    $result['do'] = 'cart';
                    $result['act'] = 'dat-hang';
                    break;
                case 'lien-he':
                    $result['do'] = 'contact';
                    $result['act'] = 'list';
                    break;
                case 'tim-kiem':
                    $result['do'] = 'search';
                    $result['act'] = 'list';
                    break;
                case 'finish':
                    $result['do'] = 'cart';
                    $result['act'] = 'finish';
                    $result['menu_name'] = 'Hoàn tất';
                    break;
            }

            $result['page_flag'] = $result['do'];
            return $result;
        }

        // Nếu menu bình thường → lấy comp → so sánh với component
        if (!empty($cat1_data['comp'])) {
            $comp = $db->getRow("SELECT do FROM {$db->db_sp}.component WHERE id={$cat1_data['comp']}");
            if ($comp) {
                $result['do'] = $comp['do'];
                $result['act'] = 'view';
                $result['page_flag'] = $comp['do'];
            }
        }

        return $result;
    }


    if (!empty($cat1) && in_array($cat1, $fixed_pages)) {
        switch ($cat1) {
            case '404':
                $result['do'] = 'error-404';
                $result['menu_name'] = '404';
                break;
            case 'thanh-vien':
                $result['do'] = 'member';
                $result['act'] = 'list';
                break;
            case 'gio-hang':
                $result['do'] = 'cart';
                $result['act'] = 'list';
                $result['menu_name'] = 'Giỏ hàng';
                break;
            case 'mua-nhanh':
            case 'thanh-toan':
                $result['do'] = 'cart';
                $result['act'] = 'thanh-toan';
                $result['menu_name'] = 'Thanh toán';
                break;
            case 'dat-hang':
                $result['do'] = 'cart';
                $result['act'] = 'dat-hang';
                $result['menu_name'] = 'Đặt hàng';
                break;
            case 'lien-he':
                $result['do'] = 'contact';
                $result['act'] = 'list';
                $result['menu_name'] = 'Liên hệ';
                break;
            case 'tim-kiem':
                $result['do'] = 'search';
                $result['act'] = 'list';
                $result['menu_name'] = 'Search';
                break;
            case 'finish':
                $result['do'] = 'cart';
                $result['act'] = 'finish';
                $result['menu_name'] = 'Hoàn tất';
                break;
        }

        $result['page_flag'] = $result['do'];
        return $result;
    }

    if (!empty($cat1)) {
        $category = $db->getRow("
            SELECT c.id,c.comp,d.name,d.unique_key
            FROM {$db->db_sp}.categories AS c
            LEFT JOIN {$db->db_sp}.categories_detail AS d
            ON d.categories_id=c.id AND d.languageid={$langid}
            WHERE d.unique_key='{$cat1}' LIMIT 1
        ");
        if ($category) {
            $comp = $db->getRow("SELECT do, act FROM {$db->db_sp}.component WHERE id={$category['comp']}");
            $result['do']        = $comp['do'];
            $result['act']       = 'sub';
            $result['page_flag'] = $comp['do'];
            $result['comp_id']   = $category['comp'];
            $result['cate_id']   = $category['id'];
            $result['menu_name'] = $category['name'];
            return $result;
        }
    }

    if (!empty($unique_key)) {
        $article = $db->getRow("
            SELECT a.active, d.articlelist_id,d.languageid,d.unique_key,a.comp
            FROM {$db->db_sp}.articlelist AS a
            LEFT JOIN {$db->db_sp}.articlelist_detail AS d
            ON d.articlelist_id=a.id AND d.languageid={$langid}
            WHERE d.unique_key='{$unique_key}' AND a.active=1
        ");
        if ($article) {
            $comp = $db->getRow("SELECT do, act FROM {$db->db_sp}.component WHERE id={$article['comp']}");
            $result['do']        = $comp['do'];
            $result['act']       = 'detail';
            $result['page_flag'] = $comp['do'];
            $result['comp_id']   = $article['comp'];
            $result['comp_id']   = $article['comp'];
            $result['unique_key']   = $unique_key;
        }
        return $result;
    }

    return $result;
}

$route = determineRoute($cat1, $unique_key, $menu_list, $langid, $GLOBALS['sp']);

// 🔹 Gán các biến route cho tất cả page con
$do       = $route['do'];
$act      = $route['act'];
$comp_id  = $route['comp_id'];
$cate_id  = $route['cate_id'];
$page_flag = $route['page_flag'];
$menu_name = $route['menu_name'];
if ($route['page_flag'] == 'search') {
    $page_flag = 'products';
}

$smarty->assign([
    'c_ttl'     => $menu_name,
    'page_flag' => $page_flag
]);
$breadcrumbs = buildBreadcrumb($langid, $path_url, $cat1, $unique_key);
$smarty->assign('breadcrumbs', $breadcrumbs);

$source_file = "./sources/{$do}.php";
if (!file_exists($source_file)) {
    die("File {$source_file} không tồn tại!");
}
require($source_file);

$template_body = "templates/tpl/{$do}/{$act}.tpl";
if (!file_exists($template_body)) die("Template {$template_body} không tồn tại!");
$smarty->assign('template_body', $template_body);

$noHeaderFooterPages = ['cart'];
if (!in_array($page_flag, $noHeaderFooterPages)) {
    $smarty->display("templates/tpl/head.tpl");
    $smarty->display("templates/tpl/header.tpl");
    $smarty->display("templates/tpl/body.tpl");
    $smarty->display("templates/tpl/footer.tpl");
    $smarty->display("templates/tpl/js.tpl");
} else {
    $smarty->display("templates/tpl/head.tpl");
    $smarty->display("templates/tpl/body.tpl");
    $smarty->display("templates/tpl/js.tpl");
}
