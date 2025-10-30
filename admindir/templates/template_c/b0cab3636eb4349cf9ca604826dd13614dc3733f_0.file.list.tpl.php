<?php
/* Smarty version 4.3.1, created on 2025-10-29 16:01:32
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\contact\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69022c4c8fe037_06596308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0cab3636eb4349cf9ca604826dd13614dc3733f' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\contact\\list.tpl',
      1 => 1761646002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69022c4c8fe037_06596308 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>

      <div class="right_content">
         <div class="divright">
            <div class="acti2">
               <div class="acti2">
                  <button class="add" type="button" id="btnDelete" data-comp="0">
                     <i class="fa fa-trash"></i> Xóa
                  </button>
               </div>
            </div>
         </div>
         <div class="tbtitle2 main-content">
            <form id="f" name="f"
               method="post"
               action="index.php?do=contact&act=dellist&cid=1&city=<?php echo $_REQUEST['city'];?>
&type=<?php echo $_REQUEST['type'];?>
">
               <table class="br1">
                  <thead>
                     <tr>
                        <th class="width-del" align="center">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th class="width-ttl" align="left">Tiêu đề</th>
                        <th class="width-image" align="center">Ngày tháng</th>
                        <th class="width-action" align="center">Action</th>
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
                        <td align="center" class="brbottom">
                           <input class="c-item" type="checkbox" name="cid[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        </td>

                        <td align="left" class=" brbottom">
                           <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

                        </td>
                        <td align="center" class="brbottom">
                           <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value['dated'], ENT_QUOTES, 'UTF-8', true);?>

                        </td>
                        <td align="center" class="brbottom">

                           <a href="index.php?do=contact&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
&comp=<?php echo $_REQUEST['comp'];?>
">
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
            <div class="pagination-wrapper">
               <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

            </div>
         </div>

      </div>
   </div>
</div><?php }
}
