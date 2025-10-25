<?php

/*============End optimize css============*/

include_once('#include/bootstrap.php');


function PageHome($url)
{

    global $path_url;

    echo "<script type=\"text/javascript\">
    
    document.location.href= '" . $path_url . "/" . $url . "'
    
    </script>";
}

function PageRedirect($url)
{

    global $path_url;

    header("HTTP/1.1 301 Moved Permanently");

    header("location:" . $path_url . "/" . $url);
}

////////////////////////

function SubStrEx($str, $length)
{

    $str = strip_tags($str);

    if (strlen($str) <= $length) {

        return $str;
    }

    $pos = strpos($str, " ", $length - 1);

    if ($pos > 0) {

        return substr($str, 0, $pos) . '...';
    } else {

        return $str;
    }
}

function insert_SubStrEx($a)
{

    $str = strip_tags($a['str']);

    $length = $a['length'];

    if (strlen($str) <= $length) {

        return $str;
    }

    $pos = strpos($str, " ", $length - 1);

    if ($pos > 0) {

        return substr($str, 0, $pos) . '...';
    } else {

        return $str;
    }
}

///////////xóa khoản trắng//////

function FormatNum($str)
{

    $str = str_replace(".", "", $str);

    $str = str_replace(",", "", $str);

    $str = str_replace(" ", "", $str);

    return $str;
}

function insert_formatNum($a)
{

    $str = $a['str'];

    $str = str_replace(".", "", $str);

    $str = str_replace(",", "", $str);

    $str = str_replace(" ", "", $str);

    return $str;
}

function strSpace($str)
{

    $str = str_replace(";", "", $str);

    $str = str_replace(",", "", $str);

    //$str = str_replace(".", "", $str);

    $str = str_replace(" ", "", $str);

    return $str;
}

////////Phan trang //////

function pagi($page, $num_page, $unique_key, $sort)
{

    global $path_url;

    if ($sort) {

        $q_sort = '?sort=' . $sort . '';

        $q_page = '&page=';
    } else {

        $q_sort = "";

        $q_page = '?page=';
    }

    if ($page >= 2) {

        $pa1 .= '<li><a href="' . $path_url . '/' . $unique_key . '/' . $q_sort . '' . $q_page . '' . ($page - 1) . '">Trước</a></li>';
    }

    // Lặp khoảng giữa

    for ($i = 1; $i <= $num_page; $i++) {

        if ($i == $page) {

            $pa2 .= '<li class ="active"><a  href="' . $path_url . '/' . $unique_key . '/' . $q_sort . '' . $q_page . '' . $i . '">' . $i . '</a></li>';
        } else {

            $pa2 .= '<li><a href="' . $path_url . '/' . $unique_key . '/' . $q_sort . '' . $q_page . '' . $i . '">' . $i . '</a></li>';
        }
    }

    if ($page < $num_page) {

        $pa3 .= '<li><a href="' . $path_url . '/' . $unique_key . '/' . $q_sort . '' . $q_page . '' . ($page + 1) . '/">  Sau </a></li>';
    }

    return $pa1 . $pa2 . $pa3;
}

////////////get price///////////////////

function insert_showprice($a)
{

    $idpr = $a['idpr'];

    $sql = "select * from $GLOBALS[db_sp].`price` where articlelist_id = " . $idpr . " ";

    $rs = $GLOBALS["sp"]->getRow($sql);

    if ($rs["price"] > 0) {

        $price = '<span class="new-price">' . number_format($rs["price"], 0, ",", ".") . ' ₫</span>';
    } else {

        $price = '<span class="new-price">Liên hệ</span>';
    }

    if ($rs["priceold"] > 0) {

        $priceold = '<span class="old-price">' . number_format($rs["priceold"], 0, ",", ".") . ' ₫</span>';
    }

    $strfull = '' . $price . '' . $priceold . '';

    return $strfull;
}

//////////////////////////////////////

function insert_showsale($a)
{

    $idpr = $a['idpr'];

    $sql = "select * from $GLOBALS[db_sp].`price` where articlelist_id = " . $idpr . " ";

    $rs = $GLOBALS["sp"]->getRow($sql);

    if ($rs["price"] > 0) {

        $price = '<span class="new-price">' . number_format($rs["price"], 0, ",", ".") . ' ₫</span>';
    } else {

        $price = '<span class="new-price">Liên hệ</span>';
    }

    if ($rs["priceold"] > 0) {

        $priceold = '<span class="old-price">' . number_format($rs["priceold"], 0, ",", ".") . ' ₫</span>';

        $pricephantram = 100 - ($rs["price"] / $rs["priceold"] * 100);

        $phantram = '<span class="salespr">' . number_format($pricephantram, 0, ",", ".") . '%<label>OFF</label></span>';
    }

    $strsale = '' . $phantram . '';

    return $strsale;
}

///////////////////////////////

function insert_showpricedetail($a)
{

    $idpr = $a['idpr'];

    $sql = "select * from $GLOBALS[db_sp].`price` where articlelist_id = " . $idpr . " ";

    $rs = $GLOBALS["sp"]->getRow($sql);

    if ($rs["price"] > 0) {

        $price = '<span class="new-pr-dt">' . number_format($rs["price"], 0, ",", ".") . ' ₫</span>';
    } else {

        $price = '<span class="new-pr-dt">Liên hệ</span>';
    }

    if ($rs["priceold"] > 0) {

        $priceold = '<span class="old-pr-dt">' . number_format($rs["priceold"], 0, ",", ".") . ' ₫</span>';

        $pricephantram = 100 - ($rs["price"] / $rs["priceold"] * 100);

        $phantram = '<span class="salesdt">Giảm ' . number_format($pricephantram, 0, ",", ".") . '%</span>';
    }

    $strfull = '' . $price . '' . $priceold . '' . $phantram . '';

    return $strfull;
}

/////////end phan trang///////

