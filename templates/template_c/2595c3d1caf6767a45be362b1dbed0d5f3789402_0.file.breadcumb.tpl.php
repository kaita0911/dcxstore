<?php
/* Smarty version 4.3.1, created on 2025-10-25 09:49:37
  from 'D:\htdocs\dcxstore\templates\tpl\breadcumb.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68fc81113433c0_79507136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2595c3d1caf6767a45be362b1dbed0d5f3789402' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\breadcumb.tpl',
      1 => 1760932653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68fc81113433c0_79507136 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
if (smarty_modifier_count($_smarty_tpl->tpl_vars['breadcrumbs']->value) > 1) {?>
<nav class="breadcrumb">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['breadcrumbs']->value, 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <?php if ($_smarty_tpl->tpl_vars['key']->value+1 < smarty_modifier_count($_smarty_tpl->tpl_vars['breadcrumbs']->value)) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a> &raquo;
        <?php } else { ?>
        <span><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</span>
        <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</nav>
<?php }
}
}
