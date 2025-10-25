<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //$newprice = $_POST['pricesp'];
    if (isset($_POST['modal']))
    {
        $size = $_POST['modal'];
    }
    else
    {
        $size = "";
    }
    if (isset($_POST['color']))
    {
        $color = $_POST['color'];
    }
    else
    {
        $color = "";
    }

    if (isset($_SESSION["Cart"]))
    {
        $is_available = 0;
        foreach ($_SESSION["Cart"] as $keys => $values)
        {
            if ($_SESSION["Cart"][$keys]['id'] == $_POST["id"] && $_SESSION["Cart"][$keys]['pricesp'] == $_POST["pricesp"])
            {
                $is_available++;
                $_SESSION["Cart"][$keys]['qty'] = $_SESSION["Cart"][$keys]['qty'] + $_POST["qty"];
            }

        }
        if ($is_available == 0)
        {
            $item_array = array(
                'id' => $_POST["id"],
                'namesp' => $_POST["namesp"],
                'unique_key' => $_POST["unique_key"],
                'imgsp' => $_POST["imgsp"],
                'qty' => $_POST["qty"],
                'pricesp' => $_POST["pricesp"],
                'size' => $_POST['modal'],
                'color' => $_POST['color'],
                'selected' => $_POST['selected']
            );
            $_SESSION["Cart"][] = $item_array;
        }
    }
    else
    {
        $item_array = array(
            'id' => $_POST["id"],
            'namesp' => $_POST["namesp"],
            'unique_key' => $_POST["unique_key"],
            'imgsp' => $_POST["imgsp"],
            'qty' => $_POST["qty"],
            'pricesp' => $_POST["pricesp"],
            'size' => $_POST['modal'],
            'color' => $_POST['color'],
            'selected' => $_POST['selected']
        );
        $_SESSION["Cart"][] = $item_array;

    }
    $number = count($_SESSION["Cart"]);
    if($_POST['modal'])

        {
            $size = ''.$_POST['modal'].'';
            $pcolorsize ='<p class="colorsize">Loại: '.$size.'</p>';

             if($_POST['color'])
            {
                 $color = ''.$_POST['color'].'';
                 $pcolorsize ='<p class="colorsize">Loại: '.$size.', '.$color.'</p>';

            }

        }
        else if($_POST['color'])
            {
                 $color = ''.$_POST['color'].'';
                 $pcolorsize ='<p class="colorsize">Loại: '.$color.'</p>';

            }
        else{

            $pcolorsize ='';

        }

    $output.= '<div class="ajaxcart">

                    <p class="img">

                    <img class="img-responsive" width="70" height="70" alt="' . $_POST['namesp'] . '" src="' . $path_url . '/' . $_POST['imgsp'] . '" /></p>

                    <div class="content">

                        <h3>' . $_POST['namesp'] . '</h3>

                        '.$pcolorsize.'

                        <p class="soluong">X ' . $_POST['qty'] . '</p>

                        <p class="price">' . number_format($_POST['pricesp'], 0, ",", ".") . '₫</p>

                    </div>

                </div>';
    $output.= '<a class="thdh" href="' . $path_url . '/gio-hang/">Xem giỏ hàng</a>';
    $data = array('cart_details' => $output, 'number' => $number);
   
}
 echo json_encode($data);
?>