function GetLinkCat($cat, $lg2)
{

    $id = $cat['id'];

    $sql = "select c1.unique_key as cat_name,c2.unique_key as group_name from $GLOBALS[db_sp].categories c1, $GLOBALS[db_sp].categories c2 where c1.id=$id and c1.pid=c2.id";

    $r = $GLOBALS["sp"]->getRow($sql);

    $link = "/" . $r['group_name'] . "/" . $r['cat_name'] . "/";

    $link = str_replace("//", "/", $link);

    $link = substr($link, 1, strlen($link));

    return $link;
}

function insert_GetLinkCat($a)
{

    $cat = $a['cat'];

    $lg2 = $a['lang'];

    $id = $cat['id'];

    $sql = "select c1.unique_key as cat_name,c2.unique_key as group_name,c1.comp from $GLOBALS[db_sp].categories c1, $GLOBALS[db_sp].categories c2 where c1.id=$id and c1.pid=c2.id";

    $r = $GLOBALS["sp"]->getRow($sql);

    $link = "/" . $r['group_name'] . "/" . $r['cat_name'] . "/";

    $link = str_replace("//", "/", $link);

    $link = substr($link, 1, strlen($link));

    return $link;
}

function GetLinkDetail($cat, $lg2)
{

    $id = $cat['cid'];

    $sql = "select c1.unique_key as cat_name,c2.unique_key as group_name from $GLOBALS[db_sp].categories c1, $GLOBALS[db_sp].categories c2 where c1.id=$id and c1.pid=c2.id";

    $r = $GLOBALS["sp"]->getRow($sql);

    $link = "/" . $r['group_name'] . "/" . $r['cat_name'] . "/" . $cat["unique_key"] . ".html";

    $link = str_replace("//", "/", $link);

    $link = substr($link, 1, strlen($link));

    return $link;
}

function insert_GetLinkDetail($a)
{

    $cat = $a['cat'];

    $lg2 = $a['lang'];

    $id = $cat['cid'];

    $sql = "select c1.unique_key as cat_name,c2.unique_key as group_name from $GLOBALS[db_sp].categories c1, $GLOBALS[db_sp].categories c2 where c1.id=$id and c1.pid=c2.id";

    $r = $GLOBALS["sp"]->getRow($sql);

    $link = "/" . $r['group_name'] . "/" . $r['cat_name'] . "/" . $cat["unique_key"] . ".html";

    $link = str_replace("//", "/", $link);

    $link = substr($link, 1, strlen($link));

    return $link;
}

function insert_GetCat($a)
{

    $cat = $a['cat'];

    $lg2 = $a['lang'];

    $id = $cat['id'];

    return $id;
}

function GetCat($a, $lang)
{

    $cat = $a['cat'];

    $lg2 = $lang;

    $id = $a['id'];

    $sql = "select c1.unique_key as cat_name,c2.unique_key as group_name from $GLOBALS[db_sp].categories c1, $GLOBALS[db_sp].categories c2 where c1.id=$id and c1.pid=c2.id";

    $r = $GLOBALS["sp"]->getRow($sql);

    $link = "/" . $r['group_name'] . "/" . $r['cat_name'] . "/";

    $link = str_replace("//", "/", $link);

    $link = substr($link, 1, strlen($link));

    return $link;
}

function sendmail($user, $MAIL_FROMNAME, $email, $subj, $mess, $mailreply, $mailcc = "", $mailcc1 = "")
{

    include("#include/email_config.php");

    require_once('libraries/phpmailer/class.phpmailer.php');

    $mail = new PHPMailer();

    /////////goi cho gmail

    $mail->IsSMTP(); // send via SMTP

    $mail->SMTPAuth = true; // turn on SMTP authentication

    $mail->SMTPDebug = 0;

    $mail->SMTPSecure = 'ssl';

    $mail->Port       = 465;

    $mail->Host = SMTP_SERVER;

    $mail->Username = MAIL_USER; // SMTP username

    $mail->Password = MAIL_PASS; // SMTP password

    $mail->SetFrom($mailreply, $subj);

    $mail->CharSet = "UTF-8";

    $mail->From = MAIL_FROM;

    $mail->FromName = $MAIL_FROMNAME;

    $mail->AddAddress($email, $user);

    if ($mailcc) $mail->AddCC($mailcc, $user);

    $mail->WordWrap = 50; // set word wrap

    $mail->IsHTML(true); // send as HTML

    $mail->Subject = $subj;

    $mail->Body = $mess;

    $send = $mail->Send();

    if ($send) {

        return true;
    } else return false;
}

function sendmailAjax($user, $email, $subj, $mess)
{

    include("../#include/email_config.php");

    /////////goi cho gmail

    $mail = new PHPMailer();

    $mail->IsSMTP(); // send via SMTP

    $mail->SMTPAuth = true; // turn on SMTP authentication

    $mail->SMTPDebug = 1;

    //$mail->SMTPSecure = 'tls';

    $mail->Host = SMTP_SERVER;

    $mail->Port = 25;

    $mail->Username = MAIL_USER; // SMTP username

    $mail->Password = MAIL_PASS; // SMTP password

    $mail->CharSet = "UTF-8";

    $mail->From = MAIL_FROM;

    $mail->FromName = MAIL_FROMNAME;

    $mail->AddAddress($email, $user);

    $mail->WordWrap = 50; // set word wrap

    $mail->IsHTML(true); // send as HTML

    $mail->Subject = $subj;

    $mail->Body = $mess;

    $send = $mail->Send();

    if ($send) {

        return true;
    } else return false;
}

function validate_email($email)
{

    $atom = '[-a-z0-9!#$%&\'*+/=?^_`{|}~]'; // allowed characters for part before "at" character

    $domain = '([-a-z0-9]*[a-z0-9]+)'; // allowed characters for part after "at" character

    $regex = '^' . $atom . '+' . // One or more atom characters.

        '(\.' . $atom . '+)*' . // Followed by zero or more dot separated sets of one or more atom characters.

        '@' . // Followed by an "at" character.

        '(' . $domain . '{1,63}\.)+' . // Followed by one or max 63 domain characters (dot separated).

        $domain . '{2,63}' . // Must be followed by one set consisting a period of two

        '$'; // or max 63 domain characters.

    if (eregi($regex, $email)) {

        return true;
    } else {

        return false;
    }
} //validate_email_syntax

