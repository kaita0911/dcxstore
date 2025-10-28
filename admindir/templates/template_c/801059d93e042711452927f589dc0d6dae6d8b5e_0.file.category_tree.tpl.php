<?php
/* Smarty version 4.3.1, created on 2025-10-28 08:24:38
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\articlelist\category_tree.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69006fb6bfe608_88188208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '801059d93e042711452927f589dc0d6dae6d8b5e' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\articlelist\\category_tree.tpl',
      1 => 1760687200,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:articlelist/category_tree.tpl' => 2,
  ),
),false)) {
function content_69006fb6bfe608_88188208 (Smarty_Internal_Template $_smarty_tpl) {
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

        <?php if ((isset($_smarty_tpl->tpl_vars['node']->value['details'][$_smarty_tpl->tpl_vars['lang']->value['id']]['name']))) {?>
        <?php echo $_smarty_tpl->tpl_vars['node']->value['details'][$_smarty_tpl->tpl_vars['lang']->value['id']]['name'];?>

        <?php } else { ?>
        <?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>

        <?php }?>
    </label>

    <?php if (!empty($_smarty_tpl->tpl_vars['node']->value['children'])) {?>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['node']->value['children'], 'child');
$_smarty_tpl->tpl_vars['child']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->do_else = false;
?>
        <?php $_smarty_tpl->_subTemplateRender("file:articlelist/category_tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('node'=>$_smarty_tpl->tpl_vars['child']->value,'selected'=>$_smarty_tpl->tpl_vars['selected']->value,'lang'=>$_smarty_tpl->tpl_vars['lang']->value), 0, true);
?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
    <?php }?>
</li><?php }
}
