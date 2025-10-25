<?php
/* Smarty version 4.3.1, created on 2025-10-20 05:46:10
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\infos\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68f5b082666212_05351554',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c9906b1385c5a168b43e8e869e0de3c9d106b15' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\infos\\edit.tpl',
      1 => 1760768366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
    'file:infos/edit_logo.tpl' => 1,
    'file:infos/edit_domain.tpl' => 1,
    'file:infos/edit_googlemap.tpl' => 1,
    'file:infos/edit_content.tpl' => 1,
    'file:infos/edit_hotline.tpl' => 1,
    'file:infos/edit_email.tpl' => 1,
    'file:infos/edit_social.tpl' => 1,
    'file:infos/edit_cart.tpl' => 1,
    'file:infos/edit_time.tpl' => 1,
    'file:infos/edit_seo.tpl' => 1,
    'file:infos/edit_pagination.tpl' => 1,
    'file:infos/edit_default.tpl' => 1,
  ),
),false)) {
function content_68f5b082666212_05351554 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <div class="right_content pad">
         <form id="frmEdit"
            action="index.php?do=infos&act=<?php if ($_REQUEST['act'] == 'add') {?>addsm<?php } else { ?>editsm<?php }?>&comp=<?php echo $_REQUEST['comp'];?>
"
            method="post"
            enctype="multipart/form-data">

            <div class="btnseo">
               <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['id'];?>
" />
               <button type="submit"><i class="fa fa-save"></i> Save</button>
               <a href="javascript:history.back()"><i class="fa fa-mail-reply"></i> Trở về</a>
            </div>

            <div class="item">
               <div class="title">Tiêu đề</div>
               <div class="info-title">
                  <input type="text" name="name_vn" class="InputText" id="title"
                     value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['name_vn'], ENT_QUOTES, 'UTF-8', true);?>
" onkeyup="ChangeToSlug();">
               </div>
            </div>

                        <?php if ($_smarty_tpl->tpl_vars['edit']->value['id'] == 1) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_logo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 2) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_domain.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 3) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_googlemap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 4) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_content.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 5) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_hotline.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 6) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_email.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 7) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_social.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 12) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 13) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_time.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 15) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_seo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['edit']->value['id'] == 29) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } else { ?>
            <?php $_smarty_tpl->_subTemplateRender('file:infos/edit_default.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php }?>

                        <div class="item">
               <div class="title">Hiển thị</div>
               <div class="info-title">
                  <input type="checkbox" class="CheckBox" name="active" value="active"
                     <?php if ($_smarty_tpl->tpl_vars['edit']->value['active'] == 1 || $_REQUEST['act'] == 'add') {?>checked<?php }?>>
               </div>
            </div>
         </form>
      </div>
   </div>
</div><?php }
}
