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

    if (isset($_SESSION["Cart"]))
    {
        $is_available = 0;
        foreach ($_SESSION["Cart"] as $keys => $values)
        {
          if($_SESSION["Cart"][$keys]['id'] == $_POST["id"] && $_SESSION["Cart"][$keys]['pricesp'] == $_POST["pricesp"])
          {
              $is_available = 1;
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
                'selected' => true
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
            'selected' => true
        );
        $_SESSION["Cart"][] = $item_array;
    }
}
?>
