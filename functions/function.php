<?php

function getCategoryChain($categoryId, $langid)
{
    $chain = [];
    while ($categoryId) {
        $category = $GLOBALS['sp']->getRow("
            SELECT c.id, d.name, d.unique_key, cr.related_id
            FROM {$GLOBALS['db_sp']}.categories AS c
            LEFT JOIN {$GLOBALS['db_sp']}.categories_detail AS d
                ON d.categories_id = c.id AND d.languageid = {$langid}
            LEFT JOIN {$GLOBALS['db_sp']}.categories_related AS cr
                ON cr.category_id = c.id
            WHERE c.id = {$categoryId}
            LIMIT 1
        ");

        if (!$category) break;

        array_unshift($chain, [
            'id' => $category['id'],
            'name' => $category['name'],
            'unique_key' => $category['unique_key']
        ]);

        if (!empty($category['related_id'])) {
            $categoryId = $category['related_id'];
        } else {
            break;
        }
    }
    return $chain;
}

function buildBreadcrumb($langid, $path_url, $cat1 = '', $unique_key = '')
{
    if ($langid == 1) {
        $home_name = 'Trang chủ';
    } elseif ($langid == 2) {
        $home_name = 'Home';
    } elseif ($langid == 3) {
        $home_name = 'ホーム';
    } else {
        $home_name = 'Home';
    }
    $breadcrumbs = [];
    $breadcrumbs[] = ['name' => $home_name, 'link' => $path_url];

    // 1️⃣ Menu hoặc danh mục từ URL
    if (!empty($cat1)) {
        $menu = $GLOBALS['sp']->getRow("
            SELECT m.id, m.comp, d.name, d.unique_key
            FROM {$GLOBALS['db_sp']}.menu AS m
            LEFT JOIN {$GLOBALS['db_sp']}.menu_detail AS d
                ON d.menu_id = m.id AND d.languageid = {$langid}
            WHERE d.unique_key = '{$cat1}'
            LIMIT 1
        ");

        if ($menu) {
            $breadcrumbs[] = ['name' => $menu['name'], 'link' => "{$path_url}/{$menu['unique_key']}/"];
        } else {
            $category = $GLOBALS['sp']->getRow("
                SELECT c.id
                FROM {$GLOBALS['db_sp']}.categories AS c
                LEFT JOIN {$GLOBALS['db_sp']}.categories_detail AS d
                    ON d.categories_id = c.id AND d.languageid = {$langid}
                WHERE d.unique_key = '{$cat1}'
                LIMIT 1
            ");
            if ($category) {
                $chain = getCategoryChain($category['id'], $langid);
                foreach ($chain as $c) {
                    $breadcrumbs[] = [
                        'name' => $c['name'],
                        'link' => "{$path_url}/{$c['unique_key']}/"
                    ];
                }
            }
        }
    }

    // 2️⃣ Chi tiết bài viết
    if (!empty($unique_key)) {
        $article = $GLOBALS['sp']->getRow("
            SELECT a.id, a.comp, d.name AS article_name
            FROM {$GLOBALS['db_sp']}.articlelist AS a
            LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
                ON d.articlelist_id = a.id AND d.languageid = {$langid}
            WHERE d.unique_key = '{$unique_key}'
            LIMIT 1
        ");

        if ($article) {
            // Lấy tất cả category mà bài viết thuộc về
            $article_categories = $GLOBALS['sp']->getAll("
                SELECT categories_id
                FROM {$GLOBALS['db_sp']}.articlelist_categories
                WHERE articlelist_id = {$article['id']}
            ");

            if ($article_categories) {
                foreach ($article_categories as $ac) {
                    $chain = getCategoryChain($ac['categories_id'], $langid);
                    foreach ($chain as $c) {
                        // Tránh trùng lặp breadcrumb cùng tên → cùng URL
                        $exists = false;
                        foreach ($breadcrumbs as $b) {
                            if ($b['link'] === "{$path_url}/{$c['unique_key']}/") {
                                $exists = true;
                                break;
                            }
                        }
                        if (!$exists) {
                            $breadcrumbs[] = [
                                'name' => $c['name'],
                                'link' => "{$path_url}/{$c['unique_key']}/"
                            ];
                        }
                    }
                }
            }

            // Cuối cùng thêm bài viết
            $breadcrumbs[] = ['name' => $article['article_name'], 'link' => ''];
        }
    }

    return $breadcrumbs;
}
//////////