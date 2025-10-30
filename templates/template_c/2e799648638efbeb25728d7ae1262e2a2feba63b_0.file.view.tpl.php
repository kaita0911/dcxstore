<?php
/* Smarty version 4.3.1, created on 2025-10-30 10:47:45
  from 'D:\htdocs\dcxstore\templates\tpl\articles\view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690334414446c2_17234195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e799648638efbeb25728d7ae1262e2a2feba63b' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\articles\\view.tpl',
      1 => 1761817662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 1,
  ),
),false)) {
function content_690334414446c2_17234195 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main  ddd">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
      <div class="clearfix"></div>
      <h1> <?php echo $_smarty_tpl->tpl_vars['c_ttl']->value;?>
</h1>
      <div class="artseed-ftn-body">
         <div class="content-news-main row">

            <div id="viewlist" data-ajax-load="1" data-container="viewlist" data-pagination="viewpage" data-module="<?php echo $_smarty_tpl->tpl_vars['data_url']->value;?>
" data-comp="<?php echo $_smarty_tpl->tpl_vars['data_comp']->value;?>
"></div>
            <div id="viewpage" class="pagination" data-container="viewlist" data-module="<?php echo $_smarty_tpl->tpl_vars['data_url']->value;?>
" data-comp="<?php echo $_smarty_tpl->tpl_vars['data_comp']->value;?>
"></div>
         </div>

      </div>
   </div>
</div><?php }
}
