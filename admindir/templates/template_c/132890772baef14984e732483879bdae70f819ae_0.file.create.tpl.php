<?php
/* Smarty version 4.3.1, created on 2025-10-31 03:13:30
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\menu\create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69041b4a852d08_86956140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '132890772baef14984e732483879bdae70f819ae' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\menu\\create.tpl',
      1 => 1761875421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69041b4a852d08_86956140 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <div class="right_content">
         <form id="frmEdit" name="frmEdit" action="index.php?do=menu&act=<?php if ($_REQUEST['act'] == 'add') {?>addsm<?php } else { ?>editsm<?php }?>" method="post" enctype="multipart/form-data">
            <div class="col00">
               <div class="content">
                  <input type="hidden" name="cat" value="<?php echo $_REQUEST['cid'];?>
">
                  <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['id'];?>
">
                  <div class="divright">
                     <div class="acti2"><button class="add" type="submit"><i class="fa fa-save"></i> Save</button></div>
                     <div class="acti2"> <a class="add" href="javascript:history.back()"><i class="fa fa-mail-reply"></i> Trở về</a></div>
                  </div>
                  <div class="main-content">
                     <div class="item">
                        <div class="title">Tiêu đề</div>
                        <div class="info-title">
                           <input type="text" id="title" name="name" class="InputText title-input">
                        </div>
                     </div>
                     <div class="item">
                        <div class="title">URL</div>
                        <div class="info-title"><input type="text" id="slug" name="unique_key" class="InputText slug-input"></div>
                     </div>
                     <div class="item">
                        <div class="title">Liên kết</div>
                        <div class="option_link">
                           <label class="radio-inline"><input type="radio" id="yes2" name="choose" value="1" checked> Loại bài viết</label>
                           <label class="radio-inline"><input type="radio" id="yes1" name="choose" value="0"> Link</label>
                        </div>
                        <select id="menu" name="menu" class="show">
                           <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['lienket']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                           <option value="<?php echo $_smarty_tpl->tpl_vars['lienket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['lienket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'] == $_smarty_tpl->tpl_vars['edit']->value['comp']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['lienket']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</option>
                           <?php
}
}
?>
                        </select>
                        <div class="linkngoai hide"><input type="text" id="link" name="link" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['link'];?>
" class="InputText"></div>
                     </div>
                     <div class="item">
                        <div class="title">Có menu con <input type="checkbox" class="CheckBox" name="menucon" value="menucon" <?php if ($_smarty_tpl->tpl_vars['edit']->value['menucon'] == 1) {?>checked<?php }?>></div>
                     </div>
                     <div class="item">
                        <div class="title">Hiển thị <input type="checkbox" class="CheckBox" name="active" value="active" <?php if ($_smarty_tpl->tpl_vars['edit']->value['active'] == 1 || $_REQUEST['act'] == 'add') {?>checked<?php }?>></div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php echo '<script'; ?>
>
   function toggleLinkOption() {
      const isLink = document.getElementById('yes1').checked;
      document.getElementById('menu').classList.toggle('hide', isLink);
      document.querySelector('.linkngoai').classList.toggle('show', isLink);
      document.querySelector('.linkngoai').classList.toggle('hide', !isLink);
   }
   document.getElementById('yes1').addEventListener('click', toggleLinkOption);
   document.getElementById('yes2').addEventListener('click', toggleLinkOption);
   toggleLinkOption();

   function SubmitFromGo(formId) {
      if (typeof updateAllSlugs === 'function') updateAllSlugs();
      const form = document.getElementById(formId);
      if (form) form.submit();
      else console.error("Không tìm thấy form:", formId);
   }
<?php echo '</script'; ?>
><?php }
}
