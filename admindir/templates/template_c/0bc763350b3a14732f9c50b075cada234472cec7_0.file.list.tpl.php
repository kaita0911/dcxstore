<?php
/* Smarty version 4.3.1, created on 2025-10-29 16:57:52
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\footer\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69023980a09352_97363829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0bc763350b3a14732f9c50b075cada234472cec7' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\footer\\list.tpl',
      1 => 1761753271,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69023980a09352_97363829 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <div class="right_content">
         <div class="divright">
            <div class="acti2">
               <a class="add" href="index.php?do=footer&act=add">
                  <i class="fa fa-plus-circle"></i> Thêm mới
               </a>
            </div>
         </div>
         <div class="main-content">
            <form class="form-all" method="post" action="">
               <table class="br1">
                  <thead>
                     <tr>
                        <th align="left" class="width-ttl">
                           <strong>Tiêu đề</strong>
                        </th>
                        <th class="width-action" align="center">
                           <strong>Action</strong>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                     <tr data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        <td align="left">
                           <?php echo $_smarty_tpl->tpl_vars['item']->value['details']['name'];?>

                        </td>
                        <td align="center">
                           <div class="flex-btn">
                              <a title="Chỉnh sửa" class="act-btn btnEdit" href="index.php?do=footer&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                 <i class="fa fa-edit"></i>
                              </a>
                              <button title="Xoá" type="button" class="act-btn btnDeleteRow" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
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
         </div>

         <div class="clear"></div>
      </div>
   </div>
</div><?php }
}