function StripSql($data)
{

    $str = str_replace("'", "''", $data);

    return str_replace("\''", "''", $str);
}

function vaInsert($table, $arr)
{

    if (count($arr) <= 0) {

        return false;
    }

    $keys = array_keys($arr);

    $sql = "INSERT INTO $GLOBALS[db_sp]." . $table . " ( ";

    $sql .= "`" . $keys[0] . "`";

    for ($i = 1; $i < count($keys); $i++) {

        $sql .= ",`" . $keys[$i] . "`";
    }

    $sql .= ") VALUES (";

    $sql .= "'" . StripSql($arr[$keys[0]]) . "'";

    for ($i = 1; $i < count($keys); $i++) {

        $sql .= ",'" . StripSql($arr[$keys[$i]]) . "'";
    }

    $sql .= ");";

    //die($sql);

    $GLOBALS["sp"]->execute($sql);

    $post_id = $GLOBALS["sp"]->Insert_ID();

    return $post_id;
}

function vaUpdate($table, $arr, $where = "")
{

    global $db, $table_prefix;

    if (count($arr) <= 0) {

        return false;
    }

    $keys = array_keys($arr);

    $sql = "UPDATE $GLOBALS[db_sp]." . $table . " SET ";

    $sql .= "`" . $keys[0] . "`='" . StripSql($arr[$keys[0]]) . "' ";

    for ($i = 1; $i < count($keys); $i++) {

        $sql .= ", `" . $keys[$i] . "`='" . StripSql($arr[$keys[$i]]) . "' ";
    }

    if ($where) {

        $sql .= " WHERE " . $where;
    }

    //echo $sql; die();

    $GLOBALS["sp"]->execute($sql);

    //echo mysql_error();

}

function generateCode($characters)
{

    /* list all possible characters, similar looking characters and vowels have been removed */

    $possible = '23456789bcdfghjkmnpqrstvwxyz';

    $code = '';

    $i = 0;

    while ($i < $characters) {

        $code .= substr($possible, mt_rand(0, strlen($possible) - 1), 1);

        $i++;
    }

    return $code;
}

function insert_getMenuDanhMucPr($a)
{

    global $lang, $path_url, $rstragop;

    $cid = $a['id'];

    $sqlisSubmenu = "select * from $GLOBALS[db_sp].categories where id = $cid";

    $rsisSubmenu = $GLOBALS["sp"]->getRow($sqlisSubmenu);

    if ($rsisSubmenu['has_child'] == 1) {

        $list = $sharecid = '';

        $str = '0,';

        $sharecid = dequiShareCid($cid, $str);

        $sharecid = $sharecid . '0';
    } else {

        $sharecid = $cid;
    }

    $sql = "select * from $GLOBALS[db_sp].products where cid in (" . $sharecid . ") and active=1 order by num asc, id desc limit 10";

    $rs = $GLOBALS["sp"]->getAll($sql);

    if (ceil(count($rs)) > 0) {

        foreach ($rs as $item) {

            $imgview = "<img src='" . $path_url . "/" . $item['img_thumb_vn'] . "' alt='" . $item["alt_img"] . "' class='img-responsive' />";

            $priceold = '';

            if ($item["priceold"] > 0) {

                $priceold = '<span class="old-pr">' . number_format($item["priceold"], 0, ",", ".") . 'đ</span>';
            }

            if ($item["timebh"] == '') {

                $timebhed = '<p>' . $item['timebh'] . '</p>';
            }

            $list .= '
            
            <li class="padding10">
<div class="v2-home-pr-item-cate">
<div class="v2-home-pr-item-img">
<a href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item["name_" . $lang] . '">
            
            ' . $imgview . '
            
            </a>
</div>
<div class="v2-home-pr-item-boxdetail">
<h3>
<a class="home-pr-item-name" href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a>
</h3>
<div class="price-pr">
<span class="new-pr">' . number_format($item["price"], 0, ",", ".") . 'đ</span>' . $priceold . '
            
            </div>
</div>
<div class="f-pr-item-action">
<a href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item["name_" . $lang] . '">Chi tiết</a>
<a href="' . $path_url . '/' . $rstragop['unique_key'] . '/" title="Trả góp">Trả góp</a>
</div>
<a class="hover-if" href="' . $path_url . '/' . $item['unique_key'] . '.html">
<div class="info-tt">
<div class="namesp">' . $item['name_vn'] . '</div>
<div class="price-pr">
<span class="new-pr">' . number_format($item["price"], 0, ",", ".") . 'đ</span>' . $priceold . '
            
            </div>
<div class="noidung">
            
            ' . $item['contenthover_vn'] . '
            
            </div>
</div>
</a>
</div>
</li>
            
            ';
        }
    }

    return $list;
}

function dequiShareCid($id, &$str)
{

    $sql = "select * from $GLOBALS[db_sp].categories where pid=" . $id;

    $rs = $GLOBALS["sp"]->getAll($sql);

    if (ceil(count($rs)) > 0) {

        foreach ($rs as $item) {

            $str .= $item['id'] . ',';

            dequiShareCid($item['id'], $str);
        }
    }

    return $str;
}

function insert_getListCate($a)
{

    global $lang, $path_url;

    $cid = $a['id'];

    $sqlcat = "select * from $GLOBALS[db_sp].categories where id = $cid";

    $rscat = $GLOBALS["sp"]->getRow($sqlcat);

    foreach ($rscat as $item1) {

        if ($item1['has_child'] == 1) {

            $sql = "select * from $GLOBALS[db_sp].categories where pid =" . $rscat['id'] . " and active=1 order by num asc, id desc limit 8";

            $rs2 = $GLOBALS["sp"]->getAll($sql1);
        }
    }
}

