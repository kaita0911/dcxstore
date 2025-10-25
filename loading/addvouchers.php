<?php



session_start();

    if (isset($_SESSION["Vouchers"])) {
        $is_available = 0;

        foreach ($_SESSION["Vouchers"] as $keys => $values) {
          $_SESSION["Vouchers"][$keys]['code_vouchers'] = $_SESSION["Vouchers"][$keys]['code_vouchers'] + '1';

        }
        if ($is_available == 0) 
        {

            $item_array = array('code_vouchers' => $_POST["list_check_voucher"]);

            $_SESSION["Vouchers"][] = $item_array;
        }
    }
    else
    {
        $item_array = array('code_vouchers' => $_POST["list_check_voucher"]);

        $_SESSION["Vouchers"][] = $item_array;

    }

?>