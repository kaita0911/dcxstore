<?php
/* Smarty version 4.3.1, created on 2025-10-31 11:16:04
  from 'D:\htdocs\dcxstore\templates\tpl\cart\finish.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69048c64919ae0_70998624',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45e942a5f4fa1dc74f4df0284344a61bf51e6449' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\cart\\finish.tpl',
      1 => 1761029071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69048c64919ae0_70998624 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="box-order-success">

	<h2>Đặt hàng thành công !</h2>
	<div class="content">
		<p>Cảm ơn Quý Khách, chúng tôi sẽ gọi xác nhận và giao hàng cho quý khách trong thời gian sớm nhất!</p>
		<p><img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/images/tk.png" class="img-responsive"></p>
		<p><a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
"><i class="fa-solid fa-house-user"></i> Quay về trang chủ</a></p>
	</div>
</div>
<?php echo '<script'; ?>
 language="javascript" type="text/javascript">
	setTimeout(function() {
		window.location.href = '<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
';
	}, 10000);
<?php echo '</script'; ?>
><?php }
}
