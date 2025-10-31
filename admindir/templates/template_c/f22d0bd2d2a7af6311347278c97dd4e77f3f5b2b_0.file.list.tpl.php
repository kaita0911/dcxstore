<?php
/* Smarty version 4.3.1, created on 2025-10-31 03:31:48
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\language\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69041f9435da68_36677876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f22d0bd2d2a7af6311347278c97dd4e77f3f5b2b' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\language\\list.tpl',
      1 => 1760758391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69041f9435da68_36677876 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <div class="right_content">
         <!-- Actions -->
         <div class="divtitle">
            <div class="divright">
               <div class="acti2">
                  <a class="add" href="index.php?do=language&act=add">
                     <i class="fa fa-plus-circle"></i> Thêm mới
                  </a>
               </div>
               <div class="acti2">
                  <button class="add" type="button" id="btnDelete" data-comp="0">
                     <i class="fa fa-trash"></i> Xóa
                  </button>
               </div>
            </div>
         </div>
         <div class="main-content">
            <form name="f" id="f" method="post" action="index.php?do=language&act=dellist">
               <table class="br1" cellspacing="0" cellpadding="0">
                  <thead>
                     <tr>
                        <th align="center" class="width-del">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th align="center" class="width-show">Code</th>
                        <th align="left" class="width-ttl">Tiêu đề</th>
                        <th align="center" class="width-show">Show</th>
                        <th align="center" class="width-action">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                     <tr data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
                        <td align="center">
                           <input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" name="cid[]" class="c-item">
                        </td>
                        <td align="center" class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['row']->value['code'];?>
</td>
                        <td align="left"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"
                              data-active="<?php echo $_smarty_tpl->tpl_vars['row']->value['active'];?>
"
                              data-column="active"
                              data-table="language">
                              <img src="images/<?php echo $_smarty_tpl->tpl_vars['row']->value['active'];?>
.png" alt="Show/Hide">
                           </button>
                        </td>
                        <td align="center">
                           <div class="flex-btn">
                              <a class="act-btn btnEdit" href="index.php?do=language&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" title="Edit">
                                 <i class="fa fa-edit"></i>
                              </a>
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
