<?php


// --- B1: Lấy danh sách ngôn ngữ từ DB ---
$languages = $GLOBALS['sp']->GetAssoc("
    SELECT code, id
    FROM {$GLOBALS['db_sp']}.language
    WHERE active = 1
");

// --- B2: Lấy ngôn ngữ từ URL ---
$uri = trim($_SERVER['REQUEST_URI'], '/');
$langCode = 'vn'; // mặc định

if (preg_match('#^([a-z]{2})(/|$)#', $uri, $matches)) {
    $langCode = $matches[1];
}

// --- B3: Xác định ngôn ngữ đang chọn ---
if (isset($languages[$langCode])) {
    $_SESSION['lang'] = $langCode;
    $_SESSION['langid'] = $languages[$langCode];
} else {
    // fallback: mặc định tiếng Việt
    $_SESSION['lang'] = 'vn';
    $_SESSION['langid'] = $languages['vn'] ?? 1;
}

// --- B4: Gán biến ---
$lang = $_SESSION['lang'];
$langid = $_SESSION['langid'];
$lang_prefix = ($lang != 'vn') ? $lang . '/' : '';

// --- B5: Nếu người dùng đang ở tiếng Việt mà URL vẫn chứa /en/, chuyển về / ---
if ($lang == 'vn' && preg_match('#^en(/|$)#', $uri)) {
    header("Location: /");
    exit;
}
switch ($langid) {
    case 2: // English
        $home    = 'Home';
        $contact = 'Contact';
        break;

    case 1: // Vietnamese
    default:
        $home    = 'Trang chủ';
        $contact = 'Liên hệ';
        break;
}
$smarty->assign("home", $home);
$smarty->assign("contact", $contact);
// --- B6: Gửi vào Smarty ---
$smarty->assign('lang', $lang);
$smarty->assign('langid', $langid);
$smarty->assign('lang_prefix', $lang_prefix);
$smarty->assign('languages', $languages);
