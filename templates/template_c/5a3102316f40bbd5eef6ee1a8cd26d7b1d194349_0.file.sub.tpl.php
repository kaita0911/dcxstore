<?php
/* Smarty version 4.3.1, created on 2025-10-30 11:19:16
  from 'D:\htdocs\dcxstore\templates\tpl\products\sub.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69033ba47f99a9_60574503',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a3102316f40bbd5eef6ee1a8cd26d7b1d194349' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\products\\sub.tpl',
      1 => 1761369631,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 2,
    'file:products/list.tpl' => 1,
  ),
),false)) {
function content_69033ba47f99a9_60574503 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- <div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
      <div class="clearfix"></div>
      <h1> <?php echo $_smarty_tpl->tpl_vars['c_ttl']->value;?>
</h1>
      <div class="artseed-ftn-body">
         <div class="content-news-main row">
            <?php if ($_smarty_tpl->tpl_vars['CheckNull']->value == 0) {?>
            <div class="nodate">##No_date##</div>
            <?php } else { ?>
            <div id="viewlist" class="p-products">
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
               <?php $_smarty_tpl->_subTemplateRender("file:products/list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
               <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['Checkpg']->value == 1) {?>
            <div class="clearfix"></div>
            <div class="pagination" id="viewpage">
               <?php echo (($tmp = $_smarty_tpl->tpl_vars['linkpg']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>

            </div>
            <?php }?>
         </div>
      </div>
   </div>
</div> -->
<div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div>
      <div class="clearfix"></div>
      <h1> <?php echo $_smarty_tpl->tpl_vars['c_ttl']->value;?>
 sub</h1>
      <div class="artseed-ftn-body">
         <form method="get" id="filterForm">
            <select name="sort" id="sortSelect">
               <option value="id_desc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'id_desc') {?>selected<?php }?>>Mới nhất</option>
               <option value="price_asc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'price_asc') {?>selected<?php }?>>Giá tăng dần</option>
               <option value="price_desc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'price_desc') {?>selected<?php }?>>Giá giảm dần</option>
               <option value="name_asc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'name_asc') {?>selected<?php }?>>Tên A-Z</option>
               <option value="name_desc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'name_desc') {?>selected<?php }?>>Tên Z-A</option>
            </select>
         </form>
         <div class="p-products" id="viewlist" data-ajax-load="1" data-container="viewlist" data-pagination="viewpage" data-module="<?php echo $_smarty_tpl->tpl_vars['data_url']->value;?>
" data-comp="<?php echo $_smarty_tpl->tpl_vars['data_comp']->value;?>
" data-sort="<?php echo (($tmp = $_smarty_tpl->tpl_vars['sort']->value ?? null)===null||$tmp==='' ? 'id_desc' ?? null : $tmp);?>
" data-sub="<?php echo $_smarty_tpl->tpl_vars['data_sub']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data_cateid']->value;?>
"></div>
         <div id="viewpage" class="pagination" data-container="viewlist" data-module="<?php echo $_smarty_tpl->tpl_vars['data_url']->value;?>
" data-comp="<?php echo $_smarty_tpl->tpl_vars['data_comp']->value;?>
" data-sub="<?php echo $_smarty_tpl->tpl_vars['data_sub']->value;?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['data_cateid']->value;?>
"></div>
      </div>
   </div>
</div><?php }
}
