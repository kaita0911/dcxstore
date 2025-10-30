<?php
/* Smarty version 4.3.1, created on 2025-10-30 11:21:00
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\articlelist\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69033c0cb93307_41679096',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1072ceb26476162e9060f2738db42119ebf2637a' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\articlelist\\list.tpl',
      1 => 1761749942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69033c0cb93307_41679096 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <div class="right_content">
                  <div class="divright">
            <div class="acti2">
               <button class="add" type="button" id="btnAddnew" data-comp="0">
                  <i class="fa fa-plus-circle"></i> Thêm mới
               </button>
            </div>
            <div class="acti2">
               <button class="add" type="button" id="btnDelete" data-comp="<?php echo $_REQUEST['comp'];?>
">
                  <i class="fa fa-trash"></i> Xóa
               </button>
            </div>
            <!-- <div class="acti2">
               <button class="add" type="button" id="saveOrderBtn" data-comp="<?php echo (($tmp = $_REQUEST['comp'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
                  <i class="fa fa-first-order"></i> Sắp xếp
               </button>
            </div> -->
            <div class="acti2">
               <button class="add" type="button" id="btnRefresh" data-comp="<?php echo $_REQUEST['comp'];?>
">
                  <i class="fa fa-copy"></i> Copy
               </button>
            </div>
         </div>
         <div class="main-content">
            <form class="form-all" method="post" action="">
               <table class="br1">
                  <thead>
                     <tr>
                        <th align="center" class="width-del">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th align="center" class="width-order">Thứ tự</th>
                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['hinhanh'] == 1) {?>
                        <th align="center" class="width-image">Hình ảnh</th>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['masp'] == 1000) {?>
                        <th align="center" class="width-image">Mã Sp</th>
                        <?php }?>

                        <th align="left" class="width-ttl">Tiêu đề</th>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['price'] == 1) {?>
                        <th align="center" class="width-image">Giá</th>
                        <?php }?>

                        <th align="center" class="width-image">Ngày tạo</th>
                        <th align="center" class="width-image">Ngày sửa</th>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['new'] == 1) {?>
                        <th align="center" class="width-show">Mới</th>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['hot'] == 1) {?>
                        <th align="center" class="width-show">Bán chạy</th>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['mostview'] == 1) {?>
                        <th align="center" class="width-show">Xem nhiều</th>
                        <?php }?>

                        <th align="center" class="width-show">Show</th>

                        <th align="center" class="width-action">Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articlelist']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                     <tr data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <td align="center">
                           <input type="checkbox" class="c-item" name="cid[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        </td>
                        <td align="center">
                           <input type="text" class="numInput" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['num'];?>
" />
                        </td>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['hinhanh'] == 1) {?>
                        <td align="center">
                           <?php if ($_smarty_tpl->tpl_vars['item']->value['img_thumb_vn'] != '') {?>
                           <div class="c-img">
                              <img src="../<?php echo $_smarty_tpl->tpl_vars['item']->value['img_thumb_vn'];?>
" />
                           </div>
                           <?php }?>
                        </td>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['masp'] == 1000) {?>
                        <td align="left">
                           <?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>

                        </td>
                        <?php }?>

                        <td align="left">
                           <span class="c-name editable-name" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                              <span class="view-text"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value['details']['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                              <input type="text" class="edit-input form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value['details']['name'], ENT_QUOTES, 'UTF-8', true);?>
" style="display:none;">
                           </span>
                        </td>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['price'] == 1) {?>

                        <td align="center">
                           <span class="editable-price"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                              contenteditable="true">
                              <?php echo $_smarty_tpl->tpl_vars['item']->value['price']['price'];?>
₫
                           </span>
                        </td>
                        <?php }?>

                        <td align="center">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['dated'],"%d/%m/%Y %H:%M");?>

                        </td>

                        <td align="center">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['dated_edit'],"%d/%m/%Y %H:%M");?>

                        </td>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['new'] == 1) {?>
                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                              data-active="<?php echo $_smarty_tpl->tpl_vars['item']->value['new'];?>
"
                              data-column="new"
                              data-table="articlelist">
                              <img src="images/<?php echo $_smarty_tpl->tpl_vars['item']->value['new'];?>
.png" alt="Trạng thái Mới" />
                           </button>
                        </td>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['hot'] == 1) {?>
                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                              data-active="<?php echo $_smarty_tpl->tpl_vars['item']->value['hot'];?>
"
                              data-column="hot"
                              data-table="articlelist">
                              <img src="images/<?php echo $_smarty_tpl->tpl_vars['item']->value['hot'];?>
.png" alt="Trạng thái Hot" />
                           </button>
                        </td>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['tinhnang']->value['mostview'] == 1) {?>
                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                              data-active="<?php echo $_smarty_tpl->tpl_vars['item']->value['mostview'];?>
"
                              data-column="mostview"
                              data-table="articlelist">
                              <img src="images/<?php echo $_smarty_tpl->tpl_vars['item']->value['mostview'];?>
.png" alt="Trạng thái Xem nhiều" />
                           </button>
                        </td>
                        <?php }?>

                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                              data-active="<?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
"
                              data-column="active"
                              data-table="articlelist">
                              <img src="images/<?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
.png" alt="Hiển thị / Ẩn" />
                           </button>
                        </td>


                        <td align="center">
                           <div class="flex-btn extra-tabs">
                              <?php if ($_REQUEST['comp'] == 3 || $_REQUEST['comp'] == 2 || $_REQUEST['comp'] == 1 || $_REQUEST['comp'] == 25) {?>
                              <a class="act-btn btnView" href="<?php echo $_smarty_tpl->tpl_vars['web_base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['details']['unique_key'];?>
.html"
                                 target="_blank"
                                 title="Xem nhanh">
                                 <i class="fa fa-eye"></i>
                              </a>
                              <?php }?>
                              <a title="Chỉnh sửa" class="act-btn btnEdit" href="index.php?do=articlelist&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&comp=<?php echo $_REQUEST['comp'];?>
">
                                 <i class="fa fa-edit"></i>
                              </a>
                              <button title="Làm mới" type="button" class="act-btn btnUpdateNum" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" data-comp=" <?php echo $_REQUEST['comp'];?>
">
                                 <i class="fa fa-refresh"></i>
                              </button>
                              <button title="Xoá" type="button" class="act-btn btnDeleteRow" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" data-comp="<?php echo $_REQUEST['comp'];?>
"> <i class="fa fa-trash"></i> </button>
                           </div>
                        </td>
                     </tr>
                     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </tbody>
               </table>
            </form>
            <div class="pagination-wrapper">
               <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

            </div>

         </div>
      </div>
   </div>
</div><?php }
}
