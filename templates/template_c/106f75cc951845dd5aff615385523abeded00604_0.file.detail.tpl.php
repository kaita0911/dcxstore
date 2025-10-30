<?php
/* Smarty version 4.3.1, created on 2025-10-30 11:20:23
  from 'D:\htdocs\dcxstore\templates\tpl\about\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69033be7150326_13116811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '106f75cc951845dd5aff615385523abeded00604' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\about\\detail.tpl',
      1 => 1760934403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 1,
  ),
),false)) {
function content_69033be7150326_13116811 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
      <div class="row">
         <!-- Sidebar left -->

         <h1 itemprop="headline"><?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
</h1>
         <!-- Main content -->
         <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
            <div class="title-page">
               <h1 itemprop="headline"><?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
</h1>
            </div>

            <div class="pagewhite" itemprop="articleBody">
               <div class="artseed-detail-content">
                  <?php echo $_smarty_tpl->tpl_vars['detail']->value['short'];?>

               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <!-- /.artseed-ftn-body -->

      </div>
   </div>
</div><?php }
}
