<?php
/* Smarty version 4.3.1, created on 2025-10-31 02:54:47
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\component\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690416e7092229_76826069',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fba17d05d8877b38b36cfe6022af6c1be889a97' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\component\\edit.tpl',
      1 => 1761793658,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_690416e7092229_76826069 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <div class="right_content">
         <form name="allsubmit" id="frmEdit"
            action="index.php?do=component&act=<?php if ($_REQUEST['act'] == 'add') {?>addsm<?php } else { ?>editsm<?php }?>&id=<?php echo $_REQUEST['id'];?>
"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['id'];?>
" />
            <div class="divright">
               <div class="acti2">
                  <button class="add" type="submit"><i class="fa fa-save"></i> Save</button>
               </div>
            </div>
            <div class="main-content">
               <!-- ================== THÔNG TIN CƠ BẢN ================== -->
               <fieldset>
                  <legend>Thông tin cơ bản</legend>
                  <div class="box-feature">
                  </div>
                  <?php if ($_smarty_tpl->tpl_vars['edit']->value['motamodule'] == 1) {?>
                  <?php if ($_smarty_tpl->tpl_vars['countlang']->value > 1) {?>
                  <ul class="nav nav-tabs">
                     <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['languages']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                     <li class="<?php if ($_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'] == 1) {?>active<?php }?>">
                        <a href="#tab_<?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</a>
                     </li>
                     <?php
}
}
?>
                  </ul>
                  <?php }?>

                  <div class="tab-content">
                     <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['edit_name']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                     <div class="tab-pane <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1 == 1) {?>active<?php }?>" id="tab_<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
">
                        <div class="item">
                           <div class="title">Mô tả</div>
                           <div class="meta">
                              <textarea id="editor<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
"
                                 name="content_<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
"><?php echo $_smarty_tpl->tpl_vars['edit_name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['content'];?>
</textarea>
                           </div>
                        </div>
                     </div>
                     <?php
}
}
?>
                  </div>
                  <?php }?>

                  <div class="item">
                     <div class="title">Hình ảnh</div>
                     <div class="info-title">
                        <?php if ($_smarty_tpl->tpl_vars['edit']->value['img_vn'] != '') {?>
                        <img height="50" src="../<?php echo $_smarty_tpl->tpl_vars['edit']->value['img_vn'];?>
" /><br />
                        <?php }?>
                        <input type="file" accept="image/*" name="img_vn" id="img_vn" onchange="loadFile(event)">
                        <p class="previewimg"><img id="output" /></p>
                        <?php echo '<script'; ?>
>
                           var loadFile = function(event) {
                              document.getElementById('output').src = URL.createObjectURL(event.target.files[0]);
                           };
                        <?php echo '</script'; ?>
>
                     </div>
                  </div>

                  <!-- Tiêu đề & URL -->
                  <?php if ($_smarty_tpl->tpl_vars['checklang']->value > 0) {?>
                  <?php
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['edit_name']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total !== 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                  <div class="item">
                     <div class="title">Tiêu đề <?php echo $_smarty_tpl->tpl_vars['edit_name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['code'];?>
</div>
                     <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['edit_name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
"
                        name="name_<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
" class="InputText"
                        id="title_<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
" onkeyup="ChangeToSlug<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
();" />
                  </div>
                  <div class="item">
                     <div class="title">URL <?php echo $_smarty_tpl->tpl_vars['edit_name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['code'];?>
</div>
                     <input type="text" id="slug<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
"
                        value="<?php echo $_smarty_tpl->tpl_vars['edit_name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['unique_key'];?>
"
                        name="unique_key_<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
" class="InputText" />
                  </div>
                  <?php
}
}
?>
                  <?php } else { ?>
                  <?php
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['languages']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total !== 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                  <div class="item">
                     <div class="title">Tiêu đề <?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['code'];?>
</div>
                     <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['name'];?>
"
                        name="name_<?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" class="InputText"
                        id="title_<?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" onkeyup="ChangeToSlug<?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
();" />
                  </div>
                  <div class="item">
                     <div class="title">URL <?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['code'];?>
</div>
                     <input type="text" id="slug<?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
"
                        value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['unique_key'];?>
"
                        name="unique_key_<?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
" class="InputText" />
                  </div>
                  <?php
}
}
?>
                  <?php }?>
                  <div class="item">
                     <div class="title">TYPE</div>
                     <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['do'];?>
" name="do" class="InputText" />
                  </div>
                  <div class="item">
                     <div class="title">Icon font</div>
                     <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['iconfont'];?>
" name="iconfont" class="InputText" />
                  </div>
                  <div class="item">
                     <div class="title">Thứ tự</div>
                     <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['num'];?>
" name="num" class="InputNum num-order" />
                  </div>

               </fieldset>

               <!-- ================== THUỘC TÍNH RIÊNG ================== -->
               <fieldset>
                  <legend>Thuộc tính riêng</legend>
                  <?php $_smarty_tpl->_assignInScope('attrs', array(array('name'=>'nhomcon','label'=>'Nhóm con'),array('name'=>'brand','label'=>'Thương hiệu'),array('name'=>'hinhanh','label'=>'Hình ảnh'),array('name'=>'short','label'=>'Mô tả vắn tắt'),array('name'=>'des','label'=>'Mô tả chi tiết'),array('name'=>'metatag','label'=>'Meta tag'),array('name'=>'nhieuhinh','label'=>'Nhiều hình'),array('name'=>'masp','label'=>'Mã sản phẩm'),array('name'=>'price','label'=>'Có giá'),array('name'=>'priceold','label'=>'Giá cũ'),array('name'=>'mausac','label'=>'Màu sắc'),array('name'=>'kichthuoc','label'=>'Kích thước'),array('name'=>'voucher','label'=>'Mã voucher'),array('name'=>'phiship','label'=>'Phí ship'),array('name'=>'new','label'=>'Mới'),array('name'=>'hot','label'=>'Nổi bật'),array('name'=>'mostview','label'=>'Xem nhiều'),array('name'=>'viewed','label'=>'Đã xem'),array('name'=>'active','label'=>'Show'),array('name'=>'link_out','label'=>'Link ngoài')));?>
                  <div class="box-feature">
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['attrs']->value, 'attr');
$_smarty_tpl->tpl_vars['attr']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['attr']->value) {
$_smarty_tpl->tpl_vars['attr']->do_else = false;
?>
                     <?php $_smarty_tpl->_assignInScope('checked', false);?>
                     <?php if ($_smarty_tpl->tpl_vars['attr']->value['name'] == 'active') {?>
                     <?php if ($_smarty_tpl->tpl_vars['edit']->value['active'] == 1 || $_REQUEST['act'] == 'add') {
$_smarty_tpl->_assignInScope('checked', true);
}?>
                     <?php } else { ?>
                     <?php if ($_smarty_tpl->tpl_vars['edit']->value[$_smarty_tpl->tpl_vars['attr']->value['name']] == 1) {
$_smarty_tpl->_assignInScope('checked', true);
}?>
                     <?php }?>
                     <div class="item">
                        <div class="title">
                           <?php echo $_smarty_tpl->tpl_vars['attr']->value['label'];?>

                           <input type="checkbox" class="CheckBox" name="<?php echo $_smarty_tpl->tpl_vars['attr']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['attr']->value['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['checked']->value) {?>checked<?php }?> />
                        </div>
                     </div>
                     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </div>

               </fieldset>

               <!-- ================== THUỘC TÍNH CHUNG MODULE ================== -->
               <fieldset>
                  <legend>Thuộc tính chung module</legend>
                  <div class="box-feature">
                     <div class="item">
                        <div class="title"> Hình ảnh
                           <input type="checkbox" class="CheckBox" name="hinhmodule" value="hinhmodule" <?php if ($_smarty_tpl->tpl_vars['edit']->value['hinhmodule'] == 1) {?>checked<?php }?> />

                        </div>
                     </div>
                     <div class="item">
                        <div class="title"> Mô tả chung
                           <input type="checkbox" class="CheckBox" name="motamodule" value="motamodule" <?php if ($_smarty_tpl->tpl_vars['edit']->value['motamodule'] == 1 || $_REQUEST['act'] == 'add') {?>checked<?php }?> />

                        </div>
                     </div>
                  </div>
               </fieldset>
            </div>
         </form>
      </div>
   </div>
</div><?php }
}
