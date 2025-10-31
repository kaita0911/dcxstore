<?php
/* Smarty version 4.3.1, created on 2025-10-31 11:20:03
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\register_info\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69048d53365064_87154014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbc99988009693a2d843992a97e711c761f89c88' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\register_info\\list.tpl',
      1 => 1761899629,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69048d53365064_87154014 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">

      <aside class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </aside>

      <section class="right_content conten">

         <div class="divtitle margin5">

            <div class="divright">
               <div class="acti2">
                  <button class="add" type="button" id="btnDelete" data-comp="">
                     <i class="fa fa-trash"></i> Xóa
                  </button>
               </div>
            </div>
         </div>


         <div class="main-content">
            <form class="form-all" method="post" action="">
               <table class="br1 w-full border-collapse">
                  <thead>
                     <tr>
                        <th align="center" class="width-del">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th class="width-del">STT</th>
                        <th class="width-image">Ngày tháng</th>
                        <th class="width-ttl">Tiêu đề</th>
                        <th class="width-action">Action</th>
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

                        <td class="text-center">
                           <input type="checkbox" class="c-item" name="cid[]" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                        </td>

                        <td class=" text-center">
                           <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_rows']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_rows']->value['index'] : null)+1+$_smarty_tpl->tpl_vars['number']->value;?>

                        </td>

                        <td class=" text-center linkblack">
                           <?php echo $_smarty_tpl->tpl_vars['item']->value['created_at'];?>

                        </td>

                        <td class=" text-left linkblack">
                           <?php echo $_smarty_tpl->tpl_vars['item']->value['fullname'];?>

                        </td>

                        <td align="center">

                           <a href="index.php?do=register_info&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">Xem</a>

                        </td>
                     </tr>
                     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </tbody>
               </table>
            </form>
         </div>
      </section>
   </div>
</div><?php }
}
