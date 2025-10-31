<?php
/* Smarty version 4.3.1, created on 2025-10-31 02:54:41
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\component\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690416e19d2f27_21788052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fc3e9b72590803d3041de9309b680188274676f' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\component\\list.tpl',
      1 => 1760671050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_690416e19d2f27_21788052 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <!-- Sidebar -->
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <!-- Main content -->
      <div class="right_content">
         <!-- Action buttons -->
         <div class="divright">
            <div class="acti2">
               <a class="add" href="index.php?do=component&act=add">
                  <i class="fa fa-plus-circle"></i> Thêm mới
               </a>
            </div>
         </div>
         <div class="main-content">
            <!-- Component Table -->
            <form name="f" id="f" method="post" action="index.php?do=component&act=dellist">
               <table class="br1" cellspacing="0" cellpadding="0">
                  <thead>
                     <tr>
                        <th align="center" class="width-del"><input type="checkbox" onclick="checkAll();" name="all" /></th>
                        <th align="center" class="width-order">Thứ tự</th>
                        <th class="width-image left">Type</th>
                        <th class="width-ttl">Tiêu đề</th>
                        <th class="width-show">Show</th>
                        <th class="width-action">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                     <tr>
                        <td align="center">
                           <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="iddel[]" />
                        </td>
                        <td align="center">
                           <input type="text" name="ordering[]" class="InputOrder" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['num'];?>
" size="2">
                           <input type="hidden" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" />
                        </td>
                        <td class="paleft"><?php echo $_smarty_tpl->tpl_vars['item']->value['do'];?>
</td>
                        <td class="paleft"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                        <td align="center" class="hidden-xs">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                              data-active="<?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
"
                              data-column="active"
                              data-table="component">
                              <img src="images/<?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
.png" alt="Show/Hide">
                           </button>
                        </td>
                        <td align="center">
                           <div class="flex-btn">
                              <a class="act-btn btnEdit" href="index.php?do=component&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Edit"><i class="fa fa-edit"></i></a>
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

      </div>
   </div>
</div><?php }
}
