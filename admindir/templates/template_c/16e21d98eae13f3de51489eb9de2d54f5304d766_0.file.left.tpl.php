<?php
/* Smarty version 4.3.1, created on 2025-10-31 03:16:33
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\left.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69041c0198c030_41279587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16e21d98eae13f3de51489eb9de2d54f5304d766' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\left.tpl',
      1 => 1761794955,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69041c0198c030_41279587 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="/" target="_blank" class="logo">
  <img height="40" src="../<?php echo $_smarty_tpl->tpl_vars['logoadmin']->value['img_thumb_vn'];?>
" alt="Logo" />
</a>

<div class="menusidebar" id="sidebar">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ListMenuLeft']->value, 'menu');
$_smarty_tpl->tpl_vars['menu']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->do_else = false;
?>
  <div class="nav-item">
    <div class="nav-toggle" href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['links']['list'];?>
">
      <span><i class="fa <?php echo $_smarty_tpl->tpl_vars['menu']->value['icon'];?>
"></i></span>
      <label><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</label>
      <i class="fa fa-angle-down"></i>
    </div>

        <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value['brand'])) || (isset($_smarty_tpl->tpl_vars['menu']->value['category'])) || (isset($_smarty_tpl->tpl_vars['menu']->value['detail'])) || (isset($_smarty_tpl->tpl_vars['menu']->value['size'])) || (isset($_smarty_tpl->tpl_vars['menu']->value['color'])) || (isset($_smarty_tpl->tpl_vars['menu']->value['links']['add']))) {?>
    <div class="list-sidebar">
      <a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['links']['list'];?>
">Danh sách</a>

      <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value['category']))) {?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['category'];?>
">Danh mục</a>
      <?php }?>
      <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value['brand']))) {?>
      <a href="index.php?do=categories&comp=76">Thương hiệu</a>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value['detail']))) {?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['detail'];?>
">Cấu hình</a>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value['size']))) {?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['size'];?>
">Kích thước</a>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['menu']->value['color']))) {?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['color'];?>
"> Màu sắc</a>
      <?php }?>
    </div>
    <?php }?>
  </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

  <div class="nav-item">
    <div class="nav-toggle">
      <span><i class="fa fa-book"></i></span>
      <label>Liên hệ</label>
      <i class="fa fa-angle-down"></i>
    </div>
    <div class="list-sidebar">
      <a href="index.php?do=contact&comp=23">
        KH Liên hệ
      </a>
      <?php if ($_smarty_tpl->tpl_vars['showform']->value['open'] == 1) {?>
      <a href="index.php?do=taovandon">
        KH đăng ký Form
      </a>
      <?php }?>
    </div>
  </div>
  <?php if ($_SESSION['admin_artseed_username'] == 'kaita') {?>
  <div class="nav-item">
    <div class="nav-toggle">
      <span><i class="fa fa-globe"></i></span>
      <label>Thông tin website</label>
      <i class="fa fa-angle-down"></i>
    </div>
    <div class="list-sidebar">
      <a href="index.php?do=component"> Module</a>
      <a href="index.php?do=language">Ngôn ngữ</a>
      <a href="index.php?do=properties">Thuộc tính</a>
      <a href="index.php?do=menu">Menu trên</a>
      <a href="index.php?do=infos&comp=9">Cấu hình</a>
    </div>
  </div>
  <?php } else { ?>

  <a class="nav-normal" href="index.php?do=infos&comp=9">
    <span><i class="fa fa-globe"></i></span>
    <label>Cấu hình</label>
  </a>

  <?php }?>
  <a class="nav-normal" href="index.php">
    <span><i class="fa fa-globe"></i></span>
    <label>Thông tin chân trang</label>
  </a>
  <a class="nav-normal" href="index.php">
    <span><i class="fa fa-globe"></i></span>
    <label>Tổng quan</label>
  </a>
</div><?php }
}
