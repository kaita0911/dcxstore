<?php
/* Smarty version 4.3.1, created on 2025-10-25 09:32:05
  from 'D:\htdocs\dcxstore\templates\tpl\articles\detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68fc7cf5727c65_10202257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f85244e6b1d0eea76a97c65bf6d6b53590ee0173' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\articles\\detail.tpl',
      1 => 1760932759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 1,
  ),
),false)) {
function content_68fc7cf5727c65_10202257 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
      <div class="row">
         <!-- Main content -->
         <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
            <div class="title-page">
               <h1 itemprop="headline"><?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
</h1>
            </div>

            <div class="pagewhite" itemprop="articleBody">
               <div class="artseed-detail-content">
                  <?php echo $_smarty_tpl->tpl_vars['detail']->value['content'];?>

               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['articles_related']->value) > 0) {?>
         <div class="related-articles">
            <h3>Tin liên quan</h3>
            <ul>
               <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles_related']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
               <li>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['lang_prefix']->value;
echo $_smarty_tpl->tpl_vars['item']->value['unique_key'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
">
                     <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['img_thumb_vn'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
" class="img-responsive">
                     <h3><?php echo $_smarty_tpl->tpl_vars['item']->value['name_detail'];?>
</h3>
                     <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['dated'],"%d/%m/%Y");?>
</div>
                  </a>
               </li>
               <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
         </div>
         <?php }?>
         <!-- /.artseed-ftn-body -->
      </div>
   </div>
</div><?php }
}
