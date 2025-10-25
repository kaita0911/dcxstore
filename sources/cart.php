<?php
include_once("../#include/config.php"); // hoặc "../includes/config.php" nếu bạn để trong thư mục đó
include_once("../functions/sendOrderEmails.php"); // hoặc "../includes/config.php" nếu bạn để trong thư mục đó

session_start();
//include_once('../#include/config.php'); // config, db, Smarty...
$cart_count = 0;
$action = $_GET['action'] ?? 'view';


$sql_city = $GLOBALS['sp']->getAll("SELECT * FROM {$GLOBALS['db_sp']}.thanhpho WHERE active=1 ORDER BY num ASC");
$smarty->assign("thanhpho", $sql_city);


// Lấy giỏ hàng từ session
$cart = $_SESSION['cart'] ?? [];
$smarty->assign('cart', $cart);
$smarty->assign('path_url', $config['BASE_URL']);

// Xử lý route
switch ($action) {
    // ============================
    // 🧾 THANH TOÁN (AJAX)
    // ============================
    case 'thanh-toan':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json; charset=utf-8');

            // Lấy dữ liệu từ form
            $names     = trim($_POST['names'] ?? '');
            $phones    = trim($_POST['phones'] ?? '');
            $addresss  = trim($_POST['addresss'] ?? '');
            $city_id      = $_POST['city'] ?? '';
            $district_id  = $_POST['district'] ?? '';
            $wards_id     = $_POST['wards'] ?? '';
            $get_city = $GLOBALS['sp']->getRow(
                "SELECT * FROM {$GLOBALS['db_sp']}.thanhpho WHERE active=1 AND matp = ?",
                [$city_id]
            );
            $get_district = $GLOBALS['sp']->getRow(
                "SELECT * FROM {$GLOBALS['db_sp']}.quanhuyen WHERE maqh = ?",
                [$district_id]
            );
            $get_ward = $GLOBALS['sp']->getRow(
                "SELECT * FROM {$GLOBALS['db_sp']}.phuongxa WHERE xaid = ?",
                [$wards_id]
            );
            $smarty->assign("thanhpho", $sql_city);

            $city = $get_city['name'];
            $district = $get_district['name'];
            $wards = $get_ward['name'];
            $content   = $_POST['content'] ?? '';
            $payment   = $_POST['radiothanhtoan'] ?? 'COD';
            $shipped   = $_POST['shipped'] ?? 'home';
            $cart      = $_SESSION['cart'] ?? [];

            if (empty($cart)) {
                echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống!']);
                exit;
            }

            // Tính tổng tiền
            $total = 0;
            $totalQty = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
                $totalQty += $item['quantity'];
            }

            // Lưu đơn hàng
            $sql = "INSERT INTO {$GLOBALS['db_sp']}.orders 
                    (name, phone, address, thanhpho, quanhuyen, phuongxa, content, qty, descs, phiship, totalend,created_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
            $GLOBALS['sp']->execute($sql, [
                $names,
                $phones,
                $addresss,
                $city,
                $district,
                $wards,
                $content,
                $totalQty,
                $payment,
                $shipped,
                $total
            ]);
            $order_id = $GLOBALS['sp']->Insert_ID();
            // Lưu chi tiết đơn hàng

            foreach ($cart as $item) {
                // Tạo đường dẫn đầy đủ cho ảnh
                $productImageUrl = $path_url . '/' . ltrim($item['image'], '/');
                $itemTotal = $item['price'] * $item['quantity']; // Tổng tiền sản phẩm
                //$totalQuality += $item['quantity']; // Cộng vào tổng đơn hàng

                $GLOBALS['sp']->execute(
                    "INSERT INTO {$GLOBALS['db_sp']}.orders_line (order_id, product_name, product_id, product_image, qty, product_price, tamtinh)
                     VALUES (?, ?, ?, ?, ?,?,?)",
                    [$order_id, $item['name'], $item['id'], $productImageUrl, $item['quantity'], $item['price'], $itemTotal]
                );
            }


            ///////////////////
            $orderData = [
                'id' => $order_id,
                'customer_name' => $names,
                'phone' => $phones,
                'address' => $addresss,
                'wards' => $wards,
                'district' => $district,
                'city' => $city,
                'content' => $content,
                'payment' => $payment,
                'shipped' => $shipped,
                'total' => $total,
                'cart' => $cart
            ];
            $emails = [
                'admin' => 'kaita0911@email.com',
                'customer' => $phones . '@mail.com' // hoặc email thực tế của khách
            ];
            sendOrderEmails($orderData, $emails, $path_url);
            // Xóa giỏ hàng
            unset($_SESSION['cart']);

            echo json_encode([
                'success' => true,
                'redirect' => $config['BASE_URL'] . '/finish'
            ]);
            exit;
        }
        break;

    // ============================
    // 🧾 Trang cảm ơn
    // ============================
    case 'finish':
        $template = "cart/finish.tpl";
        break;

    // ============================
    // 🛒 Trang đặt hàng
    // ============================
    case 'dat-hang':
        $template = "cart/dat-hang.tpl";
        break;

    // ============================
    // 🛍️ Xem giỏ hàng
    // ============================
    default:

        $template = "cart/list.tpl";
        break;
}
