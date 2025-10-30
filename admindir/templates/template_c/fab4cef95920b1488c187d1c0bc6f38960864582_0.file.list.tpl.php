<?php
/* Smarty version 4.3.1, created on 2025-10-29 16:58:03
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\orders\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6902398be90462_54484324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fab4cef95920b1488c187d1c0bc6f38960864582' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\orders\\list.tpl',
      1 => 1761029774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_6902398be90462_54484324 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
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
               <button class="add" type="button" id="btnDelete" data-comp="0">
                  <i class="fa fa-trash"></i> Xóa
               </button>
            </div>
         </div>
         <div class="tbtitle2 main-content">
            <form name="f" id="f" method="post" action="">
               <table class="br1 order">
                  <thead>
                     <tr>
                        <th class="width-del" align="center">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th class="width-image" align="center">Mã đơn</th>
                        <th class="width-ttl">Tiêu đề</th>
                        <th class="width-image" align="center">Ngày đặt</th>
                        <th class="width-action" align="center">Tổng tiền</th>
                        <th class="width-action" align="center">Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'item', false, 'i');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                     <?php $_smarty_tpl->_assignInScope('class', $_smarty_tpl->tpl_vars['i']->value%2 == 0 ? 'bgno' : 'bgf2');?>
                     <tr>
                        <td class="brbottom" align="center">
                           <input class="c-item" type="checkbox" name="cid[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
                        </td>

                        <td class="brbottom" align="center">
                           <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

                        </td>

                        <td class="paleft brbottom">
                           <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                        </td>

                        <td class="brbottom" align="center">
                           <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['created_at'],"%d/%m/%Y");?>

                        </td>

                        <td class="brbottom" align="center">
                           <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['item']->value['totalend'],0,".",",");?>
 đ
                        </td>

                        <td class="brbottom editorder" align="center">
                           <a href="index.php?do=orders&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Chi tiết">
                              Chi tiết
                           </a>
                        </td>
                     </tr>
                     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </tbody>
               </table>
            </form>
         </div>
      </div>
   </div>
</div><?php }
}
