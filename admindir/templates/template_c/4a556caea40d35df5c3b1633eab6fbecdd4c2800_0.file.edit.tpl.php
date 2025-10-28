<?php
/* Smarty version 4.3.1, created on 2025-10-28 08:24:38
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\articlelist\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69006fb65f5110_93063531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a556caea40d35df5c3b1633eab6fbecdd4c2800' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\articlelist\\edit.tpl',
      1 => 1761617864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
    'file:articlelist/category_tree.tpl' => 1,
  ),
),false)) {
function content_69006fb65f5110_93063531 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

    <div class="right_content">
      <form id="ArticleForm" name="allsubmit"
        action="index.php?do=articlelist&act=<?php if ($_REQUEST['act'] == 'add') {?>addsm<?php } else { ?>editsm<?php }?>&comp=<?php echo $_REQUEST['comp'];
echo $_smarty_tpl->tpl_vars['page_para']->value;?>
"
        method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $_smarty_tpl->tpl_vars['articlelist']->value['id'];?>
" />
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
                    value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['articlelistDetail']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"
                    class="InputText title-input" />
                </div>
              </div>
              <div class="item">
                <div class="title">URL</div>
                <div class="info-title">
                  <input type="text" id="slug" name="unique_key" value="<?php echo $_smarty_tpl->tpl_vars['articlelistDetail']->value['unique_key'];?>
" class="InputText slug-input" />
                </div>
              </div>
              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['short'] == 1) {?>
              <div class="item">
                <div class="title">Mô tả ngắn</div>
                <div class="meta">
                  <textarea id="short" name="short"><?php echo $_smarty_tpl->tpl_vars['articlelistDetail']->value['short'];?>
</textarea>
                </div>
              </div>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['des'] == 1) {?>
              <div class="item">
                <div class="title">Mô tả chi tiết</div>
                <div class="meta">
                  <textarea id="editor" name="content"><?php echo $_smarty_tpl->tpl_vars['articlelistDetail']->value['content'];?>
</textarea>
                </div>
              </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['metatag'] == 1) {?>
              <div class="item">
                <div class="title">Meta Keywords</div>
                <div class="meta">
                  <input name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['articlelistDetail']->value['keyword'];?>
" data-role="tagsinput" class="InputText" />
                </div>
              </div>
              <div class="item">
                <div class="title">Meta Descriptions</div>
                <div class="meta">
                  <textarea name="des" class="InputTextarea" id="inputDesc"><?php echo $_smarty_tpl->tpl_vars['articlelistDetail']->value['des'];?>
</textarea>
                  <span id="showNumDesc" style="color:#ed1b24;">0</span>
                </div>
              </div>
              <?php }?>
            </div>



            <div class="right100">
              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['masp'] == 1) {?>
              <div class="item">
                <div class="title">Mã sản phẩm</div>
                <div class="info-title">
                  <input type="text" name="code" id="code" class="InputText" value="<?php echo $_smarty_tpl->tpl_vars['articlelist']->value['code'];?>
" />
                </div>
              </div>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['link_out'] == 1) {?>
              <div class="item">
                <div class="title">Link</div>
                <div class="info-title">
                  <input type="text" name="link_out" id="link_out" class="InputText" value="<?php echo $_smarty_tpl->tpl_vars['articlelist']->value['link_out'];?>
" />
                </div>
              </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['hinhanh'] == 1) {?>
              <div class="item">
                <div class="title">Hình ảnh</div>
                <div class="info-title">
                  <?php if ($_smarty_tpl->tpl_vars['articlelist']->value['img_thumb_vn'] != '') {?>
                  <!-- Ảnh cũ -->
                  <img id="current-img" src="../<?php echo $_smarty_tpl->tpl_vars['articlelist']->value['img_thumb_vn'];?>
" height="60" style="display:block; margin-bottom:8px;">
                  <?php }?>

                  <label for="img_thumb_vn" class="custom-upload">
                    <i class="fa fa-upload"></i> Upload image
                  </label>
                  <!-- Input chọn ảnh -->
                  <input type="file"
                    accept="image/png,image/gif,image/jpeg,image/jpg"
                    name="img_thumb_vn"
                    id="img_thumb_vn">

                  <!-- Preview ảnh mới -->
                  <p class="previewimg" style="margin-top:8px;">
                    <img id="preview-img" style="max-height:150px; display:none;">
                  </p>
                </div>
              </div>
              <?php }?>

              <div class="item">
                <div class="title">Upload multi images</div>
                <div class="gallery-upload">
                  <label for="multiimages" class="custom-upload">
                    <i class="fa fa-upload"></i> Upload multi images
                  </label>
                  <input type="file" name="multiimages[]" id="multiimages" accept="image/png, image/jpeg, image/jpg, image/gif" multiple>
                  <div class="preview-gallery">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['multiimages']->value, 'img');
$_smarty_tpl->tpl_vars['img']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->do_else = false;
?>
                    <div class="gallery-item" data-id="<?php echo $_smarty_tpl->tpl_vars['img']->value['id'];?>
" data-num="<?php echo $_smarty_tpl->tpl_vars['img']->value['num'];?>
">
                      <img src="../<?php echo $_smarty_tpl->tpl_vars['img']->value['img_vn'];?>
" />
                      <div class="overlay">
                        <button type="button" class="remove-image" data-id="<?php echo $_smarty_tpl->tpl_vars['img']->value['id'];?>
">&times;</button>
                      </div>
                      <input type="hidden" name="id_old[]" value="<?php echo $_smarty_tpl->tpl_vars['img']->value['id'];?>
">
                      <input type="hidden" name="num_old[]" value="<?php echo $_smarty_tpl->tpl_vars['img']->value['num'];?>
">
                    </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </div>
                </div>
              </div>


              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['price'] == 1) {?>
              <div class="item">
                <div class="title">Giá</div>
                <input type="text" name="price" class="InputPrice" value="<?php echo $_smarty_tpl->tpl_vars['articlelistPrice']->value['price'];?>
" />
              </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['priceold'] == 1) {?>
              <div class="item">
                <div class="title">Giá cũ</div>
                <input type="text" name="priceold" class="InputPrice" value="<?php echo $_smarty_tpl->tpl_vars['articlelistPrice']->value['priceold'];?>
" />
              </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['nhomcon'] == 1 && $_smarty_tpl->tpl_vars['checkcatdm']->value > 0) {?>
              <div class="item">
                <div class="title">Danh mục sản phẩm</div>
                <div class="selectlist extra-tabs">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
                  <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['lang']->value['id'] == 1) {?>active<?php }?>" data-tab="tab">
                    <ul class="category-tree">
                      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'node');
$_smarty_tpl->tpl_vars['node']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->do_else = false;
?>
                      <?php $_smarty_tpl->_subTemplateRender("file:articlelist/category_tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['node']->value,'selected'=>(($tmp = $_smarty_tpl->tpl_vars['selected']->value ?? null)===null||$tmp==='' ? array() ?? null : $tmp),'level'=>0), 0, true);
?>
                      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                  </div>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
              </div>
              <?php }?>

              <div class="item">
                <div class="title">
                  <span>Thứ tự</span>
                  <input type="text" name="num" class="InputNum" value="<?php echo $_smarty_tpl->tpl_vars['articlelist']->value['num'];?>
" />
                </div>
              </div>
              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['new'] == 1) {?>
              <div class="item">
                <div class="title">
                  Mới <input type="checkbox" class="CheckBox" name="new" value="new" <?php if ($_smarty_tpl->tpl_vars['articlelist']->value['new'] == 1) {?>checked<?php }?> />
                </div>
              </div>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['hot'] == 1) {?>
              <div class="item">
                <div class="title">
                  Nổi bật <input type="checkbox" class="CheckBox" name="hot" value="hot" <?php if ($_smarty_tpl->tpl_vars['articlelist']->value['hot'] == 1) {?>checked<?php }?> />
                </div>
              </div>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['mostview'] == 1) {?>
              <div class="item">
                <div class="title">
                  Xem nhiều<input type="checkbox" class="CheckBox" name="mostview" value="mostview" <?php if ($_smarty_tpl->tpl_vars['articlelist']->value['mostview'] == 1) {?>checked<?php }?> />
                </div>
              </div>
              <?php }?>
              <div class="item">
                <div class="title">
                  Hiển thị <input type="checkbox" class="CheckBox" name="active" value="acive" <?php if ($_smarty_tpl->tpl_vars['articlelist']->value['active'] == 1) {?>checked<?php }?> />
                </div>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- 
<?php echo '<script'; ?>
 src="js/autoNumeric.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  function loadFile(event) {
    document.getElementById('output').src = URL.createObjectURL(event.target.files[0]);
  }
  $('.autoNumeric').autoNumeric('init', {
    aSep: '.',
    aDec: 'none'
  });
  const checkbox = document.getElementById('togglePrice');
  const target = document.getElementById('box-size-more');
  if (checkbox) {
    target.style.display = checkbox.checked ? 'block' : 'none';
    checkbox.addEventListener('change', () => {
      target.style.display = checkbox.checked ? 'block' : 'none';
    });
  }
<?php echo '</script'; ?>
> --><?php }
}
