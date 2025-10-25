<?php

// ====================== PHÂN TRANG ======================
function pagiad($page, $num_page, $comp)
{
    $output = '';

    for ($i = 1; $i <= $num_page; $i++) {
        if ($i == $page) {
            $output .= '<li class="active"><a href="index.php?do=articlelist&comp=' . $comp . '&page=' . $i . '">' . $i . '</a></li>';
        } else {
            $output .= '<li><a href="index.php?do=articlelist&comp=' . $comp . '&page=' . $i . '">' . $i . '</a></li>';
        }
    }

    return $output;
}

function paginator($num_page, $page, $seg_size, $url)
{
    $alink = '';
    $lastpage = $num_page;
    $seg_num = ceil($num_page / $seg_size);
    $seg_cur = ceil($page / $seg_size);

    $first_page = 1;
    $back_page = $page - 1;
    $n = min($seg_cur * $seg_size, $lastpage);

    $seg_page = range(($seg_cur - 1) * $seg_size + 1, $n);

    // back buttons
    if ($seg_cur > 1) {
        $alink .= "<a href='$url&p=$first_page'>Đầu</a>";
        $alink .= "<a href='$url&p=$back_page'>&lt;&lt;</a>";
    } else {
        $alink .= "<span>Đầu</span><span>&lt;&lt;</span>";
    }

    foreach ($seg_page as $p) {
        if ($p == $page) $alink .= "<span style='color:#0066FF'>$p</span>";
        else $alink .= "<a href='$url&p=$p'>$p</a>";
    }

    // next buttons
    $next_page = $page + 1;
    $last_page = $lastpage;

    if ($seg_cur < $seg_num) {
        $alink .= "<a href='$url&p=$next_page'>&gt;&gt;</a>";
        $alink .= "<a href='$url&p=$last_page'>Cuối</a>";
    } else {
        $alink .= "<span>&gt;&gt;</span><span>Cuối</span>";
    }

    return $alink;
}

// ====================== KIỂM TRA LOGIN ======================
function CheckCountLogin()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $r = $GLOBALS["sp"]->getRow("SELECT * FROM $GLOBALS[db_sp].banned_ip WHERE ip='$ip'");
    if ($r) {
        echo "<script>document.location.href='../index.html';</script>";
        exit;
    }

    $timeout = time() - 3600;
    $GLOBALS["sp"]->execute("DELETE FROM $GLOBALS[db_sp].banned_ip WHERE timestamp < $timeout");

    if (isset($_SESSION['counter_artseed_login']) && $_SESSION['counter_artseed_login'] > 3) {
        $GLOBALS["sp"]->execute("INSERT INTO $GLOBALS[db_sp].banned_ip(ip,timestamp) VALUES ('$ip', '" . time() . "')");
    }
}

// ====================== SQL HELPER ======================
function StripSql($data)
{
    return str_replace("\''", "''", str_replace("'", "''", $data));
}

function vaInsert($table, $arr)
{
    if (empty($arr)) return false;
    $keys = array_keys($arr);
    $values = array_map('StripSql', array_values($arr));
    $sql = "INSERT INTO $GLOBALS[db_sp].$table (`" . implode("`,`", $keys) . "`) VALUES ('" . implode("','", $values) . "');";
    $GLOBALS["sp"]->execute($sql);
    return $GLOBALS["sp"]->Insert_ID();
}

function vaUpdate($table, $arr, $where = "")
{
    if (empty($arr)) return false;
    $updates = [];
    foreach ($arr as $k => $v) $updates[] = "`$k`='" . StripSql($v) . "'";
    $sql = "UPDATE $GLOBALS[db_sp].$table SET " . implode(',', $updates);
    if ($where) $sql .= " WHERE $where";
    $GLOBALS["sp"]->execute($sql);
}

function vaDelete($table, $where)
{
    $GLOBALS["sp"]->execute("DELETE FROM $GLOBALS[db_sp].$table WHERE $where");
}

function getTableAll($table, $where = "1=1")
{
    return $GLOBALS["sp"]->getAll("SELECT * FROM $GLOBALS[db_sp].$table WHERE $where");
}

// ====================== XỬ LÝ CHUỖI ======================
function replacePrice($str)
{
    return str_replace(".", "", $str);
}

function strSpace($str)
{
    return str_replace([";", ",", ".", " "], "", $str);
}

