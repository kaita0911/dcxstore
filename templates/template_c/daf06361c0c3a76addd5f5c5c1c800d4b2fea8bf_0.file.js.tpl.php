<?php
/* Smarty version 4.3.1, created on 2025-10-28 11:15:26
  from 'D:\htdocs\dcxstore\templates\tpl\js.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690097be7db828_88429982',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daf06361c0c3a76addd5f5c5c1c800d4b2fea8bf' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\js.tpl',
      1 => 1761377522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_690097be7db828_88429982 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
  const PATH_URL = "<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/";
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/js/cart.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/js/pagination.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/js/search.js"><?php echo '</script'; ?>
><?php }
}
