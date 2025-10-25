<?php
session_start();
include_once('../#include/config.php');

$id = intval($_POST['id'] ?? 0);
$quantity = intval($_POST['quantity'] ?? 1);

if ($id <= 0 || $quantity <= 0) {
  echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
  exit;
}

if (!isset($_SESSION['cart'][$id])) {
  echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng.']);
  exit;
}

// Cập nhật số lượng
$_SESSION['cart'][$id]['quantity'] = $quantity;

// Tính lại tổng tiền từng sản phẩm và toàn giỏ
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
  $total_price += $item['price'] * $item['quantity'];
}

$item_total = $_SESSION['cart'][$id]['price'] * $_SESSION['cart'][$id]['quantity'];

echo json_encode([
  'success' => true,
  'item_total' => number_format($item_total, 0, ',', '.') . '₫',
  'total_price' => number_format($total_price, 0, ',', '.') . '₫',
]);
exit;
