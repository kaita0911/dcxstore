<?php
/* Smarty version 4.3.1, created on 2025-10-30 11:19:08
  from 'D:\htdocs\dcxstore\templates\tpl\products\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69033b9cec0a56_40182412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db86a88ae626872340adad32cb6ede2425df74ec' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\products\\detail.tpl',
      1 => 1761014788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 1,
  ),
),false)) {
function content_69033b9cec0a56_40182412 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<div class="main">
  <div class="container">
    <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
    <div class="row">
      <!-- Main content -->
      <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
        <div class="title-page">
          <h1 itemprop="headline"><?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
</h1>
        </div>
        <!-- <div class="box-gallery">
          <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['product_images']->value) > 0) {?>
          <div class="product-gallery">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product_images']->value, 'img');
$_smarty_tpl->tpl_vars['img']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->do_else = false;
?>
            <div class="image-item">
              <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['img']->value['img_vn'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
">
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </div>

          <?php }?>
        </div> -->
        <div class="box-price">
          <?php if ($_smarty_tpl->tpl_vars['item']->value['price'] > 0) {?>
          <span class="price-current"><?php echo number_format($_smarty_tpl->tpl_vars['detail']->value['price'],0,',','.');?>
 ₫</span>
          <?php } else { ?>
          Liên hệ
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['item']->value['priceold'] > 0) {?>
          <span class="price-old"><?php echo number_format($_smarty_tpl->tpl_vars['detail']->value['priceold'],0,',','.');?>
 ₫</span>
          <?php }?>
        </div>
        <form id="product-order-form">
          <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['articlelist_id'];?>
">
          <label>Số lượng:</label>
          <input type="number" name="quantity" value="1" min="1">

          <div class="buttons">
            <button type="button" class="btn-add-cart" data-id="<?php echo $_smarty_tpl->tpl_vars['detail']->value['articlelist_id'];?>
">Đặt hàng</button>
            <button type="button" class="btn-buy-now" data-id="<?php echo $_smarty_tpl->tpl_vars['detail']->value['articlelist_id'];?>
">Mua nhanh</button>
          </div>
        </form>
        <div class="pagewhite" itemprop="articleBody">
          <div class="artseed-detail-content">
            <?php echo $_smarty_tpl->tpl_vars['detail']->value['content'];?>

          </div>
        </div>
      </div>
      <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['articles_related']->value) > 0) {?>
      <div class="related-articles">
        <h3>Sản phẩm liên quan</h3>
        <ul>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles_related']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
          <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lang_prefix']->value;
echo $_smarty_tpl->tpl_vars['item']->value['link_detail'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['img_thumb_vn'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
" class="img-responsive">
              <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
</h3>
              <div class="box-price">
                <span class="price-current"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['price'],0,',','.');?>
 ₫</span>/<span class="price-old"><?php echo number_format($_smarty_tpl->tpl_vars['item']->value['priceold'],0,',','.');?>
 ₫</span>
              </div>
            </a>
          </li>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
      </div>
      <?php }?>
      <!-- /.artseed-ftn-body -->
    </div>
  </div>
</div><?php }
}
