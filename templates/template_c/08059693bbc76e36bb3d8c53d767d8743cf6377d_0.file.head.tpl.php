<?php
/* Smarty version 4.3.1, created on 2025-10-31 03:17:31
  from 'D:\htdocs\dcxstore\templates\tpl\head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69041c3bd51942_24504744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08059693bbc76e36bb3d8c53d767d8743cf6377d' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\head.tpl',
      1 => 1761377347,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69041c3bd51942_24504744 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="content-language" content="vn">
  <meta name="DC.Coverage" content="Vietnam">
  <meta name="robots" content="INDEX, FOLLOW, NOODP">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;
echo $_SERVER['REQUEST_URI'];?>
">
  <meta name="geo.region" content="Vietnam">
  <meta name="geo.placename" content="Vietnam">
  <meta property="og:type" content="website">
  <?php if ($_smarty_tpl->tpl_vars['is_home']->value == 1) {?>
  <title><?php echo $_smarty_tpl->tpl_vars['seo']->value['name_vn'];?>
</title>
  <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['keyword'];?>
">
  <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['desc'];?>
">
  <meta itemprop="image" content="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['logoHome']->value['img_thumb_vn'];?>
">
  <meta itemprop="description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['desc'];?>
">
  <meta itemprop="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['keyword'];?>
">
  <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['name_vn'];?>
">
  <meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['name_vn'];?>
">
  <meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['desc'];?>
">
  <meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;
echo $_SERVER['REQUEST_URI'];?>
">
  <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['logoHome']->value['img_thumb_vn'];?>
">
  <?php } else { ?>
  <title><?php echo $_smarty_tpl->tpl_vars['c_ttl']->value;?>
</title>
  <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['keyword'];?>
">
  <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['des'];?>
">
  <meta itemprop="image" content="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['logoHome']->value['img_thumb_vn'];?>
">
  <meta itemprop="description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['des'];?>
">
  <meta itemprop="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['keyword'];?>
">
  <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['name'];?>
">
  <meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['name'];?>
">
  <meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['des'];?>
">
  <meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;
echo $_SERVER['REQUEST_URI'];?>
">
  <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['logoHome']->value['img_thumb_vn'];?>
">

  <?php }?>
  <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/css/<?php echo $_smarty_tpl->tpl_vars['page_flag']->value;?>
.css">
</head><?php }
}
