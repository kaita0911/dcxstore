<?php


switch ($act) {

    case "detail":
        //$unique_key = $_GET['unique_key'] ?? '';
        $sql = "SELECT a.*, d.*, p.price, p.priceold
                FROM {$GLOBALS['db_sp']}.articlelist AS a
                LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
                    ON d.articlelist_id = a.id AND d.languageid = {$langid}
                LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
                    ON p.articlelist_id = a.id
                WHERE d.unique_key = '{$unique_key}'";
        $rs = $GLOBALS["sp"]->getRow($sql);
        $smarty->assign("seo", $rs);
        $smarty->assign("detail", $rs);
        $menu_name   = $rs['name'];
        $smarty->assign('c_ttl', $menu_name);
        //var_dump($rs['articlelist_id']);
        ///////////////lay nhieu hinh/
        $images = $GLOBALS['sp']->getAll("SELECT *
                                    FROM {$GLOBALS['db_sp']}.gallery_sp
                                    WHERE articlelist_id = {$rs['articlelist_id']}
                                    ORDER BY num ASC");
        $smarty->assign('product_images', $images);

        ///Tin liên quan
        $sql_related = "
        SELECT a.*, d.*, p.price, p.priceold , d.name AS name_detail, d.unique_key AS link_detail
        FROM {$GLOBALS['db_sp']}.articlelist AS a
        INNER JOIN {$GLOBALS['db_sp']}.articlelist_categories AS ac
            ON ac.articlelist_id = a.id
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
            ON d.articlelist_id = a.id AND d.languageid = {$langid}
        LEFT JOIN (
            SELECT articlelist_id, MIN(price) AS price, MIN(priceold) AS priceold
            FROM {$GLOBALS['db_sp']}.articlelist_price
            GROUP BY articlelist_id
        ) AS p
            ON p.articlelist_id = a.id
        WHERE a.id != {$rs['articlelist_id']}
          AND ac.categories_id IN (
              SELECT categories_id
              FROM {$GLOBALS['db_sp']}.articlelist_categories
              WHERE articlelist_id = {$rs['articlelist_id']}
          )
          AND a.active = 1
        GROUP BY a.id
        ORDER BY a.num DESC
        ";

        $rs_related = $GLOBALS["sp"]->GetAll($sql_related);
        $smarty->assign("articles_related", $rs_related);

        break;

    case "sub":
        ///$cat1 = $_GET['cat1'] ?? '';       // ví dụ 'tin-tuc'
        //var_dump($act);
        // Trang danh sách sản phẩm với phân trang & sort
        $smarty->assign('data_url', $cat1);
        $smarty->assign('data_comp', $comp_id);
        $smarty->assign('data_cateid', $cate_id);
        $smarty->assign('data_sub', $act);

        //$sort = $_GET['sort'] ?? 'id_desc';
        //$page = max(1, intval($_GET['page'] ?? 1));
        //$per_Page = 15;
        //$offset = ($page - 1) * $per_Page;

        // // Build ORDER BY
        // $orderBy = match ($sort) {
        //     'price_asc' => 'p.price ASC',
        //     'price_desc' => 'p.price DESC',
        //     'name_asc' => 'd.name ASC',
        //     'name_desc' => 'd.name DESC',
        //     default => 'a.num DESC'
        // };

        // $sql = "SELECT a.id, a.comp, a.num, d.unique_key, a.img_thumb_vn,
        //    d.name AS name_detail,p.price,p.priceold,
        //    d.unique_key AS unique_key_detail
        //             FROM {$GLOBALS['db_sp']}.articlelist AS a
        //             LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
        //                 ON a.id = d.articlelist_id AND d.languageid = {$langid}
        //             INNER JOIN {$GLOBALS['db_sp']}.articlelist_categories AS ac
        //                 ON ac.articlelist_id = a.id
        //             LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
        //                 ON p.articlelist_id = a.id   -- nối với bảng giá
        //             WHERE a.comp = {$comp_id} AND a.active = 1
        //             AND ac.categories_id = {$cate_id}
        //           ORDER BY $orderBy LIMIT $offset, $per_Page";



        // $countSql = "SELECT COUNT(a.id)
        // FROM {$GLOBALS['db_sp']}.articlelist AS a
        // INNER JOIN {$GLOBALS['db_sp']}.articlelist_categories AS ac
        //     ON ac.articlelist_id = a.id
        // WHERE a.comp = ? AND a.active = 1 AND ac.categories_id = ?";
        // $total = $GLOBALS['sp']->getOne($countSql, [$comp_id, $cate_id]);

        //$smarty->assign("CheckNull", $total);
        //$smarty->assign('per_Page', $per_Page);
        //$articles = $GLOBALS["sp"]->getAll($sql);
        //$smarty->assign("sub", $articles);

        // --- AJAX Response ---
        if (isset($_GET['ajax'])) {
            $html = $smarty->fetch("products/list.tpl");
            $pagination = $smarty->fetch("products/pagination.tpl");
            echo json_encode([
                "success" => true,
                "html" => $html,
                "pagination" => $pagination
            ]);
            exit;
        }
        // $count = "SELECT COUNT(*) FROM $GLOBALS[db_sp].articlelist WHERE languageid = {$langid} AND active=1 AND comp={$comp_id}";
        // $articles = $GLOBALS["sp"]->getAll($sql);

        // $smarty->assign("CheckNull", $count);
        // $smarty->assign("view", $articles);
        break;

    default:
        // Trang danh sách sản phẩm với phân trang & sort
        $smarty->assign('data_url', $cat1);
        $smarty->assign('data_comp', $comp_id);

        // $sort = $_GET['sort'] ?? 'id_desc';
        // $page = max(1, intval($_GET['page'] ?? 1));
        // $per_Page = 12;
        // $offset = ($page - 1) * $per_Page;

        // // Build ORDER BY
        // $orderBy = match ($sort) {
        //     'price_asc' => 'p.price ASC',
        //     'price_desc' => 'p.price DESC',
        //     'name_asc' => 'd.name ASC',
        //     'name_desc' => 'd.name DESC',
        //     default => 'a.num DESC'
        // };

        // // Xem danh sách bài viết
        // $countSql = "SELECT a.id, a.comp, a.num, a.unique_key, a.img_thumb_vn,a.dated,
        //        d.name AS name_detail, d.unique_key, 
        //        d.short AS short_detail, 
        //        d.content AS content_detail, p.price,p.priceold
        // FROM {$GLOBALS['db_sp']}.articlelist AS a
        // LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
        // ON a.id = d.articlelist_id AND d.languageid = {$langid}
        // LEFT JOIN {$GLOBALS['db_sp']}.articlelist_price AS p
        // ON p.articlelist_id = a.id   -- nối với bảng giá
        // WHERE a.comp = {$comp_id} AND a.active = 1
        // ORDER BY $orderBy LIMIT $offset, $per_Page";

        // $articles = $GLOBALS["sp"]->getAll($countSql);
        // $smarty->assign("view", $articles);

        // // Tổng số bản ghi
        // $countSql = "SELECT COUNT(*) FROM {$GLOBALS['db_sp']}.articlelist WHERE comp = ? AND active = 1";
        // $total = $GLOBALS['sp']->getOne($countSql, [$comp_id]);

        // $smarty->assign("CheckNull", $total);
        // $smarty->assign('per_Page', $per_Page);


        // --- AJAX Response ---
        if (isset($_GET['ajax'])) {
            $html = $smarty->fetch("products/list.tpl");
            $pagination = $smarty->fetch("products/pagination.tpl");
            echo json_encode([
                "success" => true,
                "html" => $html,
                "pagination" => $pagination
            ]);
            exit;
        }
        break;
}
