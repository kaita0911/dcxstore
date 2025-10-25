<?php
switch ($act) {

    case "detail":
        $sql = "SELECT a.*, d.*
                FROM {$GLOBALS['db_sp']}.articlelist AS a
                LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
                    ON d.articlelist_id = a.id AND d.languageid = {$langid}
                WHERE d.unique_key = '{$unique_key}'";
        $rs = $GLOBALS["sp"]->getRow($sql);
        ///Tin liên quan
        $sql_related = "SELECT a.id, a.comp, a.num, a.unique_key, a.img_thumb_vn, a.dated,
         d.name AS name_detail, d.unique_key
        FROM {$GLOBALS['db_sp']}.articlelist AS a
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
        ON d.articlelist_id = a.id AND d.languageid = {$langid}
        WHERE a.id != {$rs['articlelist_id']} AND a.comp = {$rs['comp']}  AND a.active = 1
        ORDER BY a.num DESC";
        $rs_related = $GLOBALS["sp"]->getAll($sql_related);
        $smarty->assign("articles_related", $rs_related);

        $smarty->assign("detail", $rs);
        $smarty->assign("seo", $rs);
        $menu_name = $rs['name'];
        $smarty->assign('c_ttl', $menu_name);

        break;

    default:
        //var_dump($cat1);
        $smarty->assign('data_url', $cat1);
        $smarty->assign('data_comp', $comp_id);

        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $per_Page = 6;
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

        $smarty->assign("CheckNull", $total);
        $smarty->assign('per_Page', $per_Page);

        // --- Tổng số trang ---
        $totalPages = ceil($total / $per_Page);
        $smarty->assign("Checkpg", $totalPages > 1 ? 1 : 0);


        // --- AJAX Response ---
        if (isset($_GET['ajax'])) {
            $html = $smarty->fetch("articles/list_ajax.tpl");
            $pagination = $smarty->fetch("articles/ajax_pagination.tpl");
            echo json_encode([
                "success" => true,
                "html" => $html,
                "pagination" => $pagination
            ]);
            exit;
        }
        // --- SEO & Tiêu đề ---
        $menu_name = $menu[$comp_id]['name'] ?? 'Tin tức';
        $smarty->assign('c_ttl', $menu_name);

        break;
}
