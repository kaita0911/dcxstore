<?php
require_once("../#include/email_config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once("../libraries/phpmailer/PHPMailer.php");
require_once("../libraries/phpmailer/SMTP.php");
require_once("../libraries/phpmailer/Exception.php");

/**
 * Gửi email thông báo đơn hàng cho Admin và khách hàng
 *
 * @param array $orderData  Mảng thông tin đơn hàng:
 *   - id, customer_name, phone, address, wards, district, city, content, payment, shipped, total, cart (mảng sản phẩm)
 * @param array $emails     Mảng email nhận ['admin' => '...', 'customer' => '...']
 * @param string $path_url   URL gốc website
 */
function sendOrderEmails(array $orderData, array $emails, string $path_url)
{
    $orderId = $orderData['id'];
    $customerName = $orderData['customer_name'];
    $phone = $orderData['phone'];
    $address = $orderData['address'];
    $wards = $orderData['wards'];
    $district = $orderData['district'];
    $city = $orderData['city'];
    $content = $orderData['content'];
    $payment = $orderData['payment'];
    $shipped = $orderData['shipped'];
    $total = $orderData['total'];
    $cart = $orderData['cart'];

    // Tạo danh sách sản phẩm HTML
    $productListHtml = '<ul>';
    foreach ($cart as $item) {
        $itemTotal = $item['price'] * $item['quantity'];
        $productImageUrl = $path_url . '/' . ltrim($item['image'], '/');
        $productListHtml .= "<li>
            <img src='{$productImageUrl}' alt='{$item['name']}' width='50' />
            {$item['name']} - {$item['quantity']} x " . number_format($item['price'], 0, ',', '.') . "₫ = " . number_format($itemTotal, 0, ',', '.') . "₫
        </li>";
    }
    $productListHtml .= '</ul>';

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = SMTP_SERVER;
        $mail->SMTPAuth   = true;
        $mail->Username   = MAIL_USER;
        $mail->Password   = MAIL_PASS;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom(MAIL_FROM, MAIL_FROMNAME);
        $mail->isHTML(true);
        $mail->Subject = "Đơn hàng mới";

        $body = "
            <h2>Đơn hàng mới</h2>
            <p><b>Mã đơn:</b> $orderId</p>
            <p><b>Khách hàng:</b> $customerName</p>
            <p><b>Điện thoại:</b> $phone</p>
            <p><b>Địa chỉ:</b> $address, $wards, $district, $city</p>
            <p><b>Ghi chú:</b> $content</p>
            <p><b>Phương thức thanh toán:</b> $payment</p>
            <p><b>Hình thức giao hàng:</b> $shipped</p>
            <p><b>Tổng tiền:</b> " . number_format($total, 0, ',', '.') . "₫</p>
            <h3>Chi tiết sản phẩm:</h3>
            $productListHtml
        ";
        $mail->Body = $body;

        // Gửi cho Admin
        if (!empty($emails['admin'])) {
            $mail->clearAllRecipients();
            $mail->addAddress($emails['admin'], 'Admin Shop');
            $mail->send();
        }

        // Gửi cho khách hàng
        if (!empty($emails['customer'])) {
            $mail->clearAllRecipients();
            $mail->addAddress($emails['customer'], $customerName);
            $mail->send();
        }

        return true;
    } catch (Exception $e) {
        error_log("Mail error: " . $mail->ErrorInfo);
        return false;
    }
}
