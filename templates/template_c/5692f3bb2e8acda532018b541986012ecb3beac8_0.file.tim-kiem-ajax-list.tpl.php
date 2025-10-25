<?php
/* Smarty version 4.3.1, created on 2025-10-22 01:56:46
  from 'D:\htdocs\dcxstore\templates\tpl\search\tim-kiem-ajax-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68f81dbe90c0c1_47708750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5692f3bb2e8acda532018b541986012ecb3beac8' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\search\\tim-kiem-ajax-list.tpl',
      1 => 1761058632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68f81dbe90c0c1_47708750 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['CheckNull']->value > 0) {
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
    <div class="price"><?php if ($_smarty_tpl->tpl_vars['item']->value['price'] > 0) {?>
        <span class="price-current"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,',','.');?>
 ₫</span>
        <?php } else { ?>
        <?php echo $_smarty_tpl->tpl_vars['contact']->value;?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['priceold'] > 0) {?>
        <span class="price-old"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['priceold'],0,',','.');?>
 ₫</span>
        <?php }?>
    </div>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else { ?>
<p>Không tìm thấy kết quả cho "<b><?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
</b>"</p>
<?php }
}
}
