<?php
/* Smarty version 4.3.1, created on 2025-10-31 11:23:58
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\component\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69048e3eaeb2d6_69702675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fba17d05d8877b38b36cfe6022af6c1be889a97' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\component\\edit.tpl',
      1 => 1761886866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69048e3eaeb2d6_69702675 (Smarty_Internal_Template $_smarty_tpl) {
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
                  <!-- Tiêu đề & URL -->
                  <div class="item">
                     <div class="title">Tiêu đề</div>
                     <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['name'];?>
"
                        name="name" class="InputText"
                        id="title" />
                  </div>
                  <div class="item">
                     <div class="title">TYPE</div>
                     <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['do'];?>
" name="do" class="InputText" />
                  </div>
                  <div class="item">
                     <div class="title">Phân trang</div>
                     <input type="num" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['phantrang'];?>
" name="phantrang" class="InputText" />
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
                  <?php $_smarty_tpl->_assignInScope('attrs', array(array('name'=>'hinhanh','label'=>'Hình ảnh'),array('name'=>'short','label'=>'Mô tả vắn tắt'),array('name'=>'des','label'=>'Mô tả chi tiết'),array('name'=>'metatag','label'=>'Meta tag'),array('name'=>'nhieuhinh','label'=>'Nhiều hình'),array('name'=>'masp','label'=>'Mã sản phẩm'),array('name'=>'price','label'=>'Có giá'),array('name'=>'priceold','label'=>'Giá cũ'),array('name'=>'mausac','label'=>'Màu sắc'),array('name'=>'kichthuoc','label'=>'Kích thước'),array('name'=>'voucher','label'=>'Mã voucher'),array('name'=>'phiship','label'=>'Phí ship'),array('name'=>'new','label'=>'Mới'),array('name'=>'hot','label'=>'Nổi bật'),array('name'=>'mostview','label'=>'Xem nhiều'),array('name'=>'viewed','label'=>'Đã xem'),array('name'=>'active','label'=>'Show'),array('name'=>'link_out','label'=>'Link ngoài')));?>
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
               <!-- ================== THUỘC TÍNH DANH MỤC ================== -->
               <fieldset>
                  <legend>Thuộc tính DANH MỤC</legend>

                  <?php $_smarty_tpl->_assignInScope('attrs', array(array('name'=>'nhomcon','label'=>'Danh mục'),array('name'=>'hinhdanhmuc','label'=>'Hình danh mục'),array('name'=>'motadanhmuc','label'=>'Mô tả danh mục'),array('name'=>'brand','label'=>'Thương hiệu')));?>
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