function insert_getProductHome($a)
{

    global $lang, $path_url;

    $cid = $a['cid'];

    $sqlisSubmenu = "select * from $GLOBALS[db_sp].categories where id = $cid";

    $rsisSubmenu = $GLOBALS["sp"]->getRow($sqlisSubmenu);

    if ($rsisSubmenu['has_child'] == 1) {

        $list = $sharecid = '';

        $str = '0,';

        $sharecid = dequiShareCid($cid, $str);

        $sharecid = $sharecid . '0';
    } else {

        $sharecid = $cid;
    }

    $sql = "select * from $GLOBALS[db_sp].products where cid in (" . $sharecid . ") and active=1  limit 10";

    $rs = $GLOBALS["sp"]->getAll($sql);

    $total = ceil(count($GLOBALS["sp"]->getAll($sql)));

    $sqlshowrprice = "select * from $GLOBALS[db_sp].infos where id=31";

    $rsshowprice = $GLOBALS["sp"]->getRow($sqlshowrprice);

    if ($rsshowprice['open'] == 1) {

        if ($total > 0) {

            foreach ($rs as $item) {

                $imgview = "<img src='" . $path_url . "/" . $item['img_thumb_vn'] . "' alt='" . $item["alt_img"] . "' class='img-responsive' />";

                if ($item["priceold"] > 0) {

                    $pricephantram = ($item["priceold"] / $item["price"]) * 10;

                    $phantram = '<span class="salespr">' . number_format($pricephantram, 0, ",", ".") . ' %</span>';

                    $priceold = '<span class="old-price">' . number_format($item["priceold"], 0, ",", ".") . ' đ</span>';
                }

                if ($item["price"] > 0) {

                    $price = '<span class="new-price">' . number_format($item["price"], 0, ",", ".") . ' đ</span>';
                } else {

                    $price = '<span class="new-price">Liên hệ</span>';
                }

                if ($item["timebh"] != '') {

                    $timebhed = '<p>' . $item['timebh'] . '</p>';
                } else {

                    $timebhed = '';
                }

                $html .= '
                
                <div class="prlist col-md-3 col-sm-4 col-xs-6">
<div class="f-prnb">
<div class="f-bl-thumb-pr">
<a href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item["name_" . $lang] . '">' . $imgview . '</a>
</div>
<div class="meta">
<h3><a href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a></h3>
<div class="ht-price ">
                
                ' . $price . '' . $priceold . '
                
                </div>
</div>
</div>
</div>
                
                ';
            }
        }
    } else {

        if ($total > 0) {

            foreach ($rs as $item) {

                $imgview = "<img src='" . $path_url . "/" . $item['img_thumb_vn'] . "' alt='" . $item["alt_img"] . "' class='img-responsive' />";

                if ($item["timebh"] != '') {

                    $timebhed = '<p>' . $item['timebh'] . '</p>';
                } else {

                    $timebhed = '';
                }

                $html .= '
                
                <div class="prlist col-md-3 col-sm-4 col-xs-6">
<div class="f-prnb">
<div class="f-bl-thumb-pr">
<a href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item["name_" . $lang] . '">' . $imgview . '</a>
</div>
<div class="meta">
<h3><a href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a></h3>
<div class="ht-price ">
<span class="new-price">Liên hệ</span>
</div>
</div>
</div>
</div>
                
                ';
            }
        }
    }

    return $html;
}

function insert_getMenuLeft($a)
{

    global $lang, $path_url, $showCity, $iphonePromotion;

    $id = $a['id'];

    $html = "";

    $sql = "SELECT * FROM $GLOBALS[db_sp].categories where pid=$id order by num asc,id desc ";

    $rs = $GLOBALS["sp"]->getAll($sql);

    $total = ceil(count($GLOBALS["sp"]->getAll($sql)));

    if ($total > 0) {

        foreach ($rs as $item) {

            //

            $link = GetLinkCat($item, $lang);

            $imgview = '';

            if ($item['img_vn']) {

                $imgview = "<img src='" . $path_url . "/" . $item['img_vn'] . "' alt='" . $item["alt_img"] . "' class='img-responsive' />";
            }

            $html .= '
            
            <li>
<a href="' . $path_url . '/' . $item["unique_key"] . '/" title="' . $item["name_" . $lang] . '">' . $imgview . $item["name_" . $lang] . '</a>
</li>
<div class="prlist col-md-3 col-sm-4 col-xs-6">
<div class="f-prnb">
<div class="f-bl-thumb-pr">
<a href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item["name_" . $lang] . '">' . $imgview . '</a>
</div>
<h3><a href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a></h3>
<div class="ht-price "><span> ' . $price . '
            
            ' . $priceold . '</span>
</div>
</div>
</div>
            
            ';
        }

        $html = '<ul>' . $html . '</ul>';
    }

    return $html;
}

function insert_getMenuFooter($a)
{

    global $lang, $path_url, $showCity, $iphonePromotion;

    $id = $a['id'];

    $html = "";

    $sql = "SELECT * FROM $GLOBALS[db_sp].categories where pid=$id order by num asc,id desc ";

    $rs = $GLOBALS["sp"]->getAll($sql);

    $total = ceil(count($GLOBALS["sp"]->getAll($sql)));

    if ($total > 0) {

        foreach ($rs as $item) {

            //

            //$link = GetLinkCat($item, $lang);

            $html .= '<li><a href="' . $path_url . '/' . $item["unique_key"] . '/" title="' . $item["name_" . $lang] . '">' . $item["name_" . $lang] . '</a></li>
            
            ';
        }
    }

    return $html;
}

function add_item($intIdCart, $intID, $qty, $namesp, $imgsp, $unique_key, $pricesp)
{

    //$r = check_duplicate($intID, $bonho, $color);

    $intCount = count($_SESSION["Cart"]); //Dem so mat hang trong gio

    $arrItem = array(); //Tao mang chua chi tiet san pham

    $arrItem["id"] = $intID;

    $arrItem["idcart"] = $intIdCart;

    $arrItem["qty"] = $qty;

    $arrItem["namesp"] = $namesp;

    $arrItem["imgsp"] = $imgsp;

    $arrItem["unique_key"] = $unique_key;

    $arrItem["pricesp"] = $pricesp;

    $_SESSION["Cart"][$intCount] = $arrItem;

    //echo"vao roi"; exit();

}

