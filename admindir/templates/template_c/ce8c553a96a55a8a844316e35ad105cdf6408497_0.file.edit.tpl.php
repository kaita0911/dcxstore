<?php
/* Smarty version 4.3.1, created on 2025-10-31 03:03:04
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\menu\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690418d8c64243_51487756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce8c553a96a55a8a844316e35ad105cdf6408497' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\menu\\edit.tpl',
      1 => 1761876098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_690418d8c64243_51487756 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <div class="right_content">
         <form id="formId"
            action="index.php?do=menu&act=<?php if ($_REQUEST['act'] == 'add') {?>addsm<?php } else { ?>editsm<?php }?>&comp=<?php echo $_REQUEST['comp'];?>
"
            method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['edit']->value['id'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">

            <div class="divright">
               <div class="acti2">
                  <button class="add" type="submit">
                     <i class="fa fa-save"></i> Save
                  </button>
               </div>
               <div class="acti2">
                  <a class="add" href="javascript:history.back()">
                     <i class="fa fa-mail-reply"></i> Trở về
                  </a>
               </div>
            </div>

            <div class="main-content">
               <div class="item">
                  <div class="title">Tiêu đề</div>
                  <div class="info-title">
                     <input type="text"
                        name="name"
                        id="title"
                        class="InputText title-input"
                        value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['menuDetail']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" required>
                  </div>
               </div>

               <div class="item">
                  <div class="title">URL</div>
                  <div class="info-title">
                     <input type="text"
                        name="unique_key"
                        id="slug"
                        class="InputText slug-input"
                        value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['menuDetail']->value['unique_key'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                  </div>
               </div>
               <div class="item">
                  <div class="title">Thứ tự</div>
                  <div class="info-title">
                     <input type="text"
                        name="num"
                        class="InputNum num-order"
                        value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['edit']->value['num'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
                  </div>
               </div>

               <div class="item">
                  <div class="title">Liên kết</div>
                  <div class="option_link">
                     <label>
                        <input type="radio" name="choose" value="1" <?php if ($_smarty_tpl->tpl_vars['edit']->value['choose'] == 1) {?>checked<?php }?>>
                        Loại bài viết
                     </label>
                     <label>
                        <input type="radio" name="choose" value="0" <?php if ($_smarty_tpl->tpl_vars['edit']->value['choose'] == 0) {?>checked<?php }?>>
                        Link
                     </label>
                  </div>

                  <select id="menu" name="menu" class="show">
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lienket']->value, 'link');
$_smarty_tpl->tpl_vars['link']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->do_else = false;
?>
                     <option value="<?php echo $_smarty_tpl->tpl_vars['link']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['link']->value['id'] == $_smarty_tpl->tpl_vars['edit']->value['comp']) {?>selected<?php }?>>
                        <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['link']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

                     </option>
                     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>

                  <input type="text"
                     id="link"
                     name="link"
                     class="linkngoai hide"
                     value="<?php echo htmlspecialchars((string)(($tmp = $_smarty_tpl->tpl_vars['edit']->value['link_out'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
">
               </div>

               <div class="item">
                  <label>
                     <input type="checkbox"
                        name="menucon"
                        value="menucon"
                        class="CheckBox"
                        <?php if ($_smarty_tpl->tpl_vars['edit']->value['has_sub'] == 1) {?>checked<?php }?>>
                     Có menucon
                  </label>
                  <label>
                     <input type="checkbox"
                        name="active"
                        value="active"
                        class="CheckBox"
                        <?php if ($_smarty_tpl->tpl_vars['edit']->value['active'] == 1 || $_REQUEST['act'] == 'add') {?>checked<?php }?>>
                     Show
                  </label>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

<?php echo '<script'; ?>
>
   document.addEventListener("DOMContentLoaded", function() {
      const toggleMenuLink = () => {
         const yes1 = document.querySelector("#yes1");
         const menu = document.getElementById("menu");
         const link = document.querySelector(".linkngoai");
         if (yes1 && yes1.checked) {
            menu.classList.add("hide");
            menu.classList.remove("show");
            link.classList.add("show");
            link.classList.remove("hide");
         } else {
            menu.classList.add("show");
            menu.classList.remove("hide");
            link.classList.add("hide");
            link.classList.remove("show");
         }
      };
      document.querySelectorAll('input[name="choose"]').forEach(el => {
         el.addEventListener("change", toggleMenuLink);
      });
      toggleMenuLink();
   });
<?php echo '</script'; ?>
>
<?php }
}
