<?php
/* Smarty version 4.3.1, created on 2025-10-31 11:29:40
  from 'D:\htdocs\dcxstore\templates\tpl\categories_tree.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69048f94b62135_89998949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24c49c3bbedcd186533be04a4db67ad9d08433ef' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\categories_tree.tpl',
      1 => 1760929433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:categories_tree.tpl' => 2,
  ),
),false)) {
function content_69048f94b62135_89998949 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
$_smarty_tpl->_assignInScope('level', (($tmp = $_smarty_tpl->tpl_vars['level']->value ?? null)===null||$tmp==='' ? 1 ?? null : $tmp));?>
<ul class="level_<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
    <li>
                <a href="<?php echo $_smarty_tpl->tpl_vars['web_base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['cat']->value['unique_key'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name_detail'];?>
</a>

        <?php if ((isset($_smarty_tpl->tpl_vars['cat']->value['children'])) && smarty_modifier_count($_smarty_tpl->tpl_vars['cat']->value['children']) > 0) {?>
                <?php $_smarty_tpl->_subTemplateRender('file:categories_tree.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('categories'=>$_smarty_tpl->tpl_vars['cat']->value['children'],'level'=>$_smarty_tpl->tpl_vars['level']->value+1), 0, true);
?>
        <?php }?>
    </li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul><?php }
}
