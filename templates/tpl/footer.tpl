<footer>
  <div class="container">
    <div class="clearfix"></div>
    <div class="row">

      <!-- Thông tin công ty -->
      <div class="col-address col-md-4 col-sm-6 col-xs-12">
        <h2>{$gioithieuFooter.name_vn}</h2>

        <div class="item">
          <i class="fa-solid fa-location-dot"></i> Địa chỉ: {$Footer.address}
        </div>
        <div class="item">
          <i class="fa-solid fa-phone"></i> Hotline: <strong>{$gioithieuFooter.hotline}</strong>
        </div>
        <div class="item">
          <i class="fa-solid fa-envelope"></i> Email: {$gioithieuFooter.email}
        </div>

        <ul class="social">
          {if $faceShare.facebook}<li><a href="{$faceShare.facebook}"><i class="fa-brands fa-facebook-f"></i></a></li>{/if}
          {if $faceShare.instagram}<li><a href="{$faceShare.instagram}"><i class="fa-brands fa-instagram"></i></a></li>{/if}
          {if $faceShare.youtube}<li><a href="{$faceShare.youtube}"><i class="fa-brands fa-youtube"></i></a></li>{/if}
          {if $faceShare.twitter}<li><a href="{$faceShare.twitter}"><i class="fa-brands fa-twitter"></i></a></li>{/if}
        </ul>
      </div>

      <!-- Thông tin hữu ích -->
      <div class="consulting col-md-4 col-ms-4 col-xs-12">
        <div class="contactfirst">
          <h2>Thông tin hữu ích</h2>
          <ul>
            {$listservice}
          </ul>
        </div>
      </div>

      <!-- Fanpage Facebook -->
      <div class="fanpage col-md-4 col-ms-4 col-xs-12">
        <div class="contactfirst">
          <h2>FANPAGE</h2>

        </div>
      </div>

    </div>
  </div>
</footer>
<div id="cart-popup"></div>
{include file="social.tpl"}