/*function add_item_nhanh($intID,$qty,$namesp,$imgsp,$pricesp) {
    
    $r = check_duplicate($intID, $qty);
    
    if(!$r) {
        
        $intCount = count($_SESSION["Cart"]);   //Dem so mat hang trong gio
        
        $arrItem = array();                    //Tao mang chua chi tiet san pham
        
        $arrItem["id"]= $intID;
        
        $arrItem["qty"] = $qty;
        
        $arrItem["namesp"] = $namesp;
        
        $arrItem["imgsp"] = $imgsp;
        
        $arrItem["pricesp"] = $pricesp;
        
        $_SESSION["Cart"][$intCount] = $arrItemn;
        
    }
    
    //echo"vao roi"; exit();
    
}

*/

function check_duplicate($intID, $qty, $size)
{

    $r = false;

    for ($i = 0; $i < count($_SESSION["Cart"]); $i++) {

        if ($_SESSION["Cart"][$i]["id"] == $intID) {

            $_SESSION["Cart"][$i]["qty"] = $qty;

            $r = true;
        }
    }

    return $r;
}

//C?p nh?t gi? hàng

function update_item($intID, $qty, $yc)
{

    for ($i = 0; $i < count($_SESSION["Cart"]); $i++) {

        if ($_SESSION["Cart"][$i]["id"] == $intID) {

            $_SESSION["Cart"][$i]["qty"] = $qty;

            $_SESSION["Cart"][$i]["yc"] = $yc;

            break;
        }
    }
}

//xóa gi? hàng

function remove_item($intID)
{

    for ($i = 0; $i < count($_SESSION["Cart"]); $i++) {

        if ($_SESSION["Cart"][$i]["id"] == $intID) {

            array_splice($_SESSION["Cart"], $i, 1);

            break;
        }
    }
}

///san pham đã xem

function addToView($intID)
{

    $r = check_duplicateview($intID);

    if (!$r) {

        $intCount = count($_SESSION["prView"]); //Dem so mat hang trong gio

        $arrItem = array(); //Tao mang chua chi tiet san pham

        $arrItem["id"] = $intID;

        $_SESSION["prView"][$intCount] = $arrItem;
    }

    //echo"vao roi"; exit();

}

function check_duplicateview($intID)
{

    $r = false;

    for ($i = 0; $i < count($_SESSION["prView"]); $i++) {

        if ($_SESSION["prView"][$i]["id"] == $intID) {

            $r = true;
        }
    }

    return $r;
}

function getRating($idpr)
{

    $rating_unitwidth = 8;

    if (!$units) {

        $units = 10;
    }

    $sql = "SELECT total_votes, total_value, used_ips FROM $GLOBALS[db_sp].ratings WHERE id='$idpr'";

    $numbers = $GLOBALS["sp"]->getRow($sql);

    if ($numbers['total_votes'] < 1) {

        $count = 0;
    } else {

        $count = $numbers['total_votes']; //how many votes total

    }

    $current_rating = $numbers['total_value']; //total number of rating added together and stored

    $tense = $count == 1 ? "vote" : "votes"; //plural form votes/vote

    // now draw the rating bar

    $rating_width = @number_format($current_rating / $count, 2) * $rating_unitwidth;

    $rating1 = @number_format($current_rating / $count, 1);

    $rating2 = @number_format($current_rating / $count, 2);

    $rater = '';

    $rater .= '<div class="ratingblock">';

    $rater .= '<div id="unit_long' . $id . '">';

    $rater .= '<ul id="unit_ul' . $id . '" class="unit-rating" style="width:' . $rating_unitwidth * $units . 'px;">';

    $rater .= '<li class="current-rating" style="width:' . $rating_width . 'px;">Currently ' . $rating2 . '/' . $units . '</li>';

    $rater .= '</ul>';

    $rater .= '</div>';

    $rater .= '</div>';

    return $rater;
}

function insert_getRating($a)
{

    $idpr = $a['idpr'];

    $rating_unitwidth = 16;

    $units = 5;

    $sql = "SELECT total_votes, total_value, used_ips FROM $GLOBALS[db_sp].ratings WHERE id='$idpr'";

    $numbers = $GLOBALS["sp"]->getRow($sql);

    if ($numbers['total_votes'] < 1) {

        $count = 0;
    } else {

        $count = $numbers['total_votes']; //how many votes total

    }

    $current_rating = $numbers['total_value']; //total number of rating added together and stored

    $tense = $count == 1 ? "vote" : "votes"; //plural form votes/vote

    // now draw the rating bar

    $rating_width = @number_format($current_rating / $count, 2) * $rating_unitwidth;

    $rating1 = @number_format($current_rating / $count, 1);

    $rating2 = @number_format($current_rating / $count, 2);

    $rater = '';

    $rater .= '<div class="ratingblock">';

    $rater .= '<div id="unit_long' . $id . '">';

    $rater .= '<ul id="unit_ul' . $id . '" class="unit-rating" style="width:' . $rating_unitwidth * $units . 'px;">';

    $rater .= '<li class="current-rating" style="width:' . $rating_width . 'px;">Currently ' . $rating2 . '/' . $units . '</li>';

    $rater .= '</ul>';

    $rater .= '</div>';

    $rater .= '</div>';

    return $rater;
}

function insert_getName($a)
{

    global $path_url, $lang;

    $table = $a['table'];

    $id = $a['id'];

    $sql = "SELECT name_" . $lang . " FROM $GLOBALS[db_sp]." . $table . " WHERE id=" . $id;

    $name = $GLOBALS["sp"]->getOne($sql);

    return $name;
}

function getTableAll($table, $wh)
{

    $sql = "select * from $GLOBALS[db_sp]." . $table . " where 1=1 $wh";

    $rs = $GLOBALS["sp"]->getAll($sql);

    return $rs;
}

function insert_getColorAlle($a)
{

    global $path_url, $lang;

    $table = $a['table'];

    $names = $a['names'];

    $id = $a['id'];

    $sql = "SELECT " . $names . " FROM $GLOBALS[db_sp]." . $table . " WHERE id=" . $id;

    $name = $GLOBALS["sp"]->getOne($sql);

    $html .= '<span style="background-color:' . $name . ' "></span>';

    return $html;
}

