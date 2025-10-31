<?php
/* Smarty version 4.3.1, created on 2025-10-31 09:04:18
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\properties\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69046d828230e9_85994136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eac51908c761f595e981e7c40c00de5278325596' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\properties\\list.tpl',
      1 => 1760758512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69046d828230e9_85994136 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <div class="right_content">
         <!-- Top action buttons -->
         <div class="divright">
            <div class="acti2">
               <a class="add" href="index.php?do=properties&act=add">
                  <i class="fa fa-plus-circle"></i> Thêm mới
               </a>
            </div>
            <div class="acti2">
               <button class="add" type="button" id="btnDelete" data-comp="0">
                  <i class="fa fa-trash"></i> Xóa
               </button>
            </div>
         </div>
         <div class="main-content">
            <div class="tbtitle2">
               <form name="f" id="f" method="post" action="index.php?do=properties&act=dellist&cid=1">
                  <table class="br1">
                     <thead>
                        <tr>
                           <th align="center" class="width-del">
                              <input type="checkbox" id="checkAll" />
                           </th>
                           <th align="center" class="width-order">Thứ tự</th>
                           <th align="left" class="width-ttl">Tiêu đề</th>
                           <th align="center" class="width-show">Show</th>
                           <th align="center" class="width-action">Action</th>
                        </tr>
                     </thead>

                     <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'item', false, 'index');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                           <td align="center">
                              <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="cid[]" class="c-item">
                           </td>
                           <td align="center">
                              <input type="text" name="ordering[]" class="InputOrder" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['num'];?>
" size="2" />
                              <input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
                           </td>
                           <td align="left" class="linkblack"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value['name_vn'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                           <td align="center">
                              <button type="button"
                                 class="btn_checks btn_toggle"
                                 data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                 data-active="<?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
"
                                 data-column="active"
                                 data-table="banner">
                                 <img src="images/<?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
.png" alt="Show/Hide">
                              </button>
                           </td>
                           <td align="center">
                              <div class="flex-btn">
                                 <a class="act-btn btnEdit" href="index.php?do=properties&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Edit">
                                    <i class="fa fa-edit"></i>
                                 </a>
                              </div>
                           </td>
                        </tr>
                        <?php
}
if ($_smarty_tpl->tpl_vars['item']->do_else) {
?>
                        <tr>
                           <td colspan="5" align="center"><em>Không có dữ liệu</em></td>
                        </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                     </tbody>
                  </table>
               </form>
            </div>
         </div>
         <!-- Table listing -->
      </div>
   </div>
</div><?php }
}
