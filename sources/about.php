<?php

switch ($act) {
    case "detail":

        $sql = "SELECT a.*, d.*
                FROM {$GLOBALS['db_sp']}.articlelist AS a
                LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
                    ON d.articlelist_id = a.id AND d.languageid = {$langid}
                WHERE d.unique_key = '{$unique_key}'";
        $rs = $GLOBALS["sp"]->getRow($sql);
        $smarty->assign("seo", $rs); // có thể dùng chung SEO
        $smarty->assign("detail", $rs);

        break;

    default:
        // Xem danh sách bài viết
        $sql = "SELECT a.id, a.comp, a.num, a.unique_key, 
               d.name AS name_detail, d.unique_key, 
               d.short AS short_detail, 
               d.content AS content_detail
        FROM {$GLOBALS['db_sp']}.articlelist AS a
        LEFT JOIN {$GLOBALS['db_sp']}.articlelist_detail AS d
        ON a.id = d.articlelist_id AND d.languageid = {$langid}
        WHERE a.comp = {$comp_id} AND a.active = 1
        ORDER BY a.num DESC";

        $count = "SELECT COUNT(id) FROM $GLOBALS[db_sp].articlelist WHERE languageid = {$langid} AND active=1 AND comp={$comp_id}";

        // $total = $count = ceil($GLOBALS['sp']->getOne($sql_sum) ?? 0);
        // $num_rows_page = 12;
        // $num_page = ceil($count / $num_rows_page);
        // $begin = (($page ?? 1) - 1) * $num_rows_page;
        // $iSEGSIZE = 5;
        // $linkpg = "";

        // if ($num_page > 1) {
        //     $linkpg = paginatornum($urll ?? '', 1, $num_page, $iSEGSIZE, $cat['id'] ?? 0, 'intro', $path_url ?? '', $UrlLink ?? '', $idd ?? 0, $num_rows_page);
        //     $smarty->assign("Checkpg", "1");
        // }

        // $sql .= " LIMIT $begin,$num_rows_page";
        $articles = $GLOBALS["sp"]->getAll($sql);
        // $smarty->assign("linkpg", $linkpg);
        $smarty->assign("CheckNull", $count);
        $smarty->assign("view", $articles);
        $smarty->assign("seo", $cat);
        break;
}
