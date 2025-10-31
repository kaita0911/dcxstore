<?php
require_once(__DIR__ . "/../#include/config.php");
require_once(__DIR__ . "/../#include/email_config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once(__DIR__ . "/../libraries/phpmailer/PHPMailer.php");
require_once(__DIR__ . "/../libraries/phpmailer/SMTP.php");
require_once(__DIR__ . "/../libraries/phpmailer/Exception.php");

header('Content-Type: application/json; charset=utf-8');

$get_email = $sp->getRow("SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id = 6");
$adminEmail = $get_email['plain_text_vn'];

$get_domain = $sp->getRow("SELECT * FROM {$GLOBALS['db_sp']}.infos WHERE id = 2");
$domain = $get_domain['domain'];

$fullname = trim($_POST['fullname'] ?? '');
$email    = trim($_POST['email'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$message  = trim($_POST['message'] ?? '');

if ($fullname === '' || $email === '' || $phone === '') {
    echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin bắt buộc!']);
    exit;
}

// === Lưu vào database ===
try {
    $GLOBALS['sp']->execute("
        INSERT INTO {$GLOBALS['db_sp']}.register_info (fullname, email, phone, message, created_at)
        VALUES (?, ?, ?, ?, NOW())
    ", [$fullname, $email, $phone, $message]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Không thể lưu dữ liệu: ' . $e->getMessage()]);
    exit;
}

// === GỬI MAIL ===
try {
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host       = SMTP_SERVER;
    $mail->SMTPAuth   = true;
    $mail->Username   = MAIL_USER;
    $mail->Password   = MAIL_PASS;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->isHTML(true);
    $mail->setFrom(MAIL_FROM, $domain);

    // =========================
    // 1️⃣ Gửi cho ADMIN
    // =========================
    //$adminEmail = $emails['admin'] ?? MAIL_FROM;
    $mail->clearAllRecipients();

    $mail->addAddress($adminEmail, 'Admin');
    $mail->Subject = "📩 Có đăng ký mới từ website";

    $bodyAdmin = "
        <h3>Thông tin đăng ký mới</h3>
        <p><b>Họ tên:</b> {$fullname}</p>
        <p><b>Email:</b> {$email}</p>
        <p><b>Điện thoại:</b> {$phone}</p>
        <p><b>Nội dung:</b> {$message}</p>
        <p><i>Gửi lúc:</i> " . date("d/m/Y H:i") . "</p>
    ";
    $mail->Body = $bodyAdmin;
    $mail->send();

    // =========================
    // 2️⃣ Gửi xác nhận cho KHÁCH HÀNG
    // =========================
    $mail->clearAllRecipients();
    $mail->addAddress($email, $fullname);
    $mail->Subject = "✅ Cảm ơn bạn đã đăng ký thông tin tại {$domain}";
    $mail->Body = "
        <p>Xin chào <b>{$fullname}</b>,</p>
        <p>Cảm ơn Quý khách đã gửi thông tin cho chúng tôi!</p>
        <p>Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất.</p>
        <hr>
        <p><i>Thông tin bạn đã gửi:</i></p>
        <ul>
            <li><b>Email:</b> {$email}</li>
            <li><b>Điện thoại:</b> {$phone}</li>
            <li><b>Nội dung:</b> {$message}</li>
        </ul>
        <p>Trân trọng,<br><b>" . MAIL_FROMNAME . "</b></p>
    ";
    $mail->send();
} catch (Exception $e) {
    error_log("Mail error: " . $mail->ErrorInfo);
    // Không dừng script — vì đã lưu DB ok
}

echo json_encode([
    'success' => true,
    'message' => 'Đăng ký thành công! Cảm ơn quy khách đã đăng ký. Chúng tôi sẽ liên lạc trong thời gian sớm nhất'
]);
exit;
