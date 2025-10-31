<?php
/* Smarty version 4.3.1, created on 2025-10-31 06:13:04
  from 'D:\htdocs\dcxstore\templates\tpl\articles\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690445609ed966_53878936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10cef2d519d7993853f26ebd55d210330ba8baf7' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\articles\\list.tpl',
      1 => 1761118897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_690445609ed966_53878936 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="f-articles">
   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
   <div class="articles">
      <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lang_prefix']->value;
echo $_smarty_tpl->tpl_vars['item']->value['unique_key'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
">
         <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['img_thumb_vn'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" class="img-responsive">
         <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
</h3>
      </a>
      <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['dated'],"%d/%m/%Y");?>
</div>
      <div class="news-desc">
         <?php echo $_smarty_tpl->tpl_vars['item']->value['short_detail'];?>

      </div>
   </div>
   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}
