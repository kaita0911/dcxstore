<?php
/* Smarty version 4.3.1, created on 2025-10-25 09:19:42
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\categories\list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_68fc7a0ea3b253_22153941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1035a775a96ae99d472a42f118579f6ab5602aa1' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\categories\\list.tpl',
      1 => 1760670604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
    'file:categories/category_row_lang.tpl' => 1,
  ),
),false)) {
function content_68fc7a0ea3b253_22153941 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
    <div class="right_content">
      <div class="divright">
        <div class="acti2">
          <button class="add" type="button" id="btnAddnew" data-comp="<?php echo (($tmp = $_REQUEST['comp'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
            <i class="fa fa-plus-circle"></i> Thêm mới
          </button>
        </div>
        <div class="acti2">
          <button class="add" type="button" id="btnDelete">
            <i class="fa fa-trash"></i> Xóa
          </button>
        </div>
        <div class="acti2">
          <button class="add" type="button" id="saveOrderBtn" data-comp="<?php echo (($tmp = $_REQUEST['comp'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
            <i class="fa fa-first-order"></i> Sắp xếp
          </button>
        </div>
      </div>
      <div class="main-content">
                <ul class="nav nav-tabs" role="tablist">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'lang');
$_smarty_tpl->tpl_vars['lang']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->do_else = false;
?>
          <li data-tab="tab_<?php echo $_smarty_tpl->tpl_vars['lang']->value['id'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['lang']->value['id'] == 1) {?>active<?php }?>">
            <?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>

          </li>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
        <div class="tab-content main-tabs">
          <form class="form-all" id="categoryForm" method="post" action="" enctype="multipart/form-data">
            <table class="br1 catelist" width="100%" cellspacing="0" cellpadding="0" style="border-bottom:0">
              <thead>
                <tr>
                  <th class="width-del">
                    <input type="checkbox" name="all" id="checkAll" />
                  </th>
                  <th class="width-order">Thứ tự</th>
                  <th class="width-image">Hình ảnh</th>
                  <th class="width-ttl">Tiêu đề</th>
                  <th class="width-show">Home</th>
                  <th class="width-show">Show</th>
                  <th class="width-action">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                <?php $_smarty_tpl->_subTemplateRender("file:categories/category_row_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('category'=>$_smarty_tpl->tpl_vars['category']->value,'lang'=>$_smarty_tpl->tpl_vars['lang']->value,'level'=>0), 0, true);
?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div><?php }
}