function getColorAlle($table, $names, $wh)
{

    global $path_url, $lang;

    $sql = "SELECT " . $names . " FROM $GLOBALS[db_sp]." . $table . " WHERE 1=1 $wh";

    $name = $GLOBALS["sp"]->getOne($sql);

    return $name;
}

function insert_getNamAlle($a)
{

    global $path_url, $lang;

    $table = $a['table'];

    $names = $a['names'];

    $id = $a['id'];

    $sql = "SELECT " . $names . " FROM $GLOBALS[db_sp]." . $table . " WHERE id=" . $id;

    $name = $GLOBALS["sp"]->getOne($sql);

    return $name;
}

function getNamAlle($table, $names, $wh)
{

    global $path_url, $lang;

    $sql = "SELECT " . $names . " FROM $GLOBALS[db_sp]." . $table . " WHERE 1=1 $wh";

    $name = $GLOBALS["sp"]->getOne($sql);

    return $name;
}

function getTableRow($table, $wh)
{

    $sql = "select * from $GLOBALS[db_sp]." . $table . " where 1=1 $wh";

    $rs = $GLOBALS["sp"]->getRow($sql);

    return $rs;
}

function getGold()
{

    $sql = "SELECT * FROM $GLOBALS[db_sp].typegold where id<>1 order by id asc";

    $rs = $GLOBALS["sp"]->getAll($sql);

    return $rs;
}

function checkGotoCap1($cat)
{

    if ($cat['pid'] > 2) {

        $sql = "select * from $GLOBALS[db_sp].categories where id=" . $cat['pid'] . " order by num asc, id asc";

        $cat = $GLOBALS["sp"]->getRow($sql);

        checkGotoCap1($cat);
    }

    $strcomp = $cat['id'];

    return $strcomp;
}

function getLinkTitle($cid, $live)
{
    global $path_url, $lang;

    // Lấy thông tin menu
    $sql_cat = "SELECT * FROM {$GLOBALS['db_sp']}.`menu` WHERE id = " . intval($cid);
    $item = $GLOBALS["sp"]->getRow($sql_cat);

    // Nếu có trong bảng menu
    if (!empty($item['id'])) {
        $uniqueKey = $item['unique_key'] ?? '';
        $name = $item['name_' . $lang] ?? '';

        $str = '
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="' . htmlspecialchars($path_url . '/' . $uniqueKey . '/') . '" 
               itemprop="item" 
               title="' . htmlspecialchars($uniqueKey) . '">
                <span itemprop="name">' . htmlspecialchars($name) . '</span>
            </a>
        </li>';
    } else {
        // Nếu không có trong menu, lấy từ bảng categories
        $sql = "SELECT * FROM {$GLOBALS['db_sp']}.`categories` WHERE id = " . intval($cid);
        $item = $GLOBALS["sp"]->getRow($sql);

        $uniqueKey = $item['unique_key'] ?? '';
        $name = $item['name_' . $lang] ?? '';

        $str = '
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="' . htmlspecialchars($path_url . '/' . $uniqueKey . '/') . '" 
               itemprop="item" 
               title="' . htmlspecialchars($uniqueKey) . '">
                <span itemprop="name">' . htmlspecialchars($name) . '</span>
            </a>
        </li>';

        // Nếu có danh mục cha
        if (!empty($item['parentid']) && $item['parentid'] > 0) {
            // ⚠️ Fix lỗi: dùng $item1 → $item_1 cho đúng biến
            $sql_1 = "SELECT * FROM {$GLOBALS['db_sp']}.`categories` WHERE parentid = " . intval($item['id']);
            $item_1 = $GLOBALS["sp"]->getRow($sql_1);

            return getLinkTitle($item_1["id"], 2);
        } else {
            return $str;
        }
    }

    return $str;
}


function insert_checkbreadcumb($a)
{

    global $lang;

    global $numlang;

    $idpr = $a['idpr'];

    $sqlcat = "select * from $GLOBALS[db_sp].articlelist_categories where articlelist_id = " . $idpr . " order by id asc";

    $rs_cat = $GLOBALS["sp"]->getAll($sqlcat);

    $rs_cat1 = ceil(count($GLOBALS["sp"]->getAll($sqlcat)));

    //$rs_cat = $GLOBALS["sp"]->getAll($sqlcat);

    //$smarty->assign("checked", ceil(count($rs_cat)));

    if ($rs_cat1 > 0) {

        foreach ($rs_cat as $itemcate) {

            $sql11 = "select * from $GLOBALS[db_sp].categories where id = " . $itemcate['categories_id'] . " and comp=2";

            $item = $GLOBALS["sp"]->getRow($sql11);

            if (count($item) > 0) {

                $sql12 = "select * from $GLOBALS[db_sp].categories_detail where languageid = " . $numlang . " and categories_id = " . $item['id'];

                $item_detail = $GLOBALS["sp"]->getRow($sql12);

                $str .= '
                
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
<a href="' . $path_url . '/' . $item["unique_key"] . '/" itemprop="item" title="' . $item_detail["name"] . '"
                
                <span itemprop="name">' . $item_detail["name"] . '</span>
</a>
</li>';
            }
        }
    } else {

        $sql = "select * from $GLOBALS[db_sp].articlelist where id = " . $idpr . "";

        $rs = $GLOBALS["sp"]->getRow($sql);

        $sqlmenu = "select * from $GLOBALS[db_sp].menu where comp = " . $rs['comp'] . "";

        $item_menu = $GLOBALS["sp"]->getRow($sqlmenu);

        $sql = "select * from $GLOBALS[db_sp].menu_detail where menu_id = " . $item_menu['id'] . " and languageid = " . $numlang . "";

        $item = $GLOBALS["sp"]->getRow($sql);

        $str .= '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
<a href="' . $path_url . '/' . $item_menu["unique_key"] . '/" itemprop="item" title="' . $item["name"] . '" >
<span itemprop="name">' . $item['name'] . '</span></a></li>';
    }

    return $str;
}

