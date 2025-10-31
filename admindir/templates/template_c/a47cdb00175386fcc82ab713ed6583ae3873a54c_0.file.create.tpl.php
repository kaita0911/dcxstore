<?php
/* Smarty version 4.3.1, created on 2025-10-31 06:08:31
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\articlelist\create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6904444f5fe761_99174608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a47cdb00175386fcc82ab713ed6583ae3873a54c' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\articlelist\\create.tpl',
      1 => 1761881426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
    'file:articlelist/category_tree.tpl' => 1,
  ),
),false)) {
function content_6904444f5fe761_99174608 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <div class="right_content">
         <form name="allsubmit" id="ArticleForm"
            action="index.php?do=articlelist&act=<?php if ($_REQUEST['act'] == 'add') {?>addsm<?php } else { ?>editsm<?php }?>&comp=<?php echo $_REQUEST['comp'];?>
"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['edit']->value['id'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
" />
            <div class="divright">
               <div class="acti2">
                  <button class="add" type="submit"><i class="fa fa-save"></i> Save</button>
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
                           <input type="text" id="title" name="name"
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


                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['short'] == 1) {?>
                     <div class="item">
                        <div class="title">Mô tả ngắn</div>
                        <textarea name="short" id="short"></textarea>
                     </div>
                     <?php }?>

                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['des'] == 1) {?>
                     <div class="item">
                        <div class="title">Mô tả chi tiết</div>
                        <textarea name="content" id="editor"></textarea>
                     </div>
                     <?php }?>

                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['metatag'] == 1) {?>
                     <div class="item">
                        <div class="title">Meta Keywords</div>
                        <input type="text" name="keyword" data-role="tagsinput" class="InputText">
                     </div>
                     <div class="item">
                        <div class="title">Meta Descriptions</div>
                        <textarea name="des" class="InputTextarea" id="inputDesc"></textarea>
                        <span id="showNumDesc" style="color:#ed1b24;">0</span>
                     </div>
                     <?php }?>


                  </div>
                  <div class="right100">
                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['masp'] == 1) {?>
                     <div class="item">
                        <div class="title">Mã sản phẩm</div>
                        <input type="text" name="code" class="InputText">
                     </div>
                     <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['link_out'] == 1) {?>
                     <div class="item">
                        <div class="title">Link</div>
                        <input type="text" name="link_out" class="InputText">
                     </div>
                     <?php }?>

                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['hinhanh'] == 1) {?>
                     <div class="item">
                        <div class="title">Hình ảnh</div>
                        <div class="info-title">
                           <?php if ($_smarty_tpl->tpl_vars['edit']->value['img_thumb_vn'] != '') {?>
                           <!-- Ảnh cũ -->
                           <img id="current-img" src="../<?php echo $_smarty_tpl->tpl_vars['edit']->value['img_thumb_vn'];?>
" height="60" style="display:block; margin-bottom:8px;">
                           <?php }?>

                           <label for="img_thumb_vn" class="custom-upload">
                              <i class="fa fa-upload"></i> Upload image
                           </label>
                           <!-- Input chọn ảnh -->
                           <input type="file"
                              accept="image/png,image/gif,image/jpeg,image/jpg"
                              name="img_thumb_vn"
                              id="img_thumb_vn" class="img-thumb-input">

                           <!-- Preview ảnh mới -->
                           <p class="previewimg" style="margin-top:8px;">
                              <img id="preview-img" style="max-height:150px; display:none;">
                           </p>
                        </div>
                     </div>
                     <?php }?>

                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['nhieuhinh'] == 1) {?>
                     <div class="item">
                        <div class="title">Upload multi images</div>
                        <label for="multiimages" class="custom-upload">
                           <i class="fa fa-upload"></i> Upload multi images
                        </label>
                        <input type="file" id="multiimages" name="multiimages[]" multiple accept="image/*">
                        <div class="preview-gallery"></div>

                     </div>
                     <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['price'] == 1) {?>
                     <div class="item">
                        <div class="title">Giá</div>
                        <input type="text" name="price" class="InputPrice" />
                     </div>
                     <?php }?>

                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['priceold'] == 1) {?>
                     <div class="item">
                        <div class="title">Giá cũ</div>
                        <input type="text" name="priceold" class="InputPrice" />
                     </div>
                     <?php }?>

                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['nhomcon'] == 1) {?>
                     <div class="item">
                        <div class="title">Danh mục sản phẩm</div>
                        <div class="selectlist">
                           <ul class="category-tree">
                              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'node');
$_smarty_tpl->tpl_vars['node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->do_else = false;
?>
                              <?php $_smarty_tpl->_subTemplateRender("file:articlelist/category_tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['node']->value,'selected'=>(($tmp = $_smarty_tpl->tpl_vars['categoryRelatedIds']->value ?? null)===null||$tmp==='' ? array() ?? null : $tmp),'level'=>0), 0, true);
?>
                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                           </ul>
                        </div>
                     </div>
                     <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['brand'] == 1) {?>
                     <div class="item">
                        <div class="title">Thương hiệu</div>
                        <div class="selectlist">
                           <ul class="category-tree">
                              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['brands']->value, 'node');
$_smarty_tpl->tpl_vars['node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->do_else = false;
?>
                              <label> <input type="radio" name="brand_id" value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id'];?>
"
                                    <?php if ($_smarty_tpl->tpl_vars['node']->value['id'] == $_smarty_tpl->tpl_vars['selectedBrandId']->value) {?>checked<?php }?>>
                                 <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['node']->value['detail_name'], ENT_QUOTES, 'UTF-8', true);?>
</label>
                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                           </ul>
                        </div>
                     </div>
                     <?php }?>

                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['new'] == 1) {?>
                     <div class="item">
                        <div class="title">
                           Mới <input type="checkbox" class="CheckBox" name="new" />
                        </div>
                     </div>
                     <?php }?>

                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['hot'] == 1) {?>
                     <div class="item">
                        <div class="title">
                           Nổi bật <input type="checkbox" class="CheckBox" name="hot" />
                        </div>
                     </div>
                     <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['mostview'] == 1) {?>
                     <div class="item">
                        <div class="title">
                           Xem nhiều <input type="checkbox" class="CheckBox" name="mostview" />
                        </div>
                     </div>
                     <?php }?>
                     <div class="item">
                        <div class="title">Show</div>
                        <input type="checkbox" name="active" value="active" <?php if ($_smarty_tpl->tpl_vars['edit']->value['active'] == 1 || $_REQUEST['act'] == 'add') {?>checked<?php }?>>
                     </div>
                  </div>
               </div>

            </div>
         </form>
      </div>
   </div>
</div><?php }
}