function StripUnicode($str)
{
    $unicode_map = [
        "à" => "a",
        "á" => "a",
        "ạ" => "a",
        "ả" => "a",
        "ã" => "a",
        "â" => "a",
        "ầ" => "a",
        "ấ" => "a",
        "ậ" => "a",
        "ẩ" => "a",
        "ẫ" => "a",
        "ă" => "a",
        "ằ" => "a",
        "ắ" => "a",
        "ặ" => "a",
        "ẳ" => "a",
        "ẵ" => "a",
        "è" => "e",
        "é" => "e",
        "ẹ" => "e",
        "ẻ" => "e",
        "ẽ" => "e",
        "ê" => "e",
        "ề" => "e",
        "ế" => "e",
        "ệ" => "e",
        "ể" => "e",
        "ễ" => "e",
        "ì" => "i",
        "í" => "i",
        "ị" => "i",
        "ỉ" => "i",
        "ĩ" => "i",
        "ò" => "o",
        "ó" => "o",
        "ọ" => "o",
        "ỏ" => "o",
        "õ" => "o",
        "ô" => "o",
        "ồ" => "o",
        "ố" => "o",
        "ộ" => "o",
        "ổ" => "o",
        "ỗ" => "o",
        "ơ" => "o",
        "ờ" => "o",
        "ớ" => "o",
        "ợ" => "o",
        "ở" => "o",
        "ỡ" => "o",
        "ù" => "u",
        "ú" => "u",
        "ụ" => "u",
        "ủ" => "u",
        "ũ" => "u",
        "ư" => "u",
        "ừ" => "u",
        "ứ" => "u",
        "ự" => "u",
        "ử" => "u",
        "ữ" => "u",
        "ỳ" => "y",
        "ý" => "y",
        "ỵ" => "y",
        "ỷ" => "y",
        "ỹ" => "y",
        "đ" => "d",
        "-" => "-",
        ":" => "",
        "," => "",
        "." => "",
        "?" => "",
        "/" => "",
        "\\" => "",
        "%" => "",
        "\"" => "",
        "'" => "",
        "&" => "",
        "(" => "",
        ")" => "",
        "!" => "",
        "+" => ""
    ];
    $str = mb_strtolower(strtr($str, $unicode_map));
    $str = preg_replace('/\s+/', '-', $str);
    return $str;
}

function RenameFile($filename)
{
    $filename = str_replace(["&", ",", " - "], "", $filename);
    $filename = str_replace(" ", "-", $filename);
    return $filename;
}

function CheckUploadImg($ext)
{
    $valid = [".jpeg", ".jpg", ".bmp", ".gif", ".png", ".swf"];
    return in_array(strtolower($ext), $valid);
}

function SubStrEx($str, $length)
{
    if (strlen($str) <= $length) return $str;
    $pos = strpos($str, " ", $length);
    return $pos ? substr($str, 0, $pos) . '...' : $str;
}

// ====================== REDIRECT ======================
function page_transfer2($url)
{
    echo "<script>document.location.href='$url';</script>";
}

// ====================== QUYỀN ======================
function checkPer()
{
    return $_SESSION['group_artseed_user'] == -1;
}

function checkPermision($cid, $act)
{
    $sql = $cid ?
        "SELECT * FROM $GLOBALS[db_sp].permissions WHERE ((perm LIKE '%$act%') OR (perm LIKE '%4%')) AND cid=$cid AND uid=" . $_SESSION["admin_artseed_id"] :
        "SELECT * FROM $GLOBALS[db_sp].permissions WHERE ((perm LIKE '%$act%') OR (perm LIKE '%4%')) AND uid=" . $_SESSION["admin_artseed_id"];
    return ceil(count($GLOBALS["sp"]->getAll($sql))) > 0 || $_SESSION['group_artseed_user'] == -1;
}

function page_permision()
{
    echo "<script>alert('Bạn không có quyền, vui lòng liên hệ người quản trị.');</script>";
}

// ====================== EMAIL ======================
function sendmail($user, $fromName, $email, $subject, $body, $mailReply, $mailcc = "", $mailcc1 = "")
{
    include("../#include/email_config.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Host = SMTP_SERVER;
    $mail->Username = MAIL_USER;
    $mail->Password = MAIL_PASS;
    $mail->SetFrom($mailReply, $subject);
    $mail->CharSet = "UTF-8";
    $mail->FromName = $fromName;
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($email, $user);
    if ($mailcc) $mail->AddCC($mailcc);
    if ($mailcc1) $mail->AddCC($mailcc1);
    $mail->IsHTML(true);
    return $mail->Send();
}
