<?php
/* Smarty version 4.3.1, created on 2025-10-28 11:06:46
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\contact\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690095b65b66c5_22385810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1c319aa7ef55a121c95ee98412eb1c6aabb88af' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\contact\\edit.tpl',
      1 => 1761645374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_690095b65b66c5_22385810 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <div class="right_content">
         <div class="main-content">
            <div class="item">
               <div class="title">Họ tên</div>
               <div class="meta">
                  <input type="text" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="InputText" />
               </div>
            </div>
            <div class="item">
               <div class="title">Điện thoại</div>
               <div class="meta">
                  <input type="text" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['phone'], ENT_QUOTES, 'UTF-8', true);?>
" class="InputText" />
               </div>
            </div>
            <div class="item">
               <div class="title">Email</div>
               <div class="meta">
                  <input type="text" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
" class="InputText" />
               </div>
            </div>
            <div class="item">
               <div class="title">Nội dung</div>
               <div class="meta">
                  <textarea class="InputTextarea"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['message'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
               </div>
            </div>
            <p class="slss">
               <a href="index.php?do=contact&comp=23" title="Trở về">
                  <i class="fa fa-rotate-left"></i> Trở về
               </a>
            </p>
         </div>
      </div>
   </div>
</div><?php }
}
