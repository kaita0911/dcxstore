<?php
/* Smarty version 4.3.1, created on 2025-10-29 16:19:15
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\footer\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_690230731ae5c1_32434076',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd95afe61604387b70b2d53d75843f87751e3eb3d' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\footer\\edit.tpl',
      1 => 1760166938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_690230731ae5c1_32434076 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      <!--<?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>-->
    </div>
    <div class="right_content conten">
      
      <form name="allsubmit" id="frmEdit" action="index.php?do=footer&act=<!--<?php if ($_REQUEST['act'] == 'add') {?>-->addsm<!--<?php } else { ?>-->editsm<!--<?php }?>-->&id=<!--<?php echo $_REQUEST['id'];?>
-->" method="post" enctype="multipart/form-data">
      <div class="col00">
        <div class="content">
          <div class="btnseo">
            <input type="hidden" name="id" value="<!--<?php echo $_smarty_tpl->tpl_vars['edit']->value['id'];?>
-->" />
            <button type="button" onclick=" return SubmitFromGo('checkForm','hinh-anh/trung-gian');"><i class="fa fa-save"></i> Save</button>
            <a href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a>
          </div>
          <!--<?php if ($_smarty_tpl->tpl_vars['countlang']->value > 1) {?>-->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <!--<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['languages']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>-->
            <li class="<!--<?php if ($_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'] == 1) {?>-->active <!--<?php }?>-->">
            <a href="#tab_<!--<?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id'];?>
-->"  data-toggle="tab">
            <!--<?php echo $_smarty_tpl->tpl_vars['languages']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
-->
          </a>
        </li>
        <!--<?php
}
}
?>-->
      </ul>
      <!-- Tab panes -->
      <!--<?php }?>-->
      <div class="tab-content">
        <!--<?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['edit_name']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>-->
        <div class="tab-pane <!--<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1 == 1) {?>-->active <!--<?php }?>-->" id="tab_<!--<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
-->">
        <div class="left100">
          <div class="item">
            <div class="title">Tiêu đề</div>
            <div class="info-title">
              <input type="text" value="<!--<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit_name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'], ENT_QUOTES, 'UTF-8', true);?>
-->" name="name_<!--<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
-->" class="InputText" id="title_<!--<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
-->" onkeyup="ChangeToSlug<!--<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
-->();"/>
            </div>
          </div>
          <div class="item">
            <div class="title">Địa chỉ</div>
            <div class="info-title">
              <input type="text" value="<!--<?php echo $_smarty_tpl->tpl_vars['edit_name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['address'];?>
-->" name="address_<!--<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
-->" class="InputText"/>
            </div>
          </div>
          <!--<div class="item">
            <div class="title">Văn phòng</div>
            <div class="info-title">
              <input type="text" value="<!--<?php echo $_smarty_tpl->tpl_vars['edit_name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['vanphong'];?>
-->" name="vanphong_<!--<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
-->" class="InputText"/>
            </div>
          </div>
          
          <div class="item">
            <div class="title">Mô tả thêm nếu có</div>
            <div class="meta">
              <textarea  id="editor<!--<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
-->" name="content_<!--<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)+1;?>
-->" ><!--<?php echo $_smarty_tpl->tpl_vars['edit_name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['content'];?>
--></textarea>
            </div>
          </div>-->
          <div class="item">
            <div class="title">Bản đồ</div>
            <div class="info-title">
              
              <textarea class="InputTextarea"  name="map"><!--<?php echo $_smarty_tpl->tpl_vars['edit']->value['map'];?>
--></textarea>
              
            </div>
          </div>
          
          </div><!--left100-->
        </div>
        <!--<?php
}
}
?>-->
      </div>
      
      <div class="right100">
        <div class="item">
          <div class="title">Hotline</div>
          <div class="info-title">
            <input type="text" value="<!--<?php echo $_smarty_tpl->tpl_vars['edit']->value['hotline'];?>
-->" name="hotline" class="InputText"/>
          </div>
        </div>
         <!--<div class="item">
          <div class="title">Hotline kinh doanh</div>
          <div class="info-title">
            <input type="text" value="<!--<?php echo $_smarty_tpl->tpl_vars['edit']->value['vanphong'];?>
-->" name="vanphong" class="InputText"/>
          </div>
        </div>-->
        <div class="item">
          <div class="title">Email</div> 
          <div class="info-title">
            <input type="text" value="<!--<?php echo $_smarty_tpl->tpl_vars['edit']->value['email'];?>
-->" name="email" class="InputText"/>
          </div>
        </div>
        <!--
        <div class="item">
          <div class="title">MST</div>
          <div class="info-title">
            <input type="text" value="<!--<?php echo $_smarty_tpl->tpl_vars['edit']->value['fax'];?>
-->" name="fax" class="InputText"/>
          </div>
        </div>
        <div class="item">
          <div class="title">Thời gian làm việc</div>
          <div class="info-title">
            <input type="text" value="<!--<?php echo $_smarty_tpl->tpl_vars['edit']->value['tax'];?>
-->" name="tax" class="InputText"/>
          </div>
        </div>
        -->
      </div>
      <!--right100-->
    </div>
  </div>
</form>
<div class="clear"></div>
</div>
</div>
</div><?php }
}
