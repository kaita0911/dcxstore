<?php
session_start();
$number = 0;
if (!empty($_SESSION["Cart"])) {
    $number = count($_SESSION["Cart"]);
}
$data = array('number' => $number);
echo json_encode($data);
?>



