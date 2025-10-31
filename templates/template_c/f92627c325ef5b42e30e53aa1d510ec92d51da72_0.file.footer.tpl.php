<?php
/* Smarty version 4.3.1, created on 2025-10-31 11:29:41
  from 'D:\htdocs\dcxstore\templates\tpl\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69048f950074a8_24564930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f92627c325ef5b42e30e53aa1d510ec92d51da72' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\footer.tpl',
      1 => 1761900327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:social.tpl' => 1,
  ),
),false)) {
function content_69048f950074a8_24564930 (Smarty_Internal_Template $_smarty_tpl) {
?><footer>
  <div class="container">
    <div class="clearfix"></div>
    <div class="row">

      <!-- Thông tin công ty -->
      <div class="col-address col-md-4 col-sm-6 col-xs-12">
        <h2><?php echo $_smarty_tpl->tpl_vars['gioithieuFooter']->value['name_vn'];?>
</h2>

        <div class="item">
          <i class="fa-solid fa-location-dot"></i> Địa chỉ: <?php echo $_smarty_tpl->tpl_vars['Footer']->value['address'];?>

        </div>
        <div class="item">
          <i class="fa-solid fa-phone"></i> Hotline: <strong><?php echo $_smarty_tpl->tpl_vars['gioithieuFooter']->value['hotline'];?>
</strong>
        </div>
        <div class="item">
          <i class="fa-solid fa-envelope"></i> Email: <?php echo $_smarty_tpl->tpl_vars['gioithieuFooter']->value['email'];?>

        </div>

        <ul class="social">
          <?php if ($_smarty_tpl->tpl_vars['faceShare']->value['facebook']) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['faceShare']->value['facebook'];?>
"><i class="fa-brands fa-facebook-f"></i></a></li><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['faceShare']->value['instagram']) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['faceShare']->value['instagram'];?>
"><i class="fa-brands fa-instagram"></i></a></li><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['faceShare']->value['youtube']) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['faceShare']->value['youtube'];?>
"><i class="fa-brands fa-youtube"></i></a></li><?php }?>
          <?php if ($_smarty_tpl->tpl_vars['faceShare']->value['twitter']) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['faceShare']->value['twitter'];?>
"><i class="fa-brands fa-twitter"></i></a></li><?php }?>
        </ul>
      </div>

      <!-- Thông tin hữu ích -->
      <div class="consulting col-md-4 col-ms-4 col-xs-12">
        <div class="contactfirst">
          <h2>Thông tin hữu ích</h2>
          <ul>
            <?php echo $_smarty_tpl->tpl_vars['listservice']->value;?>

          </ul>
        </div>
      </div>

      <!-- Fanpage Facebook -->
      <div class="fanpage col-md-4 col-ms-4 col-xs-12">
        <div class="contactfirst">
          <h2>FANPAGE</h2>

        </div>
      </div>

    </div>
  </div>
</footer>
<div id="cart-popup"></div>
<div id="c-loading">
  <div id="orderLoading"><img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/images/loading.svg"></div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:social.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
