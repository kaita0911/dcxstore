<?php
/* Smarty version 4.3.1, created on 2025-10-31 11:29:40
  from 'D:\htdocs\dcxstore\templates\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69048f9490f757_11023868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e8752e2518c6550dc085628d618941ce6842d64' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\header.tpl',
      1 => 1761370651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:categories_tree.tpl' => 1,
  ),
),false)) {
function content_69048f9490f757_11023868 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<header>
  <!-- <div class="topmb">
    <div class="menu-icon"><i class="fa-solid fa-list-check"></i> Menu</div>
    <div class="searchmb"><span class="icon-search"><i class="fa fa-search"></i> Search</span></div>
    <div class="cartmb">
      <div class="cart">
        <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/gio-hang/" class="cart-popover btn" title="Shopping Cart">
          <i class="fa-light fa-cart-arrow-down"></i>
          <span class="badge">0</span>
          <span class="seds hidden-xs">Giỏ hàng</span>
        </a>
      </div>
    </div>
  </div> -->
  <div class="container">
    <div class="header-body">
      <div class="logo">
        <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['logoHome']->value['name_vn'];?>
">
          <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['logoHome']->value['img_thumb_vn'];?>
" class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['logoHome']->value['name_vn'];?>
">
        </a>
      </div>
      <div class="lang-switch">
        <!-- VN: ẩn /vn/ -->
        <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/" class="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'vn') {?>active<?php }?>">
          VI
        </a>
        <!-- EN: có /en/ -->
        <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/en/" class="<?php if ($_smarty_tpl->tpl_vars['lang']->value == 'en') {?>active<?php }?>">
          EN
        </a>
      </div>
      <div class="product-search">
        <form id="searchForm">
          <input type="text" name="keyword" id="keyword" placeholder="Nhập từ khóa..." required>
          <button type="submit">Tìm kiếm</button>
        </form>
        <div class="cart">
          <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/gio-hang" class="cart-popover btn" title="Shopping Cart">
            <i class="fa-light fa-cart-arrow-down"></i>
            <span id="num-cart">0</span>
            <span class="seds hidden-xs">Giỏ hàng</span>
          </a>
        </div>
        <div class="menu menu_mb">
          <nav class="menutop">
            <ul class="menu">

              <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lang_prefix']->value;?>
" title="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['home']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                  <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['home']->value, ENT_QUOTES, 'UTF-8', true);?>

                </a>
              </li>


              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menus']->value, 'menu');
$_smarty_tpl->tpl_vars['menu']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->do_else = false;
?>
              <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lang_prefix']->value;
echo $_smarty_tpl->tpl_vars['menu']->value['unique_key_detail'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name_detail'];?>
</a>

                <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['menu']->value['categories']) > 0) {?>
                <ul class="submenu">
                  <?php $_smarty_tpl->_subTemplateRender('file:categories_tree.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('categories'=>$_smarty_tpl->tpl_vars['menu']->value['categories'],'level'=>1), 0, true);
?>
                </ul>
                <?php }?>
              </li>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

              <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lang_prefix']->value;?>
lien-he"
                  title="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                  <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value, ENT_QUOTES, 'UTF-8', true);?>

                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
</header><?php }
}
