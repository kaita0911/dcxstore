<?php
/* Smarty version 4.3.1, created on 2025-10-25 09:49:44
  from 'D:\htdocs\dcxstore\templates\tpl\cart\dat-hang.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68fc8118e88079_28118104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e82af8c975d120b982519270f0409579089da08' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\cart\\dat-hang.tpl',
      1 => 1761032738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68fc8118e88079_28118104 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<title>Xác nhận đặt hàng</title>

<div class="main">
  <div class="container">
    <form name="formOrder" id="formOrder" class="form-contact" method="post">
      <div class="flex-cart">
        <div class="cart-actions">
          <button type="submit" class="btn-order">Thanh toán</button>
        </div>

        <div class="main-cart cart">
          <div class="info-detail-cart">
            <div class="form-receive-cart">
              <div class="input-group">
                <input type="text" class="form-control" id="names" name="names" placeholder="Họ tên" required />
              </div>

              <div class="input-group">
                <input type="text" class="form-control" id="phones" name="phones" placeholder="Điện thoại" required />
              </div>

              <div class="box-choosed">
                <div class="box-choosed__rd">
                  <input type="radio" id="c-home" name="shipped" value="home" checked>
                  <label for="c-home">Giao tận nơi</label>
                </div>
                <div class="box-choosed__rd">
                  <input type="radio" id="c-shop" name="shipped" value="Nhận tại cửa hàng">
                  <label for="c-shop">Nhận tại cửa hàng</label>
                </div>
              </div>

              <div id="box-home" class="is-show">
                <div class="input-group">
                  <input type="text" class="form-control" id="addresss" name="addresss" placeholder="Địa chỉ" required />
                </div>

                <div class="address-flex">
                  <select id="city" name="city" required>
                    <option value="">Tỉnh/TP</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['thanhpho']->value, 'tp');
$_smarty_tpl->tpl_vars['tp']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tp']->value) {
$_smarty_tpl->tpl_vars['tp']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['tp']->value['matp'];?>
"><?php echo $_smarty_tpl->tpl_vars['tp']->value['name'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>

                  <select id="district" name="district" required>
                    <option value="">Quận/Huyện</option>
                  </select>

                  <select id="wards" name="wards" required>
                    <option value="">Phường/Xã</option>
                  </select>
                </div>
              </div>

              <div class="input-group">
                <textarea name="content" placeholder="Ghi chú"></textarea>
              </div>
            </div>
          </div>

          <div class="info-detail-cart">
            <div class="tit-detail-cart">
              <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/images/ic_cart_2.svg" /> Chi tiết đơn hàng
            </div>
            <div class="sum-info-cart">
              <div class="cart-box">
                <?php if ((isset($_smarty_tpl->tpl_vars['cart']->value)) && smarty_modifier_count($_smarty_tpl->tpl_vars['cart']->value) > 0) {?>
                <ul class="cart-items">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                  <?php $_smarty_tpl->_assignInScope('itemTotal', $_smarty_tpl->tpl_vars['item']->value['price']*$_smarty_tpl->tpl_vars['item']->value['quantity']);?>
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
                    <div class="cart-item-quantity"><?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
</div>
                    <div class="cart-item-price" data-price="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
                      <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,',','.');?>
₫
                    </div>
                    <div class="cart-item-total">
                      Thành tiền: <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['itemTotal']->value,0,',','.');?>
₫
                    </div>
                  </li>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
                <?php } else { ?>
                <p>Giỏ hàng trống.</p>
                <?php }?>
              </div>
            </div>
          </div>

          <div class="right_info_customer">
            <div class="box-pay">
              <div class="right_info_customer__ttl">Chi tiết đơn hàng</div>
              <div class="totalend totalsumall" id="sumall">
                <span class="">Số lượng</span>
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
                <div class="sum">
                  Tổng tiền <strong>
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
                  </strong>
                </div>

                <div class="option-cart-vc hidden-xs">
                  <div class="tit-detail-cart">Phương thức thanh toán</div>
                  <ul>
                    <li>
                      <label for="radio-cart2">
                        <input id="radio-cart2" type="radio" name="radiothanhtoan" value="Thanh toán khi giao hàng (COD)" checked="checked" />
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/images/cod.png" alt="cod" /> Thanh toán khi giao hàng (COD)
                      </label>
                    </li>
                    <li>
                      <label for="radio-cart1">
                        <input id="radio-cart1" type="radio" name="radiothanhtoan" value="Chuyển khoản qua ngân hàng" />
                        <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/images/other.png" alt="bank" /> Chuyển khoản qua ngân hàng
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['makm']->value['open'] == 1) {?>
            <div class="info-detail-cart">
              <div class="sum-info-cart">
                <div class="field-vouchers">
                  <div class="field-input-wrapper">
                    <input placeholder="Mã giảm giá" id="vouchers" name="vouchers" value="">
                  </div>
                  <span class="btn-vouchers"><span class="btn-content">Sử dụng</span></span>
                  <div id="showvouchers"></div>
                  <div class="listvourcher">
                    <?php echo $_smarty_tpl->tpl_vars['list_x_vouches']->value;?>

                    <div class="black"></div>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
      </div>
    </form>
  </div>
</div><?php }
}
