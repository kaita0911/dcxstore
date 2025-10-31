<?php
/* Smarty version 4.3.1, created on 2025-10-31 09:32:58
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\register_info\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6904743a894289_35405307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b30adf63ab13d195434526cb8accae67403eafa5' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\register_info\\edit.tpl',
      1 => 1761899576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_6904743a894289_35405307 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">

      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <div class="right_content">
         <div class="main-content">

            <div class="form-item">
               <label class="title" for="fullname">Họ tên</label>
               <div class="meta">
                  <input type="text" id="fullname"
                     value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['fullname'], ENT_QUOTES, 'UTF-8', true);?>
"
                     class="InputText" readonly>
               </div>
            </div>

            <div class="form-item">
               <label class="title" for="phone">Điện thoại</label>
               <div class="meta">
                  <input type="text" id="phone"
                     value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['phone'], ENT_QUOTES, 'UTF-8', true);?>
"
                     class="InputText" readonly>
               </div>
            </div>

            <div class="form-item">
               <label class="title" for="email">Email</label>
               <div class="meta">
                  <input type="text" id="email"
                     value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
"
                     class="InputText" readonly>
               </div>
            </div>

            <div class="form-item">
               <label class="title" for="message">Nội dung</label>
               <div class="meta">
                  <textarea id="message" class="InputTextarea" readonly><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['message'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
               </div>
            </div>

            <p class="slss">
               <a href="index.php?do=register_info" title="Trở về">
                  <i class="fa fa-rotate-left"></i> Trở về
               </a>
            </p>

         </div>
      </div>

   </div>
</div><?php }
}
