<?php
/* Smarty version 4.3.1, created on 2025-10-30 11:21:00
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69033c0ca39b60_40672293',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a60a62ee1c736945c4c4a50bfb76703df156f52' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\header.tpl',
      1 => 1761726926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69033c0ca39b60_40672293 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<!DOCTYPE html>
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="robots" content="NOINDEX, NOFOLLOW" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrator</title>

  <!-- Styles -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/font-awesome.css">
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>
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

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['languages']->value) > 1) {?>
    <!-- HTML dropdown chọn ngôn ngữ -->
    <div class="select-languages">
      <select name="language" id="language-select">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['currentLang']->value == $_smarty_tpl->tpl_vars['lang']->value['id']) {?>selected<?php }?>>
          <?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>

        </option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </select>
    </div><?php }?>
    <div class="date linkorg">
      <span>Hi, <strong><?php echo $_SESSION['admin_artseed_username'];?>
</strong></span>
      <a target="_blank" href="/">Xem trang chủ</a>
      <a href="index.php?do=login&act=log_out">Thoát</a>
      <a href="index.php?do=login&act=changepass">Đổi mật khẩu</a>
    </div>
  </div>
</body>

</html>
<?php echo '<script'; ?>
>
  document.getElementById('language-select').addEventListener('change', function() {
    const lang = this.value;
    console.log(lang);
    fetch('./set_language.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'language=' + encodeURIComponent(lang)
    }).then(response => {
      if (response.ok) {
        //alert(sss);
        // Có thể reload trang hiện tại để áp dụng ngôn ngữ
        location.reload();
      }
    });
  });
<?php echo '</script'; ?>
><?php }
}
