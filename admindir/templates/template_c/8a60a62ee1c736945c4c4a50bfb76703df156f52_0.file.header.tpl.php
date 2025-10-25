<?php
/* Smarty version 4.3.1, created on 2025-10-25 09:19:42
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68fc7a0e9463f5_58204390',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a60a62ee1c736945c4c4a50bfb76703df156f52' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\header.tpl',
      1 => 1760768153,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68fc7a0e9463f5_58204390 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="robots" content="NOINDEX, NOFOLLOW" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrator</title>

  <!-- Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font-awesome.css">

  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body>
  <div class="popupqc"><img src="images/giahan.jpg" alt="Gia hạn" /></div>
  <div class="header">
    <?php if ($_smarty_tpl->tpl_vars['showcart']->value['open'] == 1) {?>

    <a class="c-cart" href="index.php?do=orders">
      <span><i class="fa fa-shopping-cart"></i></span>
      <label>Danh sách đơn hàng</label>
    </a>
    <?php }?>

    <div class="date linkorg">
      <span>Hi, <strong><?php echo $_SESSION['admin_artseed_username'];?>
</strong></span>
      <a target="_blank" href="/">Xem trang chủ</a>
      <a href="index.php?do=login&act=log_out">Thoát</a>
      <a href="index.php?do=login&act=changepass">Đổi mật khẩu</a>
    </div>
  </div>
</body>

</html><?php }
}
