<?php
/* Smarty version 4.3.1, created on 2025-10-31 11:29:27
  from 'D:\htdocs\dcxstore\templates\tpl\main\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69048f877725c0_25408164',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5547dd5196b7db0090d23fcbc11ce6cf577bf95a' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\main\\main.tpl',
      1 => 1761906107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69048f877725c0_25408164 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main p-search">
   <div class="container">
      <h1><?php echo $_smarty_tpl->tpl_vars['c_ttl']->value;?>
</h1>
      <div class="artseed-ftn-body">
         <div class="content-news-main row">
            <div id="viewlist" class="p-products">
            </div>
            <div id="viewpage-search">
            </div>
         </div>
      </div>
   </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['get_info']->value['open'] == 1) {?>
<div class="register-form">
   <h3>Đăng ký nhận tư vấn</h3>
   <form id="registerForm">
      <div class="form-group">
         <label>Họ tên *</label>
         <input type="text" name="fullname" required />
      </div>

      <div class="form-group">
         <label>Email *</label>
         <input type="email" name="email" required />
         <div class="error-msg"></div>
      </div>

      <div class="form-group">
         <label>Điện thoại *</label>
         <input type="text" name="phone" required />
         <div class="error-msg"></div>
      </div>

      <div class="form-group">
         <label>Nội dung</label>
         <textarea name="message" rows="3"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Gửi đăng ký</button>
   </form>
   <div id="formMessage" class="msg-box"></div>
</div>
<!-- Popup thông báo -->
<div id="popupMessage" class="popup-message">
   <div class="popup-content">
      <span id="popupText"></span>
      <button id="popupClose">X</button>
   </div>
</div>
<?php }
}
}
