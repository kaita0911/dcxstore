<?php
/* Smarty version 4.3.1, created on 2025-10-31 05:23:13
  from 'D:\htdocs\dcxstore\templates\tpl\project\view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690439b14086e9_03782071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '911c243059a452742eebedf88aa7e602b2b463b1' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\project\\view.tpl',
      1 => 1761874078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 1,
  ),
),false)) {
function content_690439b14086e9_03782071 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
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
