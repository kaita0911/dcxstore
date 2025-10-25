<?php
switch ($act) {
    case "delete":
        $id = $_GET["id"];
        remove_item($id);
        echo "<script type=\"text/javascript\"> 



            document.location.href='" . $path_url . "/mua-nhanh/'



        </script>";
    break;
    case "thanh-toan":
        $arr = array();
        $arrOrder = array();
        if (ceil(count($_SESSION["Cart"])) > 0) {
            $city = $_POST["city"];
            $district = $_POST["district"];
            $ward = $_POST["wards"];
            $sql_tp = "select * from $GLOBALS[db_sp].thanhpho where matp= $city";
            $rs_tp = $GLOBALS["sp"]->getRow($sql_tp);
            $sql_qh = "select * from $GLOBALS[db_sp].quanhuyen where maqh= $district";
            $rs_qh = $GLOBALS["sp"]->getRow($sql_qh);
            $sql_px = "select * from $GLOBALS[db_sp].phuongxa where xaid= $ward";
            $rs_px = $GLOBALS["sp"]->getRow($sql_px);
            $arrOrder['name'] = $name = trim(isset($_POST['names']) ? $_POST['names'] : "");
            $arrOrder['email'] = $email = trim(isset($_POST['emails']) ? $_POST['emails'] : "");
            $arrOrder['phone'] = $phone = trim(isset($_POST['phones']) ? $_POST['phones'] : "");
            $arrOrder['address'] = $address = trim(isset($_POST['addresss']) ? $_POST['addresss'] : "");
            $arrOrder['thanhpho'] = $thanhpho = $rs_tp['name'];
            $arrOrder['quanhuyen'] = $quanhuyen = $rs_qh['name'];
            $arrOrder['phuongxa'] = $wards = $rs_px['name'];
            $arrOrder['content'] = $content = trim(isset($_POST['content']) ? $_POST['content'] : "");
            $arrOrder['thanhtoan'] = $thanhtoan = trim($_POST['radiothanhtoan']);
            $arrDay = getdate();
            $arrOrder['dated'] = $arrDay['year'] . '-' . $arrDay['mon'] . '-' . $arrDay['mday'];
            $ngaydathang = $arrDay['mday'] . '-' . $arrDay['mon'] . '-' . $arrDay['year'];
            $fh = fopen("EmailTemplate/CheckOut.html", 'r');
            $template = fread($fh, filesize("EmailTemplate/CheckOut.html"));
            fclose($fh);
            $template = str_replace('[NAME_SEND]', $name, $template);
            $template = str_replace('[EMAIL_SEND]', $email, $template);
            $template = str_replace('[PHONE_SEND]', $phone, $template);
            $template = str_replace('[ADDRESS_SEND]', $address, $template);
            $template = str_replace('[CITY_SEND]', $thanhpho, $template);
            $template = str_replace('[DISTRICT_SEND]', $quanhuyen, $template);
            $template = str_replace('[WARD_SEND]', $wards, $template);
            $template = str_replace('[CONTNET]', $content, $template);
            $template = str_replace('[TYPE_ORDER]', $thanhtoan, $template);
            $template = str_replace('[DATETIME_ORDER]', $ngaydathang, $template);
            $total = 0;
            $totalAll = 0;
            $stt = 1;
            $list = " ";
            $namePr = " ";
            $QuantityPr = 0;
            foreach ($_SESSION["Cart"] as $keys => $values) {
                $price = ceil($values["pricesp"]);
                if ($price > 0) {
                    $priceOut = number_format($price, 0, ",", ".") . ' ₫';
                } else {
                    $priceOut = 'Liên hệ';
                }
                $total = ceil($price * $values['qty']);
                $totalOut = number_format($total, 0, ",", ".");
                $color = $values["prcolor"];
                $size = $values["prsize"];
                if ($color != null and $size != null) {
                    $pcolorsize = "" . $values['prsize'] . "," . $values['prcolor'] . "";
                } else {
                    $pcolorsize = "";
                }
                $list.= '<tr>';
                $list.= '<td align="center" valign="middle">' . $stt . '</td>';
               $list.= '<td align="center" valign="middle">' . $values['namesp'] . '<br/>' . $pcolorsize . '
                            <p><img height=60 alt="' . $values['namesp'] . '" src="' . $path_url . '/' . $values['imgsp'] . '" /></p> </td>';
                $list.= '<td align="right" valign="middle">' . $values['qty'] . '</td>';
                $list.= '<td align="right" valign="middle">' . $priceOut . ' ₫</td>';
                $list.= '<td align="right" valign="middle">' . $totalOut . ' ₫</td>';
                $list.= '</tr>';
                $stt++;
                $number++;
                $totalAll+= $total;
            }
            $totalAllOut = number_format($totalAll);
            $list.= "<tr><td align='right' valign='middle' colspan='4'><strong style='color: #fe7500;'>Tổng trị giá</strong></td>";
            $list.= "<td align='right' valign='middle'><strong style='color: #fe7500;'>" . $totalAllOut . "</strong></td></tr>";
            $template = str_replace('[SAN_PHAM]', $list, $template);
            /////////////load id max don hang/////////
            $sql = "SELECT max(id)+1 from $GLOBALS[db_sp].orders";
            $OrderId = $GLOBALS['sp']->getone($sql);
            if ($OrderId <= 0) $OrderId = 1;
            ////////////////////////////////////////
            $template = str_replace('[ORDER_ID]', $OrderId, $template);
            $s = strpos($template, "<body>") + 6;
            $e = strpos($template, "</body>");
            $arrOrder['descs'] = substr($template, $s, $e - $s);
            $arrOrder['total'] = $totalAll;
            vaInsert('orders', $arrOrder);
           ///////load email lien he
            $sql = "select * from $GLOBALS[db_sp].infos where id=6 ";
            $rsemail = $GLOBALS['sp']->getRow($sql);
            $mail_to = strip_tags($rsemail['plain_text_vn']);
            $mailcc = $arr['email'];
            $mailreply = $mail_to;
            $msg = $template;
            ////load domain
            $sql = "select * from $GLOBALS[db_sp].infos where id=2 ";
            $rsdomain = $GLOBALS['sp']->getRow($sql);
            $domain = strip_tags($rsdomain['domain']);
            $subject = "Đơn Hàng Số " . $OrderId;
            $MAIL_FROMNAME = "Đơn hàng " . $domain;
            $user = $domain;
            $mailsend = sendmail($user, $MAIL_FROMNAME, $mail_to, $subject, $msg, $mailreply, $mailcc, $mailcc1);
            if (!$mailsend) die('Lỗi hệ thống không thể gởi mail, vui lòng quay lại sau. ');
            unset($_SESSION['number']);
            unset($_SESSION['Cart']);
            $BaseUrl = $path_url . "/gio-hang/finish/";
            echo "<script type=\"text/javascript\"> 
                    document.location.href='" . $BaseUrl . "'
            </script>";
        }
        break;
    default:
        if (isset($_SESSION["Cart"])) {
            $is_available = 0;
            foreach ($_SESSION["Cart"] as $keys => $values) {
                if ($_SESSION["Cart"][$keys]['id'] == $_POST["id"] && $_SESSION["Cart"][$keys]['prsize'] == $_POST["optionsize"] && $_SESSION["Cart"][$keys]['prcolor'] == $_POST["optioncolor"]) {
                    $is_available++;
                    $_SESSION["Cart"][$keys]['qty'] = $_SESSION["Cart"][$keys]['qty'] + $_POST["qty"];
                } else {
                    $_SESSION["Cart"][$keys]['id'] = $_SESSION["Cart"][$keys]['id'] + '1';
                }
            }
            if ($is_available == 0) {
                $item_array = array('id' => $_POST["id"], 'namesp' => $_POST["namesp"], 'imgsp' => $_POST["imgsp"], 'unique_key' => $_POST["unique_key"], 'qty' => $_POST["qty"], 'pricesp' => $_POST["pricesp"], 'prsize' => $_POST["optionsize"], 'prcolor' => $_POST["optioncolor"]);
                $_SESSION["Cart"][] = $item_array;
            }
        } else {
            $item_array = array('id' => $_POST["id"], 'namesp' => $_POST["namesp"], 'imgsp' => $_POST["imgsp"], 'unique_key' => $_POST["unique_key"], 'qty' => $_POST["qty"], 'pricesp' => $_POST["pricesp"], 'prsize' => $_POST["optionsize"], 'prcolor' => $_POST["optioncolor"]);
            $_SESSION["Cart"][] = $item_array;
        }
        $stt = 1;
        $total = 0;
        $a = 'id';
        $aa = 'qty';
        $list = "";
        $totalAll = 0;
        $number = 0;
        if (!empty($_SESSION["Cart"])) {
            foreach ($_SESSION["Cart"] as $keys => $values) {
                $price = ceil($values["pricesp"]);
                if ($price > 0) {
                    $priceOut = number_format($price, 0, ",", ".") . ' ₫';
                } else {
                    $priceOut = 'Liên hệ';
                }
                $total = ceil($price * $values['qty']);
                $totalOut = number_format($total, 0, ",", ".");
                 $color = $values["prcolor"];
                $size = $values["prsize"];
                if ($color != null and $size != null) {
                $pcolorsize = "<p class='colorsize'>" . $values['prsize'] . "," . $values['prcolor'] . "</p>";
                } else {
                    $pcolorsize = "";
                }
                $list.= '   
                    <div class="item testst">
                       <p class="img">
                          <span>' . $values['qty'] . '</span>
                          <img width="70" height="70" alt="' . $values['namesp'] . '" src="' . $path_url . '/' . $values['imgsp'] . '" />
                       </p>
                       <div class="meta">
                          <h3><a href="' . $path_url . '/' . $values['unique_key'] . '.html">' . $values['namesp'] . '</a></h3>
                          ' . $pcolorsize . '
                          <!--<p class="del"><a href="javascript:void(0)" onclick=\'delCart("' . $path_url . '/gio-hang/delete/' . $values['id'] . '/")\' ><i class="fa fa-trash" aria-hidden="true"></i></a></p>-->
                       </div>
                       <p class=tong>' . $totalOut . '₫</p>
                    </div>
                ';
                $totalAll+= $total;
            }
        }
        $_SESSION["number"] = $number;
        $_SESSION["totalAll"] = $totalAll;
        $smarty->assign("totalAll", $totalAll);
        $smarty->assign("ListCart", $list);
        $template = "cart/dat-hang-nhanh.tpl";
        break;
    }
    $smarty->assign("checkHome", 2);
    $smarty->display($template);
?>