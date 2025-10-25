<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    session_start();

    header('Content-Type: application/json');

    $data = json_decode(file_get_contents("php://input"), true);

    $total = $qtyTotal = $item_total = 0;

    foreach ($data['items'] as $item) {
        $productId = $item['id'];
        $price = $item['price'];
        $qty = $item['qty'];
        $checked = $item['checked'];

        foreach ($_SESSION["Cart"] as $keys => $values)
        {
            if ($_SESSION["Cart"][$keys]['id'] == $productId && $_SESSION["Cart"][$keys]['pricesp'] == $price)
            {
                $_SESSION["Cart"][$keys]['selected'] = $checked ? true : false;

                $_SESSION["Cart"][$keys]['qty'] = $qty;

            }
           
        }
      
    }

    foreach ($_SESSION["Cart"] as $keys => $values)
    {
        //$item_total = $_SESSION["Cart"][$keys]['qty'] * $_SESSION["Cart"][$keys]['pricesp'];

        if($_SESSION["Cart"][$keys]['selected'] == true)
        {
            $total += $_SESSION["Cart"][$keys]['pricesp'] * $_SESSION["Cart"][$keys]['qty'];

            $qtyTotal += $_SESSION["Cart"][$keys]['qty'];

        }
    }

}
//$_SESSION["number"] = $qtyTotal;

echo json_encode([
    'success' => true,
    'message' => 'Cart session updated',
    //'item_total' => number_format($item_total,0,",",".").' đ',
    'qty' => $qtyTotal,
    'total' => number_format($total,0,",",".").' đ'
]);