function insert_checkcatbreadcumb($a)
{

    global $numlang;

    $idpr = $a['idpr'];

    $sqlmenu = "select * from $GLOBALS[db_sp].menu where id = " . $idpr . "";

    $item = $GLOBALS["sp"]->getRow($sqlmenu);

    $sql = "select * from $GLOBALS[db_sp].menu_detail where menu_id = " . $idpr . " and languageid = " . $numlang . "";

    $item_menu = $GLOBALS["sp"]->getRow($sql);

    if (count($item_menu) > 0) {

        $str .= '
        
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
<a href="' . $path_url . '/' . $item["unique_key"] . '/" itemprop="item" title="' . $item_menu["name"] . '" >
<span itemprop="name">' . $item_menu["name"] . '</span>
</a>
</li>';
    } else {

        $sqlcat = "select * from $GLOBALS[db_sp].categories where id = " . $idpr . "";

        $rs_cat = $GLOBALS["sp"]->getRow($sqlcat);

        $sqlcat1 = "select * from $GLOBALS[db_sp].categories_detail where categories_id = " . $rs_cat['id'] . " and languageid = " . $numlang . " ";

        $rs_cat1 = $GLOBALS["sp"]->getRow($sqlcat1);

        if ($rs_cat['parentid'] > 0) {

            $sq1 = "select * from $GLOBALS[db_sp].categories where id = " . $rs_cat['parentid'] . "";

            $item = $GLOBALS["sp"]->getRow($sq1);

            $sq11 = "select * from $GLOBALS[db_sp].categories_detail where languageid = " . $numlang . " and categories_id = " . $item['id'] . "";

            $item1 = $GLOBALS["sp"]->getRow($sq11);

            $str .= '
            
            <li itemprop="" itemscope="" itemtype="http://schema.org/ListItem">
<a href="' . $path_url . '/' . $item["unique_key"] . '/" itemprop="item" title="' . $item1["name"] . '" >
<span itemprop="name">' . $item1["name"] . '</span>
</a>
</li>
<li itemprop="itemListElement mmmm" itemscope="" itemtype="http://schema.org/ListItem">
<a href="' . $path_url . '/' . $rs_cat["unique_key"] . '/" itemprop="item" title="' . $rs_cat1["name"] . '" >
<span itemprop="name">' . $rs_cat1["name"] . '</span>
</a>
</li>';
        } else {

            $str .= '
            
            <li itemprop="itemListElement nnn" itemscope="" itemtype="http://schema.org/ListItem">
<a href="' . $path_url . '/' . $rs_cat["unique_key"] . '/" itemprop="item" title="' . $rs_cat1["name"] . '" >
<span itemprop="name">' . $rs_cat1["name"] . '</span>
</a>
</li>';
        }
    }

    return $str;
}

function striptags($str)
{

    $str = strip_tags(trim($str));

    $str = str_replace(".js", "", $str);

    $str = str_replace(".php", "", $str);

    $str = str_replace(".asp", "", $str);

    $str = str_replace(".aspx", "", $str);

    $str = str_replace("#", "", $str);

    $str = str_replace("$", "", $str);

    $str = str_replace("{", "", $str);

    $str = str_replace("}", "", $str);

    return $str;
}

function insert_getImgWebp($a)
{

    global $path_url;

    $list = $imgWebpTam = $class = $width = $height = '';

    $img = trim($a['img']);

    $alt = trim($a['alt']);

    $classimg = trim($a['classimg']);

    $widthimg = trim($a['width']);

    $heightimg = trim($a['height']);

    if (!empty($classimg)) {

        $class = 'class="' . $classimg . '"';
    }

    if (!empty($widthimg)) {

        $width = 'width="' . $widthimg . '"';
    }

    if (!empty($heightimg)) {

        $height = 'height="' . $heightimg . '"';
    }

    $list = '<img src="' . $path_url . '/' . $img . '" alt="' . $alt . '" ' . $class . ' ' . $width . ' ' . $height . ' loading="lazy" />';

    /*
    
    //Begin  dùng 1 hình webp khi sử dụng 2 hình hình mở mục 2 hình html5 và đóng này lạy
    
    if(!empty($imgWebp)){
        
        $list = '<img src="'.$path_url.'/'.$imgWebp.'" alt="'.$alt.'" title="'.$title.'" '.$class.'>';
        
    }
    
    else{
        
        $list = '<img src="'.$path_url.'/'.$img.'" alt="'.$alt.'" title="'.$title.'" '.$class.'>';
        
    }
    
    //End dùng 1 hình webp khi sử dụng 2 hình hình mở mục 2 hình html5 và đóng này lạy
    
    */

    return $list;
}

function getImgWebp($img, $alt, $classimg, $widthimg, $heightimg)
{

    global $path_url;

    $list = $imgWebpTam = $class = $width = $height = '';

    if (!empty($classimg)) {

        $class = 'class="' . $classimg . '"';
    }

    if (!empty($widthimg)) {

        $width = 'width="' . $widthimg . '"';
    }

    if (!empty($heightimg)) {

        $height = 'height="' . $heightimg . '"';
    }

    $list = '<img src="' . $path_url . '/' . $img . '" alt="' . $alt . '" ' . $class . ' ' . $width . ' ' . $height . ' loading="lazy" />';
}

function insert_getNew($a)
{

    global $path_url;

    global $numlang;

    $idpr = $a['idpr'];

    $sql = "select * from $GLOBALS[db_sp].articlelist_detail where languageid = " . $numlang . " and articlelist_id= " . $idpr;

    $item = $GLOBALS["sp"]->getRow($sql);

    $list = '<div class="meta">
<h3><a href="' . $path_url . '/' . $item['unique_key'] . '.html" title="' . $item['name'] . '">' . $item['name'] . '</a></h3>
<div class="short-des">' . substr($item['short'], 0, 200) . '</div>
</div>';

    return $list;
}

function insert_getNewrelated($a)
{

    global $path_url;

    global $numlang;

    $idpr = $a['idpr'];

    $sql = "select * from $GLOBALS[db_sp].articlelist where id= " . $idpr;

    $itemrf = $GLOBALS["sp"]->getRow($sql);

    $sql = "select * from $GLOBALS[db_sp].articlelist_detail where languageid = " . $numlang . " and articlelist_id= " . $idpr;

    $item = $GLOBALS["sp"]->getRow($sql);

    $date = date("d/m/y", strtotime($itemrf['dated']));

    $list = '<li>
<h3><a href="' . $path_url . '/' . $itemrf['unique_key'] . '.html" title="' . $item['name'] . '">' . $item['name'] . '</a><span>(' . $date . ')</span></h3></li>';

    return $list;
}

