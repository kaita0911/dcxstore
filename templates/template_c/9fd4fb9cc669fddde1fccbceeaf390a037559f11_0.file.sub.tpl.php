<?php
/* Smarty version 4.3.1, created on 2025-10-31 06:06:17
  from 'D:\htdocs\dcxstore\templates\tpl\articles\sub.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690443c96e5292_63243869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fd4fb9cc669fddde1fccbceeaf390a037559f11' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\articles\\sub.tpl',
      1 => 1761882239,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 1,
  ),
),false)) {
function content_690443c96e5292_63243869 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
      <h1> <?php echo $_smarty_tpl->tpl_vars['c_ttl']->value;?>
</h1>
      <div class="artseed-ftn-body">
         <div class="p-articles" id="viewlist" data-ajax-load="1" data-container="viewlist" data-pagination="viewpage" data-module="<?php echo $_smarty_tpl->tpl_vars['data_url']->value;?>
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
