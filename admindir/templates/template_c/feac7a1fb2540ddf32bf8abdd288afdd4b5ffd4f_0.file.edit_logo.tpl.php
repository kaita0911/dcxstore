<?php
/* Smarty version 4.3.1, created on 2025-10-31 05:56:51
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\infos\edit_logo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6904419394fbf8_83785072',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'feac7a1fb2540ddf32bf8abdd288afdd4b5ffd4f' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\infos\\edit_logo.tpl',
      1 => 1760317512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6904419394fbf8_83785072 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="item">
    <div class="title">Logo</div>
    <?php if ($_smarty_tpl->tpl_vars['edit']->value['img_thumb_vn'] != '') {?>
    <img src="../<?php echo $_smarty_tpl->tpl_vars['edit']->value['img_thumb_vn'];?>
" height="100"><br>
    <?php }?>
    <input type="file" name="img_thumb_vn" id="img_thumb_vn" onchange="check_file('img_thumb_vn');">
    <span class="SizeImgDel">Xóa hình <input type="checkbox" name="del_thumb_vn" value="del_thumb_vn"></span>
</div><?php }
}
