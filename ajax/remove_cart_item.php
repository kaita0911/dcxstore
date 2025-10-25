<?php
session_start();

$id = intval($_POST['id'] ?? 0);
if ($id <= 0) {
  echo json_encode(['success' => false, 'message' => 'ID sản phẩm không hợp lệ']);
  exit;
}

if (isset($_SESSION['cart'][$id])) {
  unset($_SESSION['cart'][$id]);
}

// Tính lại tổng
$total_items = count($_SESSION['cart'] ?? []);
$total_price = 0;
if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    $total_price += ($item['price'] * $item['quantity']);
  }
}

echo json_encode([
  'success' => true,
  'total_items' => $total_items,
  'total_price' => number_format($total_price, 0, ',', '.') . '₫'
]);
exit;
