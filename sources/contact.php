<?php
include_once(__DIR__ . "/../#include/config.php");
include_once(__DIR__ . "/../functions/sendOrderEmails.php");


if (isset($_SESSION['contact_success']) && $_SESSION['contact_success']) {
	$smarty->assign('contact_success', true);
	unset($_SESSION['contact_success']); // xóa để không hiển thị lại
} else {
	$smarty->assign('contact_success', false);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//header('Content-Type: application/json; charset=utf-8');

	$name    = $_POST['name'] ?? '';
	$phone   = $_POST['phone'] ?? '';
	$email   = $_POST['email'] ?? '';
	$address = $_POST['address'] ?? '';
	$message = $_POST['message'] ?? '';

	$GLOBALS['sp']->execute(
		"INSERT INTO {$GLOBALS['db_sp']}.contact (name, phone, email, address, message,dated)
		 VALUES (?, ?, ?, ?, ?,NOW())",
		[
			$name,
			$phone,
			$email,
			$address,
			$message,
		]
	);

	$contactData = [
		'name'    => $name,
		'phone'   => $phone,
		'email'   => $email,
		'address' => $address,
		'message' => $message
	];
	$emails = [
		'admin' => 'kaita0911@gmail.com',
		// 'customer' => $contactData['email'] // nếu muốn gửi phản hồi cho khách
	];

	if (sendContactEmail($contactData, $emails)) {
		$_SESSION['contact_success'] = true;
	} else {
		$error = 'Gửi email thất bại.';
	}
}
$smarty->assign("seo", $cat);
