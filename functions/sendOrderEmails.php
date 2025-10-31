<?php
require_once(__DIR__ . "/../#include/email_config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once(__DIR__ . "/../libraries/phpmailer/PHPMailer.php");
require_once(__DIR__ . "/../libraries/phpmailer/SMTP.php");
require_once(__DIR__ . "/../libraries/phpmailer/Exception.php");

/**
 * Hàm khởi tạo PHPMailer cấu hình sẵn
 */
function createMailer(): PHPMailer
{
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host       = SMTP_SERVER;
    $mail->SMTPAuth   = true;
    $mail->Username   = MAIL_USER;
    $mail->Password   = MAIL_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->setFrom(MAIL_FROM, MAIL_FROMNAME);
    $mail->isHTML(true);
    return $mail;
}

/**
 * Gửi email (dùng chung cho order và contact)
 */
function sendEmail(string $subject, string $body, array $emails, string $adminEmail): bool
{
    try {
        $mail = createMailer();
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Gửi Admin
        if (!empty($emails['admin'])) {
            $mail->clearAllRecipients();
            $mail->addAddress($adminEmail, 'Admin');
            $mail->send();
        }

        // Gửi khách hàng (nếu có)
        if (!empty($emails['customer'])) {
            $mail->clearAllRecipients();
            $mail->addAddress($emails['customer']);
            $mail->send();
        }

        return true;
    } catch (Exception $e) {
        error_log("PHPMailer error: " . $e->getMessage());
        return false;
    }
}

/**
 * Gửi email thông báo đơn hàng
 */
function sendOrderEmails(array $orderData, array $emails, string $path_url): bool
{
    $get_email  = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id = 6");
    $adminEmail = $get_email['plain_text_vn'] ?? '';

    $get_domain = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id = 2");
    $domain     = $get_domain['domain'] ?? '';

    $orderId       = $orderData['id'] ?? '';
    $customerName  = $orderData['customer_name'] ?? '';
    $phone         = $orderData['phone'] ?? '';
    $address       = $orderData['address'] ?? '';
    $wards         = $orderData['wards'] ?? '';
    $district      = $orderData['district'] ?? '';
    $city          = $orderData['city'] ?? '';
    $content       = $orderData['content'] ?? '';
    $payment       = $orderData['payment'] ?? '';
    $shipped       = $orderData['shipped'] ?? '';
    $total         = $orderData['total'] ?? 0;
    $cart          = $orderData['cart'] ?? [];

    // Danh sách sản phẩm
    $productListHtml = '<ul style="list-style:none;padding:0;">';
    foreach ($cart as $item) {
        $price      = $item['price'] ?? 0;
        $qty        = $item['quantity'] ?? 1;
        $name       = htmlspecialchars($item['name'] ?? '');
        $imageUrl   = htmlspecialchars($path_url . '/' . ltrim($item['image'] ?? '', '/'));
        $itemTotal  = $price * $qty;

        $productListHtml .= "
            <li style='margin-bottom:8px'>
                <img src='{$imageUrl}' alt='{$name}' width='50' style='vertical-align:middle;margin-right:8px;'/>
                {$name} - {$qty} x " . number_format($price, 0, ',', '.') . "₫ 
                = <b>" . number_format($itemTotal, 0, ',', '.') . "₫</b>
            </li>";
    }
    $productListHtml .= '</ul>';

    $body = "
        <h2>Đơn hàng mới từ {$domain}</h2>
        <p><b>Mã đơn:</b> {$orderId}</p>
        <p><b>Khách hàng:</b> {$customerName}</p>
        <p><b>Điện thoại:</b> {$phone}</p>
        <p><b>Địa chỉ:</b> {$address}, {$wards}, {$district}, {$city}</p>
        <p><b>Ghi chú:</b> {$content}</p>
        <p><b>Thanh toán:</b> {$payment}</p>
        <p><b>Giao hàng:</b> {$shipped}</p>
        <p><b>Tổng tiền:</b> <b>" . number_format($total, 0, ',', '.') . "₫</b></p>
        <h3>Chi tiết sản phẩm:</h3>
        {$productListHtml}
    ";

    return sendEmail("Đơn hàng mới từ {$domain}", $body, $emails, $adminEmail);
}

/**
 * Gửi email thông báo liên hệ
 */
function sendContactEmail(array $contactData, array $emails): bool
{
    $get_email  = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id = 6");
    $adminEmail = $get_email['plain_text_vn'] ?? '';

    $get_domain = $GLOBALS['sp']->getRow("SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id = 2");
    $domain     = $get_domain['domain'] ?? '';

    $name    = htmlspecialchars($contactData['name'] ?? '');
    $phone   = htmlspecialchars($contactData['phone'] ?? '');
    $email   = htmlspecialchars($contactData['email'] ?? '');
    $address = htmlspecialchars($contactData['address'] ?? '');
    $message = nl2br(htmlspecialchars($contactData['message'] ?? ''));

    $body = "
        <h2>Khách hàng liên hệ từ {$domain}</h2>
        <p><b>Họ tên:</b> {$name}</p>
        <p><b>Điện thoại:</b> {$phone}</p>
        <p><b>Email:</b> {$email}</p>
        <p><b>Địa chỉ:</b> {$address}</p>
        <p><b>Nội dung:</b><br>{$message}</p>
    ";

    return sendEmail("Khách hàng liên hệ từ {$domain}", $body, $emails, $adminEmail);
}
