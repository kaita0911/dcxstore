<?php
/* Smarty version 4.3.1, created on 2025-10-20 05:46:10
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\infos\edit_seo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68f5b082b2afd6_26220701',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c459df7e603212895d8ddd14ced258570791e749' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\infos\\edit_seo.tpl',
      1 => 1760317754,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68f5b082b2afd6_26220701 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="item">
    <div class="title">Title Web</div>
    <div class="info-title">
        <input type="text" name="plain_text_vn" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['plain_text_vn'];?>
" class="InputText" />
    </div>
</div>

<div class="item">
    <div class="title">Domain</div>
    <div class="info-title">
        <input type="text" name="domain" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['domain'];?>
" class="InputText" />
    </div>
</div>

<div class="item">
    <div class="title">Meta Keywords</div>
    <div class="meta">
        <input name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['keyword'];?>
" data-role="tagsinput" class="InputText" />
    </div>
</div>

<div class="item">
    <div class="title">Meta Description</div>
    <div class="meta">
        <textarea name="desc" class="InputTextarea" id="inputDesc"><?php echo $_smarty_tpl->tpl_vars['edit']->value['desc'];?>
</textarea>
        <span id="showNumDesc" style="color:#ed1b24;">0</span>
    </div>
</div><?php }
}
