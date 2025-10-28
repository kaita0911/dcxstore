<?php
/* Smarty version 4.3.1, created on 2025-10-28 11:06:26
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\orders\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690095a2d32850_35506066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59417f2e786ec4e7048c024dc669104ca05d09c2' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\orders\\edit.tpl',
      1 => 1761032071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_690095a2d32850_35506066 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <div class="right_content">
         <div class="detail_Cart">

            <div class="brtit">
               <h3>Thông tin khách hàng</h3>

               <div class="info-title">
                  <div class="title">
                     <label>Mã đơn :</span> <?php echo $_smarty_tpl->tpl_vars['edit']->value['id'];?>

                  </div>
               </div>

               <div class="info-title">
                  <div class="title">
                     <label>Tên khách hàng :</label> <?php echo $_smarty_tpl->tpl_vars['edit']->value['name'];?>

                  </div>
               </div>

               <div class="info-title">
                  <div class="title">
                     <label>Điện thoại :</label> <?php echo $_smarty_tpl->tpl_vars['edit']->value['phone'];?>

                  </div>
               </div>

               <div class="info-title hide">
                  <div class="title">
                     <label>Email :</label> <?php echo $_smarty_tpl->tpl_vars['edit']->value['email'];?>

                  </div>
               </div>

               <div class="info-title">
                  <div class="title">
                     <label>Địa chỉ nhận hàng:</label> <?php echo $_smarty_tpl->tpl_vars['edit']->value['address'];?>
, <?php echo $_smarty_tpl->tpl_vars['edit']->value['phuongxa'];?>
, <?php echo $_smarty_tpl->tpl_vars['edit']->value['quanhuyen'];?>
, <?php echo $_smarty_tpl->tpl_vars['edit']->value['thanhpho'];?>

                  </div>
               </div>

               <div class="info-title">
                  <div class="title">
                     <label>Phương thức thanh toán :</label> <?php echo $_smarty_tpl->tpl_vars['edit']->value['descs'];?>

                  </div>
               </div>

               <div class="info-title">
                  <div class="title">
                     <label>Ghi chú :</label> <?php echo $_smarty_tpl->tpl_vars['edit']->value['content'];?>

                  </div>
               </div>
            </div>

            <table class="br1 order">
               <thead>
                  <tr>
                     <th width="2%" class="order brbottom"><strong>STT</strong></th>
                     <th width="5%" class="order brbottom brleft hidden-xs"><strong>Hình ảnh</strong></th>
                     <th width="20%" class="titles brbottom brleft"><strong>Tiêu đề</strong></th>
                     <th width="5%" class="brleft brbottom brcenter"><strong>Loại</strong></th>
                     <th width="5%" class="attr brbottom brleft"><strong>Số lượng</strong></th>
                     <th width="10%" class="amount text-right brbottom brleft"><strong>Đơn giá</strong></th>
                     <th width="10%" class="amount text-right brbottom brleft"><strong>Tạm tính</strong></th>
                  </tr>
               </thead>

               <tbody>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_line_view']->value, 'item', false, NULL, 'i', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                  <tr class="item">
                     <td align="center" class="order brbottom">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

                     </td>
                     <td align="center" class="titles paleft brbottom brleft hidden-xs">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['product_image'];?>
" alt="" width="50" height="50" />
                     </td>
                     <td align="left" class="titles paleft brbottom brleft">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>

                     </td>
                     <td align="center" class="brbottom brleft">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['size'];?>

                     </td>
                     <td align="center" class="attr brbottom brleft">
                        <?php echo $_smarty_tpl->tpl_vars['item']->value['qty'];?>

                     </td>
                     <td align="center" class="amount text-right brbottom brleft">
                        <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value['product_price'],0,",",".");?>
 đ
                     </td>
                     <td align="center" class="amount text-right brbottom brleft">
                        <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value['tamtinh'],0,",",".");?>
 đ
                     </td>
                  </tr>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
               </tbody>
            </table>
            <div class="total-end-table">
               <div class="qulty">
                  Số lượng <span><?php echo $_smarty_tpl->tpl_vars['edit']->value['qty'];?>
</span>
               </div>
               <div class="sumqty">
                  Tổng tiền <span><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['edit']->value['totalend'],0,",",".");?>
 đ</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div><?php }
}