function insert_getpageproduct($a)
{

    global $path_url;

    global $numlang;

    $idpr = $a['idpr'];

    $sql = "select * from $GLOBALS[db_sp].articlelist where id= " . $idpr;

    $itemrf = $GLOBALS["sp"]->getRow($sql);

    $sql = "select * from $GLOBALS[db_sp].articlelist_detail where languageid = " . $numlang . " and articlelist_id= " . $idpr;

    $item = $GLOBALS["sp"]->getRow($sql);

    $sql2 = "select * from $GLOBALS[db_sp].price where articlelist_id = " . $idpr;

    $item4 = $GLOBALS["sp"]->getRow($sql2);

    if ($item4["priceold"] > 0) {

        $pricephantram = 100 - ($item4["price"] / $item4["priceold"] * 100);

        $phantram = '<span class="salespr">' . number_format($pricephantram, 0, ",", ".") . '%<label>OFF</label></span>';

        $price = '<span class="new-price">' . number_format($item4["price"], 0, ",", ".") . ' ₫</span><span class="old-price">' . number_format($item4["priceold"], 0, ",", ".") . ' ₫</span>';
    } else if ($item4["price"] > 0) {

        $price = '<span class="new-price">' . number_format($item4["price"], 0, ",", ".") . ' ₫</span>';
    } else {

        $price = '<span class="new-price">Liên hệ</span>';
    }

    $list = '
    
    <div class="prlist col-md-3 col-sm-6 col-xs-6">
<div class="f-prnb product_nb">
<div class="img">
<a href="' . $path_url . '/' . $itemrf["unique_key"] . '.html" title="' . $item["name"] . '">
<img alt="' . $item["name"] . '" width = "220" height="225"  src="' . $path_url . '/' . $itemrf["img_thumb_vn"] . '" class="img-responsive" />
</a>
</div>
<div class="meta">
<h3><a href="' . $path_url . '/' . $itemrf['unique_key'] . '.html" title="' . $item['name'] . '">' . $item['name'] . '</a></h3>
<div class="ht-price">
    
    ' . $price . '
    
    </div>
</div>
</div></div>';

    return $list;
}

function insert_getpageNew($a)
{

    global $path_url;

    global $numlang;

    $idpr = $a['idpr'];

    $sql = "select * from $GLOBALS[db_sp].articlelist where id= " . $idpr;

    $itemrf = $GLOBALS["sp"]->getRow($sql);

    $sql = "select * from $GLOBALS[db_sp].articlelist_detail where languageid = " . $numlang . " and articlelist_id= " . $idpr;

    $item = $GLOBALS["sp"]->getRow($sql);

    $date = date("d/m/Y", strtotime($itemrf['dated']));

    $list = '
    
    <p class="img">
<a href="' . $path_url . '/' . $itemrf["unique_key"] . '.html" title="' . $item["name"] . '">
<img alt="' . $item["name"] . '" width = "220" height="190"  src="' . $path_url . '/' . $itemrf["img_thumb_vn"] . '" class="img-responsive" />
</a>
</p>
<div class="meta">
<h3><a href="' . $path_url . '/' . $itemrf['unique_key'] . '.html" title="' . $item['name'] . '">' . $item['name'] . '</a></h3>
<span class="calendar">
<i class="fa-regular fa-calendar-days"></i> ' . $date . '
    
    </span>
<div class="short-des">' . $item['short'] . '</div>
</div>';

    return $list;
}

function insert_getpageproject($a)
{

    global $path_url;

    global $numlang;

    $idpr = $a['idpr'];

    $sql = "select * from $GLOBALS[db_sp].articlelist where id= " . $idpr;

    $itemrf = $GLOBALS["sp"]->getRow($sql);

    $sql = "select * from $GLOBALS[db_sp].articlelist_detail where languageid = " . $numlang . " and articlelist_id= " . $idpr;

    $item = $GLOBALS["sp"]->getRow($sql);

    $date = date("d/m/Y", strtotime($itemrf['dated']));

    $list = '
    
    <p class="img">
<a href="' . $path_url . '/' . $itemrf["unique_key"] . '.html" title="' . $item["name"] . '">
<img alt="' . $item["name"] . '" width = "410" height="290"  src="' . $path_url . '/' . $itemrf["img_thumb_vn"] . '" class="img-responsive" />
</a>
</p>
<div class="meta">
<h3><a href="' . $path_url . '/' . $itemrf['unique_key'] . '.html" title="' . $item['name'] . '">' . $item['name'] . '</a></h3>
<span class="calendar hide">
<i class="fa-regular fa-calendar-days"></i> ' . $date . '
    
    </span>
<div class="short-des">' . $item['short'] . '</div>
</div>';

    return $list;
}

function insert_getpagesearch($a)
{

    global $path_url;

    global $numlang;

    $idpr = $a['idpr'];

    $sql = "select * from $GLOBALS[db_sp].articlelist where id= " . $idpr;

    $itemrf = $GLOBALS["sp"]->getRow($sql);

    $sql = "select * from $GLOBALS[db_sp].articlelist_detail where languageid = " . $numlang . " and articlelist_id= " . $idpr;

    $item = $GLOBALS["sp"]->getRow($sql);

    $date = date("d/m/Y", strtotime($itemrf['dated']));

    $list = '
    
    <p class="img">
<a href="' . $path_url . '/' . $itemrf["unique_key"] . '.html" title="' . $item["name"] . '">
<img width = "262" height="145"  src="' . $path_url . '/' . $itemrf["img_thumb_vn"] . '" class="img-responsive" />
</a>
</p>
<div class="meta">
<h3><a href="' . $path_url . '/' . $itemrf['unique_key'] . '.html" title="' . $item['name'] . '">' . $item['name'] . '</a></h3>
<div class="short-des">' . substr($item['short'], 0, 200) . '</div>
</div>';

    return $list;
}

/*============optimize css============*/