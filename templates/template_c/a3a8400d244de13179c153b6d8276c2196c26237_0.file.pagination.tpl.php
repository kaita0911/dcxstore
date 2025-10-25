<?php
/* Smarty version 4.3.1, created on 2025-10-23 12:11:23
  from 'D:\htdocs\dcxstore\templates\tpl\search\pagination.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68f9ff4b92d521_82693748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3a8400d244de13179c153b6d8276c2196c26237' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\search\\pagination.tpl',
      1 => 1761211873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68f9ff4b92d521_82693748 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['total_pages']->value > 1) {?>
<ul class="pagination" id="viewpage-search">
    <?php $_smarty_tpl->_assignInScope('prev_page', $_smarty_tpl->tpl_vars['current_page']->value-1);?>
    <?php $_smarty_tpl->_assignInScope('next_page', $_smarty_tpl->tpl_vars['current_page']->value+1);?>

        <?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
    <li>
        <a href="/tim-kiem/<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
/page/<?php echo $_smarty_tpl->tpl_vars['prev_page']->value;?>
">«</a>
    </li>
    <?php }?>

        <?php
$__section_p_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['total_pages']->value+1) ? count($_loop) : max(0, (int) $_loop));
$__section_p_0_start = min(1, $__section_p_0_loop);
$__section_p_0_total = min(($__section_p_0_loop - $__section_p_0_start), $__section_p_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_p'] = new Smarty_Variable(array());
if ($__section_p_0_total !== 0) {
for ($__section_p_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] = $__section_p_0_start; $__section_p_0_iteration <= $__section_p_0_total; $__section_p_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']++){
?>
    <?php $_smarty_tpl->_assignInScope('page', (isset($_smarty_tpl->tpl_vars['__smarty_section_p']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_p']->value['index'] : null));?>
    <?php if ($_smarty_tpl->tpl_vars['page']->value == $_smarty_tpl->tpl_vars['current_page']->value) {?>
    <li class="active"><span><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</span></li>
    <?php } else { ?>
    <li>
        <a href="/tim-kiem/<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
/page/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>
    </li>
    <?php }?>
    <?php
}
}
?>

        <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
        <li>
        <a href="/tim-kiem/<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
/page/<?php echo $_smarty_tpl->tpl_vars['next_page']->value;?>
">»</a>
        </li>
        <?php }?>
</ul>
<?php }
}
}
