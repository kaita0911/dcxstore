<?php
/* Smarty version 4.3.1, created on 2025-10-25 09:50:35
  from 'D:\htdocs\dcxstore\templates\tpl\cart\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68fc814bd91fb2_60348003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c691c49ea21cd24419194867b8ce269cacb97c71' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\cart\\list.tpl',
      1 => 1761018819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68fc814bd91fb2_60348003 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="cart-box">
  <?php if ((isset($_smarty_tpl->tpl_vars['cart']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['cart']->value) > 0) {?>
  <ul class="cart-items">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <li class="cart-item" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
      <a class="cart-item-name" href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lang_prefix']->value;
echo $_smarty_tpl->tpl_vars['item']->value['unique_key'];?>
.html"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
      <div class="cart-item-image"><img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
"></div>
      <div class="cart-item-quantity">
        <button class="btn-qty decrease">−</button>
        <input type="number" min="1" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
" class="input-qty" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
        <button class="btn-qty increase">+</button>
      </div>
      <div class="cart-item-price" data-price="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">

        <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,',','.');?>
₫

      </div>
      <div class="cart-item-total">
        <?php if ($_smarty_tpl->tpl_vars['item']->value['price'] > 0) {?>
        Thành tiền: <?php echo smarty_modifier_number_format(($_smarty_tpl->tpl_vars['item']->value['price']*$_smarty_tpl->tpl_vars['item']->value['quantity']),0,',','.');?>
₫
        <?php }?>
      </div>
      <button class="btn-remove-item" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Xoá</button>
    </li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>

  <div class="cart-summary">
    Tổng:
    <?php $_smarty_tpl->_assignInScope('total', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <?php $_smarty_tpl->_assignInScope('total', $_smarty_tpl->tpl_vars['total']->value+($_smarty_tpl->tpl_vars['item']->value['price']*$_smarty_tpl->tpl_vars['item']->value['quantity']));?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['total']->value,0,',','.');?>
₫
  </div>
  <div class="cart-total-quality">
    <span class="cart-total-quality">
      <?php $_smarty_tpl->_assignInScope('totalQty', 0);?>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
      <?php $_smarty_tpl->_assignInScope('totalQty', $_smarty_tpl->tpl_vars['totalQty']->value+$_smarty_tpl->tpl_vars['item']->value['quantity']);?>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <?php echo $_smarty_tpl->tpl_vars['totalQty']->value;?>

    </span>
  </div>

  <div class="cart-actions">
    <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/dat-hang" class="btn btn-primary">Đặt hàng</a>
    <!-- <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/cart.php" class="btn btn-secondary">Xem giỏ hàng</a> -->
  </div>
  <?php } else { ?>
  <p>Giỏ hàng trống.</p>
  <?php }?>
</div><?php }
}
