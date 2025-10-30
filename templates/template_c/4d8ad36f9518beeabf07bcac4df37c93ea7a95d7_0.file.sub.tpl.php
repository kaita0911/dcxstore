<?php
/* Smarty version 4.3.1, created on 2025-10-30 11:17:39
  from 'D:\htdocs\dcxstore\templates\tpl\brand\sub.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69033b439d9312_52574521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d8ad36f9518beeabf07bcac4df37c93ea7a95d7' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\brand\\sub.tpl',
      1 => 1761819423,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 1,
  ),
),false)) {
function content_69033b439d9312_52574521 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
      <div class="clearfix"></div>
      <h1> <?php echo $_smarty_tpl->tpl_vars['c_ttl']->value;?>
</h1>
      <div class="artseed-ftn-body">
         <!-- <form method="get" id="filterForm">
            <select name="sort" id="sortSelect">
               <option value="id_desc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'id_desc') {?>selected<?php }?>>Mới nhất</option>
               <option value="price_asc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'price_asc') {?>selected<?php }?>>Giá tăng dần</option>
               <option value="price_desc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'price_desc') {?>selected<?php }?>>Giá giảm dần</option>
               <option value="name_asc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'name_asc') {?>selected<?php }?>>Tên A-Z</option>
               <option value="name_desc" <?php if ($_smarty_tpl->tpl_vars['sort']->value == 'name_desc') {?>selected<?php }?>>Tên Z-A</option>
            </select>
         </form> -->
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
