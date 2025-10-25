<?php
/* Smarty version 4.3.1, created on 2025-10-25 09:49:34
  from 'D:\htdocs\dcxstore\templates\tpl\products\pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68fc810e893033_93534852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '742d2e8f3580def137f632094c04227021bb80c8' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\products\\pagination.tpl',
      1 => 1761369754,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68fc810e893033_93534852 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['totalPages']->value > 1) {?>
<ul>
    <?php if ($_smarty_tpl->tpl_vars['currentPage']->value > 1) {?>
    <li><a href="/<?php echo $_smarty_tpl->tpl_vars['module']->value;
if ($_smarty_tpl->tpl_vars['currentPage']->value-1 > 1) {?>/page/<?php echo $_smarty_tpl->tpl_vars['currentPage']->value-1;
}
if ($_smarty_tpl->tpl_vars['sort']->value != 'id_desc') {?>/sort/<?php echo $_smarty_tpl->tpl_vars['sort']->value;
}?>">
            &laquo;
        </a></li>
    <?php }?>

    <?php
$__section_page_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['totalPages']->value+1) ? count($_loop) : max(0, (int) $_loop));
$__section_page_0_start = min(1, $__section_page_0_loop);
$__section_page_0_total = min(($__section_page_0_loop - $__section_page_0_start), $__section_page_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_page'] = new Smarty_Variable(array());
if ($__section_page_0_total !== 0) {
for ($_smarty_tpl->tpl_vars['__smarty_section_page']->value['iteration'] = 1, $_smarty_tpl->tpl_vars['__smarty_section_page']->value['index'] = $__section_page_0_start; $_smarty_tpl->tpl_vars['__smarty_section_page']->value['iteration'] <= $__section_page_0_total; $_smarty_tpl->tpl_vars['__smarty_section_page']->value['iteration']++, $_smarty_tpl->tpl_vars['__smarty_section_page']->value['index']++){
?>
    <?php $_smarty_tpl->_assignInScope('pageNum', (isset($_smarty_tpl->tpl_vars['__smarty_section_page']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_section_page']->value['iteration'] : null));?>
    <?php if ($_smarty_tpl->tpl_vars['pageNum']->value == $_smarty_tpl->tpl_vars['currentPage']->value || ($_smarty_tpl->tpl_vars['currentPage']->value == 0 && $_smarty_tpl->tpl_vars['pageNum']->value == 1)) {?>
    <li><span><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_page']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_page']->value['index'] : null);?>
</span></li>
    <?php } else { ?>
    <li> <a href="/<?php echo $_smarty_tpl->tpl_vars['module']->value;
if ($_smarty_tpl->tpl_vars['pageNum']->value > 1) {?>/page/<?php echo $_smarty_tpl->tpl_vars['pageNum']->value;
}
if ($_smarty_tpl->tpl_vars['sort']->value != 'id_desc') {?>/sort/<?php echo $_smarty_tpl->tpl_vars['sort']->value;
}?>">
            <?php echo $_smarty_tpl->tpl_vars['pageNum']->value;?>

        </a></li>
    <?php }?>
    <?php
}
}
?>

    <?php if ($_smarty_tpl->tpl_vars['currentPage']->value < $_smarty_tpl->tpl_vars['totalPages']->value) {?>
        <li><a href="/<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
/page/<?php echo $_smarty_tpl->tpl_vars['currentPage']->value+1;
if ($_smarty_tpl->tpl_vars['sort']->value != 'id_desc') {?>/sort/<?php echo $_smarty_tpl->tpl_vars['sort']->value;
}?>">
            &raquo;
        </a></li>
        <?php }?>
</ul>
<?php }
}
}
