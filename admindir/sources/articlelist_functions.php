<?php
////////////////////////////////////////
// ARTICLELIST HELPER FUNCTIONS
////////////////////////////////////////

function q($sql)
{
    try {
        $GLOBALS['sp']->execute($sql);
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
}
function back($comp, $page_para)
{
    page_transfer2("index.php?do=articlelist&comp=$comp$page_para");
    exit;
}

function loadAddData($comp)
{
    global $db_sp, $sp;
    return [
        'numkai' => $sp->getRow("SELECT * FROM {$db_sp}.articlelist ORDER BY num DESC LIMIT 1"),
        'size'   => $sp->getAll("SELECT * FROM {$db_sp}.articlelist WHERE comp=14 ORDER BY num ASC"),
        'color'  => $sp->getAll("SELECT * FROM {$db_sp}.articlelist WHERE comp=15 ORDER BY num ASC"),
        'catedm' => $sp->getAll("SELECT * FROM {$db_sp}.categories WHERE comp=$comp AND parentid=0"),
    ];
}

function loadEditData($id)
{
    global $db_sp, $sp;
    $id = intval($id);
    return [
        'edit'        => $sp->getRow("SELECT * FROM {$db_sp}.articlelist WHERE id=$id"),
        'edit_name'   => $sp->getAll("SELECT * FROM {$db_sp}.articlelist_detail WHERE articlelist_id=$id ORDER BY languageid ASC"),
        'editprice'   => $sp->getRow("SELECT * FROM {$db_sp}.price WHERE articlelist_id=$id"),
        'multiimages' => $sp->getAll("SELECT * FROM {$db_sp}.gallery_sp WHERE articlelist_id=$id ORDER BY num ASC"),
    ];
}

function loadListOrSearch($comp, $post, $page)
{
    global $db_sp, $sp;
    $names = trim($post["names"] ?? "");
    $cate  = intval($post["catedm"] ?? 0);
    $sql   = "SELECT * FROM {$db_sp}.articlelist WHERE comp=$comp";

    if ($names)  $sql .= " AND name_vn LIKE '%" . addslashes($names) . "%'";
    if ($cate)   $sql = "SELECT * FROM {$db_sp}.articlelist WHERE id IN (
                            SELECT articlelist_id FROM {$db_sp}.articlelist_categories WHERE categories_id=$cate
                        ) ORDER BY id DESC";
    else         $sql .= " ORDER BY id DESC";

    // Tìm kiếm
    if (!empty($post)) return ['view' => $sp->getAll($sql), 'names' => $names];

    // Phân trang
    $num_rows = 50;
    $total = $sp->getOne("SELECT COUNT(id) FROM {$db_sp}.articlelist WHERE comp=$comp");
    $num_page = ceil($total / $num_rows);
    $begin = ($page - 1) * $num_rows;
    $assign = ['view' => $sp->getAll("$sql LIMIT $begin,$num_rows")];
    if ($num_page > 1) $assign += ['linkpg' => pagiad($page, $num_page, $comp), 'Checkpg' => 1];
    return $assign;
}

function copyArticle($ids)
{
    global $db_sp, $sp;
    foreach ($ids as $id) {
        $r = $sp->getRow("SELECT * FROM {$db_sp}.articlelist WHERE id=" . (int)$id);
        if (!$r) continue;
        unset($r["id"]);
        $r["name_vn"]    .= "-" . time();
        $r["unique_key"] .= "-" . time();
        $r["active"] = 1;
        $r["dated_edit"] = date("Y-m-d H:i:s");
        vaInsert("articlelist", $r);
    }
}

function deleteArticles($ids)
{
    global $db_sp;
    $tables = ["articlelist_detail", "articlelist_properties", "price", "articlelist_categories", "gallery_sp", "articlelist"];
    foreach ($ids as $id)
        foreach ($tables as $t) q("DELETE FROM {$db_sp}.$t WHERE articlelist_id=$id OR id=$id");
}

function toggleActive($ids, $status)
{
    global $db_sp;
    $active = $status ? 1 : 0;
    foreach ($ids as $id)
        q("UPDATE {$db_sp}.articlelist SET active=$active WHERE id=" . (int)$id);
}

function reorderArticles($post)
{
    global $db_sp;
    foreach ($post["id"] ?? [] as $i => $id)
        q("UPDATE {$db_sp}.articlelist SET num=" . (int)$post["ordering"][$i] . " WHERE id=" . (int)$id);
}
