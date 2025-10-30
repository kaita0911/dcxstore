<?php
/* Smarty version 4.3.1, created on 2025-10-30 11:20:37
  from 'D:\htdocs\dcxstore\templates\tpl\social.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_69033bf586de70_16566828',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffeb3f7a4b6bf19341853b977fefb505dc6e76a0' => 
    array (
      0 => 'D:\\htdocs\\dcxstore\\templates\\tpl\\social.tpl',
      1 => 1761370456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69033bf586de70_16566828 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="support-icon">
   <!-- Messenger -->
   <a href="https://m.me/thegioithietbiphache/" class="support-ic sms-icon" rel="nofollow">
      <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/images/ic_messenger.png" alt="Messenger">
   </a>

   <!-- Zalo -->
   <a href="http://zalo.me/<?php echo $_smarty_tpl->tpl_vars['hotline']->value['domain'];?>
" target="_blank" class="support-ic zalo" rel="nofollow">
      <img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/images/ic__zalo.png" alt="Zalo">
   </a>

   <!-- Call -->
   <a href="tel:<?php echo $_smarty_tpl->tpl_vars['hotline']->value['phone'];?>
" class="support-ic call-icon" rel="nofollow">
      <span><img src="<?php echo $_smarty_tpl->tpl_vars['path_url']->value;?>
/assets/images/telephone.png" alt="Call"></span>
   </a>
</div>

<!-- Nội dung script từ CMS -->
<?php echo $_smarty_tpl->tpl_vars['bodyscript']->value['content_vn'];?>


<?php echo '<script'; ?>
>
   var zalo_acc = {
      "<?php echo $_smarty_tpl->tpl_vars['hotline']->value['domain'];?>
": "<?php echo $_smarty_tpl->tpl_vars['hotline']->value['plain_text_vn'];?>
"
   };

   function devvnCheckLinkAvailability(link, successCallback, errorCallback) {
      var hiddenIframe = document.querySelector("#hiddenIframe");
      if (!hiddenIframe) {
         hiddenIframe = document.createElement("iframe");
         hiddenIframe.id = "hiddenIframe";
         hiddenIframe.style.display = "none";
         document.body.appendChild(hiddenIframe);
      }
      var timeout = setTimeout(function() {
         errorCallback("Link is not supported.");
         window.removeEventListener("blur", handleBlur);
      }, 2500);

      var result = {};

      function handleMouseMove(event) {
         if (!result.x) {
            result = {
               x: event.clientX,
               y: event.clientY
            };
         }
      }

      function handleBlur() {
         clearTimeout(timeout);
         window.addEventListener("mousemove", handleMouseMove);
      }

      window.addEventListener("blur", handleBlur);

      window.addEventListener("focus", function onFocus() {
         setTimeout(function() {
            if (document.hasFocus()) {
               successCallback(function(pos) {
                  if (!pos.x) return true;
                  var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                  var alertWidth = 300,
                     alertHeight = 100;
                  var isXInRange = pos.x - 100 < 0.5 * (screenWidth + alertWidth) && pos.x + 100 > 0.5 * (screenWidth + alertWidth);
                  var isYInRange = pos.y - 40 < alertHeight && pos.y + 40 > alertHeight;
                  return isXInRange && isYInRange ? "Link can be opened." : "Link is not supported.";
               }(result));
            } else {
               successCallback("Link can be opened.");
            }
            window.removeEventListener("focus", onFocus);
            window.removeEventListener("blur", handleBlur);
            window.removeEventListener("mousemove", handleMouseMove);
         }, 500);
      }, {
         once: true
      });

      hiddenIframe.contentWindow.location.href = link;
   }

   // Xử lý click Zalo
   Object.keys(zalo_acc).forEach(function(sdt) {
      let qrcode = zalo_acc[sdt];
      const zaloLinks = document.querySelectorAll('a[href*="zalo.me/' + sdt + '"]');

      zaloLinks.forEach(function(zalo) {
         zalo.addEventListener("click", function(event) {
            event.preventDefault();
            const ua = navigator.userAgent.toLowerCase();
            let redirectURL = null;

            if (/iphone|ipad|ipod/.test(ua)) {
               redirectURL = 'zalo://qr/p/' + qrcode;
               window.location.href = redirectURL;
            } else if (/android/.test(ua)) {
               redirectURL = 'zalo://zaloapp.com/qr/p/' + qrcode;
               window.location.href = redirectURL;
            } else {
               redirectURL = 'zalo://conversation?phone=' + sdt;
               zalo.classList.add("zalo_loading");

               devvnCheckLinkAvailability(
                  redirectURL,
                  function(result) {
                     zalo.classList.remove("zalo_loading");
                  },
                  function(error) {
                     zalo.classList.remove("zalo_loading");
                     window.location.href = 'https://chat.zalo.me/?phone=' + sdt;
                  }
               );
            }
         });
      });
   });

   // CSS tạm thời khi đang check chuyển hướng
   var style = document.createElement("style");
   style.innerHTML = ".zalo_loading { pointer-events: none; }";
   document.head.appendChild(style);
<?php echo '</script'; ?>
><?php }
}
