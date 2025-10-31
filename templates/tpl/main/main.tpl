<div class="main p-search">
   <div class="container">
      <h1>{$c_ttl}</h1>
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

{if $get_info.open eq 1}
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
{/if}