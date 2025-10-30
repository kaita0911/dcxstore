<?php
/* Smarty version 4.3.1, created on 2025-10-29 16:57:45
  from 'D:\htdocs\dcxstore\admindir\templates\tpl\footer\create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69023979d01836_02243804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e1003ed9483e04454818edb3b7f61c693b5155a' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\admindir\\templates\\tpl\\footer\\create.tpl',
      1 => 1761751820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:left.tpl' => 1,
  ),
),false)) {
function content_69023979d01836_02243804 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      <?php $_smarty_tpl->_subTemplateRender("file:left.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

    <div class="right_content ">
      <form name="allsubmit" id="frmEdit"
        action="index.php?do=footer&act=<?php if ($_REQUEST['act'] == 'add') {?>addsm<?php } else { ?>editsm<?php }?>"
        method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['id'];?>
" />
        <div class="divright">
          <div class="acti2">
            <button class="add" type="submit"><i class="fa fa-save"></i> Save</button>
          </div>
          <div class="acti2"><a class="add" href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a></div>
        </div>

        <div class="main-content">
          <div class="wrap-main">


            <div class="left100">
              <div class="item">
                <div class="title">Tiêu đề</div>
                <div class="info-title">
                  <input type="text" name="name" class="InputText" />
                </div>
              </div>

              <div class="item">
                <div class="title">Địa chỉ</div>
                <div class="info-title">
                  <input type="text" name="address" class="InputText" />
                </div>
              </div>
              <!-- <div class="item">
                <div class="title">Văn phòng</div>
                <div class="info-title">
                  <input type="text" name="vanphong" class="InputText" />
                </div>
              </div> -->

              <div class="item">
                <div class="title">Mô tả thêm nếu có</div>
                <div class="meta">
                  <textarea id="editor" name="content"></textarea>
                </div>
              </div>


              <div class="item">
                <div class="title">Bản đồ</div>
                <div class="info-title">
                  <textarea class="InputTextarea" name="map"></textarea>
                </div>
              </div>
            </div>
            <div class="right100">
              <div class="item">
                <div class="title">Hotline</div>
                <div class="info-title">
                  <input type="text" name="hotline" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['hotline'], ENT_QUOTES, 'UTF-8', true);?>
" class="InputText" />
                </div>
              </div>

              <div class="item">
                <div class="title">Email</div>
                <div class="info-title">
                  <input type="text" name="email" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['edit']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
" class="InputText" />
                </div>
              </div>


              <!-- <div class="item">
                <div class="title">MST</div>
                <div class="info-title">
                  <input type="text" name="fax" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['fax'];?>
" class="InputText" />
                </div>
              </div>

              <div class="item">
                <div class="title">Thời gian làm việc</div>
                <div class="info-title">
                  <input type="text" name="tax" value="<?php echo $_smarty_tpl->tpl_vars['edit']->value['tax'];?>
" class="InputText" />
                </div>
              </div> -->

            </div>
            <!-- right100 -->
          </div>
        </div>
      </form>
    </div>
  </div>
</div><?php }
}
