<div class="main">
   <div class="container">
      <div class="breadcumb">{include file='../breadcumb.tpl'}</div>
      <div class="pagecontact">
         <div class="row">
            <div class="conent-news-main col-md-6 col-sm-6 col-xs-12">
               <div class="title-page">
                  <h1>{$contact|escape:'html'}</h1>
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
               {$map.googlemap nofilter}
            </div>
         </div>
      </div>
   </div>
</div>
{if $smarty.session.contact_success}
<div id="popupMessage" class="popup-message {if $smarty.session.contact_success} show{/if}">
   <div class="popup-content">
      <span id="popupText">Cảm ơn Quý khách đã liên hệ! Chúng tôi sẽ liên lạc trong thời gian sớm nhất</span>
      <button id="popupClose">X</button>
   </div>
</div>
{/if}
{literal}
<script>
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
</script>
<script>
   // Lấy các phần tử
   const popup = document.getElementById('popupMessage');
   const closeBtn = document.getElementById('popupClose');

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
</script>
{/literal}