<?php
/* Smarty version 4.3.1, created on 2025-10-31 03:02:12
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\articlelist\category_tree.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690418a4d28fb6_68796353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '801059d93e042711452927f589dc0d6dae6d8b5e' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\articlelist\\category_tree.tpl',
      1 => 1761799470,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:articlelist/category_tree.tpl' => 2,
  ),
),false)) {
function content_690418a4d28fb6_68796353 (Smarty_Internal_Template $_smarty_tpl) {
?><li>
    <label>
        <input type="checkbox"
            name="parentids[]"
            value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id'];?>
"
            data-parent="<?php echo (($tmp = $_smarty_tpl->tpl_vars['node']->value['parent_id'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
"
            <?php if (in_array(intval($_smarty_tpl->tpl_vars['node']->value['id']),(($tmp = $_smarty_tpl->tpl_vars['selected']->value ?? null)===null||$tmp==='' ? array() ?? null : $tmp))) {?>checked<?php }?>>

        <?php echo str_repeat('--&nbsp;',$_smarty_tpl->tpl_vars['node']->value['level']);?>


        <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['node']->value['details']['name'], ENT_QUOTES, 'UTF-8', true);?>

    </label>

    <?php if (!empty($_smarty_tpl->tpl_vars['node']->value['children'])) {?>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['node']->value['children'], 'child');
$_smarty_tpl->tpl_vars['child']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->do_else = false;
?>
        <?php $_smarty_tpl->_subTemplateRender("file:articlelist/category_tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'selected'=>$_smarty_tpl->tpl_vars['selected']->value), 0, true);
?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
    <?php }?>
</li><?php }
}
