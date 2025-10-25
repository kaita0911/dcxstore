<?php

////////////////////////////////////////
// MODULE: Lưu / Chỉnh sửa bài viết
////////////////////////////////////////
function saveArticle()
{
    global $path_url, $path_dir;
    $act  = $_REQUEST["act"] ?? "";
    $id   = $_POST["id"] ?? 0;
    $comp = $_GET["comp"] ?? 0;

    $arr = prepareArticleData($_POST);

    // Ảnh đại diện
    if (!empty($_FILES["img_thumb_vn"]["name"]))
        $arr["img_thumb_vn"] = uploadMainImage($_FILES["img_thumb_vn"], $comp);

    // Insert / Update
    $id = ($act == "addsm") ? insertArticle($arr, $comp) : updateArticle($arr, $id);

    // Gallery
    if (!empty($_FILES["multiimages"]["name"][0]))
        uploadGalleryImages($_FILES["multiimages"], $id);

    // Liên kết dữ liệu phụ
    saveArticleLanguages($id, $_POST);
    savePrice($id, $_POST);
    saveVouchers($id, $_POST);
    saveBrands($id, $_POST);
    saveCategories($id, $_POST);
    saveSizes($id, $_POST);
    saveProperties($id, $comp, $_POST);
}

////////////////////////////////////////
// HELPER FUNCTIONS
////////////////////////////////////////

function prepareArticleData(array $post): array
{
    return [
        "name_vn"    => trim($post["name_vn"] ?? ""),
        "catid"      => intval($post["catid"] ?? 0),
        "unique_key" => createSlug($post["unique_key"] ?? $post["name_vn"] ?? ""),
        "hot"        => isset($post["hot"]) ? 1 : 0,
        "active"     => isset($post["active"]) ? 1 : 0,
        "date"       => date("Y-m-d H:i:s"),
    ];
}

function insertArticle(array $arr, int $comp): int
{
    vaInsert("articlelist", $arr);
    return mysqli_insert_id($GLOBALS['sp']->conn);
}

function updateArticle(array $arr, int $id): int
{
    vaUpdate("articlelist", $arr, "id={$id}");
    return $id;
}

function uploadMainImage(array $file, int $comp): string
{
    $allowed = ["jpg", "jpeg", "png", "gif", "webp"];
    $ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) return "";

    $destDir = "../hinh-anh/san-pham/";
    $newName = uniqid("img_") . ".webp";
    $dest = $destDir . $newName;

    $img = imagecreatefromstring(file_get_contents($file["tmp_name"]));
    imagewebp($img, $dest, 90);
    imagedestroy($img);

    return str_replace("../", "", $dest);
}

function uploadGalleryImages(array $files, int $articleId): void
{
    $count = count($files["name"]);
    for ($i = 0; $i < $count; $i++) {
        if (empty($files["name"][$i])) continue;
        $file = [
            "name"     => $files["name"][$i],
            "tmp_name" => $files["tmp_name"][$i],
        ];
        $path = uploadMainImage($file, 0);
        if ($path) {
            $arr = ["idpr" => $articleId, "img_vn" => $path];
            vaInsert("article_images", $arr);
        }
    }
}

////////////////////////////////////////
// CÁC BẢNG PHỤ
////////////////////////////////////////

// 1️⃣ Lưu đa ngôn ngữ
function saveArticleLanguages(int $articleId, array $post): void
{
    $langs = ['vn', 'en']; // thêm ngôn ngữ khác nếu có
    foreach ($langs as $lang) {
        $detail = [
            "name"        => trim($post["name_{$lang}"] ?? ""),
            "description" => $post["description_{$lang}"] ?? "",
            "content"     => $post["content_{$lang}"] ?? "",
            "seo_title"   => $post["seo_title_{$lang}"] ?? "",
            "seo_desc"    => $post["seo_desc_{$lang}"] ?? "",
            "seo_key"     => $post["seo_key_{$lang}"] ?? "",
            "languageid"  => getLangId($lang),
            "articleid"   => $articleId,
        ];

        $exists = $GLOBALS["sp"]->getOne("SELECT id FROM {$GLOBALS['db_sp']}.articlelist_detail WHERE articleid={$articleId} AND languageid=" . getLangId($lang));
        if ($exists)
            vaUpdate("articlelist_detail", $detail, "articleid={$articleId} AND languageid=" . getLangId($lang));
        else
            vaInsert("articlelist_detail", $detail);
    }
}

// 2️⃣ Lưu giá
function savePrice(int $articleId, array $post): void
{
    $price = floatval($post["price"] ?? 0);
    $pricekm = floatval($post["pricekm"] ?? 0);

    $exists = $GLOBALS["sp"]->getOne("SELECT id FROM {$GLOBALS['db_sp']}.article_price WHERE idpr={$articleId}");
    $arr = ["idpr" => $articleId, "price" => $price, "pricekm" => $pricekm];

    if ($exists)
        vaUpdate("article_price", $arr, "idpr={$articleId}");
    else
        vaInsert("article_price", $arr);
}

// 3️⃣ Lưu voucher
function saveVouchers(int $articleId, array $post): void
{
    $voucherIds = $post["voucher_id"] ?? [];
    $GLOBALS["sp"]->execute("DELETE FROM {$GLOBALS['db_sp']}.voucher_pro WHERE idpr={$articleId}");
    foreach ($voucherIds as $vid) {
        vaInsert("voucher_pro", ["idpr" => $articleId, "voucherid" => intval($vid)]);
    }
}

// 4️⃣ Lưu thương hiệu
function saveBrands(int $articleId, array $post): void
{
    $brandIds = $post["brand_id"] ?? [];
    $GLOBALS["sp"]->execute("DELETE FROM {$GLOBALS['db_sp']}.brand_product WHERE idpr={$articleId}");
    foreach ($brandIds as $bid) {
        vaInsert("brand_product", ["idpr" => $articleId, "brandid" => intval($bid)]);
    }
}

// 5️⃣ Lưu danh mục
function saveCategories(int $articleId, array $post): void
{
    $catIds = $post["cat_id"] ?? [];
    $GLOBALS["sp"]->execute("DELETE FROM {$GLOBALS['db_sp']}.cat_product WHERE idpr={$articleId}");
    foreach ($catIds as $cid) {
        vaInsert("cat_product", ["idpr" => $articleId, "catid" => intval($cid)]);
    }
}

// 6️⃣ Lưu size
function saveSizes(int $articleId, array $post): void
{
    $sizes = $post["size_id"] ?? [];
    $GLOBALS["sp"]->execute("DELETE FROM {$GLOBALS['db_sp']}.size_product WHERE idpr={$articleId}");
    foreach ($sizes as $sid) {
        vaInsert("size_product", ["idpr" => $articleId, "sizeid" => intval($sid)]);
    }
}

// 7️⃣ Lưu thuộc tính / property
function saveProperties(int $articleId, int $comp, array $post): void
{
    $GLOBALS["sp"]->execute("DELETE FROM {$GLOBALS['db_sp']}.properties_product WHERE idpr={$articleId}");
    $properties = $post["property_id"] ?? [];
    foreach ($properties as $pid) {
        vaInsert("properties_product", ["idpr" => $articleId, "propertyid" => intval($pid)]);
    }
}

////////////////////////////////////////
// UTILITIES
////////////////////////////////////////

function createSlug(string $str): string
{
    $str = strtolower(trim($str));
    $str = preg_replace('/[^a-z0-9]+/i', '-', $str);
    return trim($str, '-');
}

function getLangId(string $code): int
{
    return match ($code) {
        'vn' => 1,
        'en' => 2,
        default => 1
    };
}
