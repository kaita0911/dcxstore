<?php
/* Smarty version 4.3.1, created on 2025-10-31 11:26:28
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\infos\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69048ed4833a81_84955685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cb24f3bea1e6ae0a2f8fc2b347f939e1f3800f1' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\infos\\list.tpl',
      1 => 1760656930,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69048ed4833a81_84955685 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <div class="right_content conten">
         <div class="tbtitle2 link00">
            <form id="f" method="post" action="index.php?do=infos&act=dellist&cid=1">
               <table class="br1" style="border-bottom:0" width="100%" cellspacing="0" cellpadding="0">
                  <thead>
                     <tr>
                        <th class="width-order">Thứ tự</th>
                        <th class="width-ttl">Tiêu đề</th>
                        <?php if ($_SESSION['admin_artseed_username'] == 'kaita') {?>
                        <th class="width-show">Show</th>
                        <th class="width-show">Kích hoạt</th>
                        <?php }?>
                        <th class="width-action">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['view']->value, 'item', false, 'index');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                     <tr>
                        <td align="center" class="brbottom"><?php echo $_smarty_tpl->tpl_vars['index']->value+1+$_smarty_tpl->tpl_vars['number']->value;?>
</td>
                        <td class="paleft brbottom linkblack"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['item']->value['name_vn'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                        <?php if ($_SESSION['admin_artseed_username'] == 'kaita') {?>
                        <td align="center" class="brbottom">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                              data-active="<?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
"
                              data-column="active"
                              data-table="infos">
                              <img src="images/<?php echo $_smarty_tpl->tpl_vars['item']->value['active'];?>
.png" alt="Show/Hide">
                           </button>
                        </td>
                        <td align="center" class="brbottom">
                           <?php if (in_array($_smarty_tpl->tpl_vars['item']->value['id'],array(2,12,13,14,15,16,19,20,21,22,23,24,25,26,27,28,30))) {?>
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                              data-active="<?php echo $_smarty_tpl->tpl_vars['item']->value['open'];?>
"
                              data-column="open"
                              data-table="infos">
                              <img src="images/<?php echo $_smarty_tpl->tpl_vars['item']->value['open'];?>
.png" alt="Show/Hide">
                           </button>
                           <?php }?>
                        </td>
                        <?php }?>

                        <td align=" center" class="brbottom">
                           <div class="flex-btn">
                              <a class="act-btn btnEdit" href="index.php?do=infos&act=edit&comp=<?php echo $_REQUEST['comp'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" title="Sửa">
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
