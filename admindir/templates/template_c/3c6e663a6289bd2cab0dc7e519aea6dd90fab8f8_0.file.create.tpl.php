<?php
/* Smarty version 4.3.1, created on 2025-10-31 04:33:04
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\categories\create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69042df07ccd51_76862836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c6e663a6289bd2cab0dc7e519aea6dd90fab8f8' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\categories\\create.tpl',
      1 => 1761881391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
    'file:categories/category_tree.tpl' => 1,
  ),
),false)) {
function content_69042df07ccd51_76862836 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <div class="right_content conten">
         <form name="allsubmit" id="frmEdit"
            action="index.php?do=categories&act=<?php if ($_REQUEST['act'] == 'add') {?>addsm<?php } else { ?>editsm<?php }?>&comp=<?php echo $_REQUEST['comp'];?>
"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="comp" value="<?php echo (($tmp = $_REQUEST['comp'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
            <div class="divright">
               <div class="acti2">
                  <button type="submit" class="add">
                     <i class="fa fa-save"></i> Save
                  </button>
               </div>
               <div class="acti2">
                  <a class="add" href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a>
               </div>

            </div>
            <div class="main-content">
               <div class="wrap-main">
                  <div class="left100">
                     <div class="item">
                        <div class="title">Tiêu đề</div>
                        <div class="info-title">
                           <input type="text" name="name" id="title"
                              class="InputText title-input" required />
                        </div>
                     </div>
                     <div class="item">
                        <div class="title">URL</div>
                        <div class="info-title">
                           <input type="text" id="slug" name="unique_key"
                              class="InputText slug-input" />
                        </div>
                     </div>

                     <div class="item">
                        <div class="title">Mô tả chi tiết</div>
                        <div class="meta">
                           <textarea id="editor" name="content"></textarea>
                        </div>
                     </div>

                     <div class="item">
                        <div class="title">Meta Keywords</div>
                        <div class="meta">
                           <input name="keyword" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['edit']->value['keyword'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" data-role="tagsinput" class="InputText">
                        </div>
                     </div>

                     <div class="item">
                        <div class="title">Meta Descriptions</div>
                        <div class="meta">
                           <textarea name="des" class="InputTextarea" id="inputDesc"></textarea>
                           <span id="showNumDesc" style="color:#ed1b24;">0</span>
                        </div>
                     </div>

                  </div>
                  <div class="right100">
                     <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['categories']->value) > 0) {?>
                     <div class="item">
                        <div class="title">Danh mục</div>
                        <div class="selectlist">
                           <ul class="category-tree">
                              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'node');
$_smarty_tpl->tpl_vars['node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->do_else = false;
?>
                              <?php $_smarty_tpl->_subTemplateRender("file:categories/category_tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['node']->value,'selected'=>(($tmp = $_smarty_tpl->tpl_vars['categoryRelatedIds']->value ?? null)===null||$tmp==='' ? array() ?? null : $tmp),'level'=>0), 0, true);
?>
                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                           </ul>
                        </div>
                     </div>
                     <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['hinhdanhmuc'] == 1) {?>
                     <div class="item">
                        <div class="title">Hình ảnh</div>

                        <div class="info-title">
                           <?php if ($_smarty_tpl->tpl_vars['articlelist']->value['img_thumb_vn'] != '') {?>
                           <!-- Ảnh cũ -->
                           <img id="current-img" src="../<?php echo $_smarty_tpl->tpl_vars['edit']->value['img_vn'];?>
" height="60" style="display:block; margin-bottom:8px;">
                           <?php }?>

                           <label for="img_vn" class="custom-upload">
                              <i class="fa fa-upload"></i> Upload image
                           </label>
                           <!-- Input chọn ảnh -->
                           <input type="file"
                              accept="image/png,image/gif,image/jpeg,image/jpg"
                              name="img_vn"
                              id="img_vn" class="img-thumb-input">

                           <!-- Preview ảnh mới -->
                           <p class="previewimg" style="margin-top:8px;">
                              <img id="preview-img" style="max-height:150px; display:none;">
                           </p>
                        </div>
                     </div>
                     <?php }?>
                     <div class="item">
                        <div class="title">
                           Show <input type="checkbox" class="CheckBox" name="active" value="active"
                              <?php if ($_smarty_tpl->tpl_vars['edit']->value['active'] == 1 || $_REQUEST['act'] == 'add') {?>checked<?php }?> />
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </form>
      </div>
   </div>
</div><?php }
}
