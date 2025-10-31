<?php
/* Smarty version 4.3.1, created on 2025-10-31 07:42:53
  from 'D:\htdocs\dcxstore\templates\tpl\search\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69045a6dd47248_13431689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd63ace0b7bae9e9d67608c408945dfa46b286090' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\search\\list.tpl',
      1 => 1761214032,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69045a6dd47248_13431689 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['CheckNull']->value == 0) {?>
<div class="nodate">Không tìm thấy kết quả</div>
<?php } else {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
<div class="products-item">
    <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lang_prefix']->value;
echo $_smarty_tpl->tpl_vars['item']->value['unique_key'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
">
        <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['img_thumb_vn'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" class="img-responsive">
    </a>
    <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
</h3>
    <div class="price">
        <?php if ($_smarty_tpl->tpl_vars['item']->value['price'] > 0) {?>
        <span class="price-current"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,',','.');?>
 ₫</span>
        <?php } else {
echo $_smarty_tpl->tpl_vars['contact']->value;
}?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['priceold'] > 0) {?>
        <span class="price-old"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['priceold'],0,',','.');?>
 ₫</span>
        <?php }?>
    </div>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
