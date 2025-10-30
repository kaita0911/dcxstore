<?php
/* Smarty version 4.3.1, created on 2025-10-30 10:48:38
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\categories\category_row_lang.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690334760088f8_05040597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1a8c35a71fd26b1c9341af3723807fe6db74c4c' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\categories\\category_row_lang.tpl',
      1 => 1761795262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:categories/category_row_lang.tpl' => 2,
  ),
),false)) {
function content_690334760088f8_05040597 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\htdocs\\dcxstore\\libraries\\smarty\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<tr data-id="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
    <td align="center">
        <input class="c-item" type="checkbox" name="cid[]" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
    </td>
    <td align="center">
        <input type="text" class="numInput"
            value="<?php echo $_smarty_tpl->tpl_vars['category']->value['num'];?>
">
    </td>
    <td align="center" class="img-table">
        <?php if ($_smarty_tpl->tpl_vars['category']->value['img_vn'] != '') {?>
        <div class="c-img">
            <img src="../<?php echo $_smarty_tpl->tpl_vars['category']->value['img_vn'];?>
" alt="img">
        </div>
        <?php }?>
    </td>
    <td align="left" class="main-tabs">

        <span class="c-name">
            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['level']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['level']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>&nbsp;--<?php }
}
?>
            <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['category']->value['details']['name'], ENT_QUOTES, 'UTF-8', true);?>

        </span>

    </td>
    <td align="center">
        <button type="button"
            class="btn_checks btn_toggle"
            data-id="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"
            data-active="<?php echo $_smarty_tpl->tpl_vars['category']->value['home'];?>
"
            data-column="home"
            data-table="categories">
            <img src="images/<?php echo $_smarty_tpl->tpl_vars['category']->value['home'];?>
.png" alt="Show/Hide">
        </button>
    </td>

    <td align="center">
        <button type="button"
            class="btn_checks btn_toggle"
            data-id="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"
            data-active="<?php echo $_smarty_tpl->tpl_vars['category']->value['active'];?>
"
            data-column="active"
            data-table="categories">
            <img src="images/<?php echo $_smarty_tpl->tpl_vars['category']->value['active'];?>
.png" alt="Show/Hide">
        </button>

    </td>
    <td align="center">
        <div class="flex-btn extra-tabs">
            <a class="act-btn btnView" href="<?php echo $_smarty_tpl->tpl_vars['web_base_url']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['details']['unique_key'];?>
/"
                target="_blank"
                title="Xem nhanh">
                <i class="fa fa-eye"></i>
            </a>

            <a title="Chỉnh sửa" class="act-btn btnEdit" href="index.php?do=categories&act=edit&id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
&comp=<?php echo $_REQUEST['comp'];?>
">
                <i class="fa fa-edit"></i>
            </a>
            <button title="Làm mới" type="button" class="act-btn btnUpdateNum" data-id="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" data-comp=" <?php echo $_REQUEST['comp'];?>
">
                <i class="fa fa-refresh"></i>
            </button>
            <button title="Xoá" type="button" class="act-btn btnDeleteRow" data-id="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"> <i class="fa fa-trash"></i> </button>
        </div>
    </td>
</tr>

<?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['category']->value['children']) > 0) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['children'], 'child');
$_smarty_tpl->tpl_vars['child']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->do_else = false;
$_smarty_tpl->_subTemplateRender("file:categories/category_row_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category'=>$_smarty_tpl->tpl_vars['child']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value+1), 0, true);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
