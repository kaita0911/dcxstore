<?php
/* Smarty version 4.3.1, created on 2025-10-29 09:19:34
  from 'D:\htdocs\dcxstore\templates\tpl\contact\view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6901ce16be3c38_11288305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf9deeb923c53ba20a2fb5397310247541d925b5' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\contact\\view.tpl',
      1 => 1761644828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../breadcumb.tpl' => 1,
  ),
),false)) {
function content_6901ce16be3c38_11288305 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl->_subTemplateRender('file:../breadcumb.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
      <div class="pagecontact">
         <div class="row">
            <div class="conent-news-main col-md-6 col-sm-6 col-xs-12">
               <div class="title-page">
                  <h1><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value, ENT_QUOTES, 'UTF-8', true);?>
</h1>
               </div>
               <div class="contact-form">
                  <div class="form-right">

                  </div>
                  <div class="form-left">
                     <div class="contact-form">
                        <div class="contact-form">
                           <form id="formcontact" action="" method="post">
                              <input type="text" name="name" id="name" placeholder="Họ tên" required />
                              <input type="tel" name="phone" id="phone" placeholder="Điện thoại" required />
                              <input type="text" name="email" id="email" placeholder="Email" required />
                              <input type="text" name="address" id="address" placeholder="Địa chỉ" />
                              <textarea name="message" id="message" placeholder="Nội dung"></textarea>
                              <div id="txtmsg" style="color:red; margin-bottom:10px;"></div>
                              <button type="submit">Gửi</button>
                           </form>
                        </div>

                     </div>


                  </div>
               </div>
            </div>
            <div class="map col-md-6 col-sm-6 col-xs-12">
               <?php echo $_smarty_tpl->tpl_vars['map']->value['googlemap'];?>

            </div>
         </div>
      </div>
   </div>
</div>
<?php if ($_SESSION['contact_success']) {?>
<div id="contactPopup" class="popup <?php if ($_SESSION['contact_success']) {?> show<?php }?>">
   <div class="popup-content">
      <span id="close-popup">&times;</span>
      <p>Gửi liên hệ thành công!</p>
   </div>
</div>
<?php }?>

<?php echo '<script'; ?>
>
   // Chỉ cho phép nhập số và dấu + đầu
   document.getElementById('phone').addEventListener('input', function(e) {
      let value = this.value;
      // Nếu bắt đầu có dấu + thì giữ lại, còn lại chỉ số
      if (value.startsWith('+')) {
         this.value = '+' + value.slice(1).replace(/\D/g, '');
      } else {
         this.value = value.replace(/\D/g, '');
      }
   });
   document.getElementById('formcontact').addEventListener('submit', function(e) {
      var name = document.getElementById('name').value.trim();
      var phone = document.getElementById('phone').value.trim();
      var email = document.getElementById('email').value.trim();
      var address = document.getElementById('address').value.trim();
      var message = document.getElementById('message').value.trim();
      var txtmsg = document.getElementById('txtmsg');
      txtmsg.innerHTML = '';

      // Regex
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      var vnPhoneRegex = /^0\d{9,10}$/; // số VN bắt đầu 0, 10 hoặc 11 chữ số

      // Validate
      if (name === '') {
         txtmsg.innerHTML = 'Vui lòng nhập họ tên.';
         e.preventDefault();
         return;
      }
      if (!vnPhoneRegex.test(phone)) {
         txtmsg.innerHTML = 'Số điện thoại không hợp lệ (bắt đầu 0, 10 hoặc 11 chữ số).';
         e.preventDefault();
         return;
      }
      if (!emailRegex.test(email)) {
         txtmsg.innerHTML = 'Email không hợp lệ.';
         e.preventDefault();
         return;
      }


      // Nếu hợp lệ, form sẽ submit bình thường
   });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
   // Lấy các phần tử
   const popup = document.getElementById('contactPopup');
   const closeBtn = document.getElementById('close-popup');

   // Hàm đóng popup
   function closePopup() {
      popup.classList.remove('show');
      window.location.href = '/'; // hoặc '/index.php' nếu muốn
   }
   // Click vào dấu × để đóng
   closeBtn.addEventListener('click', closePopup);

   // Click ra ngoài popup cũng đóng
   popup.addEventListener('click', function(e) {
      if (e.target === popup) {
         closePopup();
      }
   });
<?php echo '</script'; ?>
>
<?php }
}
