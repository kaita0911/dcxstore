<div class="bg-bred ">
  <div class="container">
    
    <div class="breadcrumb">
      <ul>
        <li>
          <a title="Trang chủ" href="<!--{$path_url}-->"><i class="fa fa-home"></i><!--{$home}--></a>
        </li>
        <!--{insert name="checkbreadcumb" idpr=$detail.articlelist_id}-->
        <li>
          <span>
            <!--{$detail.name}-->
          </span>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="main">
  <div class="artseed-ftn-body">
    <div class="detail-top container">
      ssssssssss
      <div class="row option-image-info-product">
        <div class="f-product-view-info-image col-md-6">
          <div class="f-pr-image-zoom">
            <div class="zoomWrapper">
              <!--{if $countgallery gt 0}-->
              <img id="img_01" src="<!--{$path_url}-->/<!--{$viewgallery[0].img_vn}-->" data-zoom-image="<!--{$path_url}-->/<!--{$viewgallery[0].img_vn}-->" class="img-responsive" alt="<!--{$viewgallery[0].$name}-->"/>
              <!--{else}-->
              <img id="img_01" src="<!--{$path_url}-->/<!--{$image_sp.img_thumb_vn}-->" data-zoom-image="<!--{$path_url}-->/<!--{$image_sp.img_thumb_vn}-->" class="img-responsive" alt="<!--{$detail.name}-->"/>
              <!--{/if}-->
            </div>
          </div>
          <div class="f-pr-image-zoom-gallery">
            <div id="slidezoompage" >
              <div class="owl_img_product_details">
                <!--{if $countgallery gt 0}-->
                <!--{section name=i loop=$viewgallery}-->
                <a class="thumb-dt" href="javascript:void(0)" data-image="<!--{$path_url}-->/<!--{$viewgallery[i].img_vn}-->" data-zoom-image="<!--{$path_url}-->/<!--{$viewgallery[i].img_vn}-->">
                <img src="<!--{$path_url}-->/<!--{$viewgallery[i].img_vn}-->" class="img-responsive" alt="<!--{$viewgallery[i].$name}-->"/>
              </a>
              <!--{/section}-->
              <!--{else}-->
              <a class="thumb-dt" href="javascript:void(0)" data-image="<!--{$path_url}-->/<!--{$image_sp.img_thumb_vn}-->" data-zoom-image="<!--{$path_url}-->/<!--{$image_sp.img_thumb_vn}-->">
              <img src="<!--{$path_url}-->/<!--{$image_sp.img_thumb_vn}-->" class="img-responsive" alt="<!--{$detail.name}-->"/>
            </a>
            <!--{/if}-->
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!--f-product-view-info-image-->
    <div class="f-product-view-info-detail col-md-6 col-sm-6 col-xs-12">
      <form id ="addtocart" name="addtocart" action="<!--{$path_url}-->/gio-hang/" method="post" enctype="application/x-www-form-urlencoded">
      <div class="dmthuove"></div>
      
      <div class="title-page-dt">
        <h1>
        <!--{$detail.name}-->
        </h1>
        <!--{if $tinhnang.masp eq 1}-->
        <div class="list_properties">
          <!--{$listprop}-->
          <p class="coded">
            <label>Danh mục: </label><span> <!--{$dmcap3.name}--></span>
          </p>
        </div>
        <!--{/if}-->
      </div>
      
     
      <!--{if $tinhnang.price eq 1 }-->
      <div class="pr-detail">

        
        <!--{insert name="showpricedetail" idpr=$detail.articlelist_id}-->
        
        
      </div>
      <!--{/if}-->
     
     
      <div class="opsede">
        <p><label>Gọi đặt mua:</label> <span><a href="tel:<!--{$hotline.phone}-->"><!--{$hotline.phone}--></a></span> (8:30 - 22:00)</p>
        <p><label>Ưu đãi:</label> <span>Freeship HCM & Hà Nội</span></p>
      </div>
       <div class="short-mt">
        <!--{$detail.short}-->
      </div>
       <!--{if $tinhnang.kichthuoc eq 1}-->
      <!--{if $checklistsize gt 0}-->
      <div class="pr-size">
        <span class="tit">Chọn Size</span>
        <div class="listsize">
          <!--{$listsize}-->
        </div>
        <!--{$image_cate}-->
        <script type="text/javascript">
          $(document).ready(function() {
               $('.fancysize').fancybox();
          });
        </script>
      </div>
      <!--{/if}-->
      <!--{/if}-->
      <!--{if $tinhnang.mausac eq 1}-->
      <!--{if $checklistcolor gt 0}-->
      <div class="pr-size color">
        <span class="tit">Màu sắc</span>
        <!--{$listcolor}-->
      </div>
      <!--{/if}-->
      <!--{/if}-->
      <div class="vouchers">
          <div class="title">Mã giảm giá</div>
          <div class="listvourcher">

            <!--{section name=i loop=$listvouchers}-->
              <div class="item">
                  
                  <label>Giảm <!--{$listvouchers[i].price|number_format:0:",":"."}--> ₫</label>
                  <div class="info">
                      <h3>MÃ GIẢM GIÁ</h3>
                      <p>Nhập <span><!--{$listvouchers[i].name}--></span> giảm  <span><!--{$listvouchers[i].price|number_format:0:",":"."}--> ₫</span></p>
                      <p>Áp dụng với đơn hàng trên <span><!--{$listvouchers[i].price_min|number_format:0:",":"."}--> ₫</span></p>
                      <span class="close"><i class="fa-solid fa-xmark"></i></span>
                  </div>
                </div>
            <!--{/section}-->
            <div class="black"></div>
          </div>
      </div>

      <input type="hidden" name="id" id="<!--{$detail.id}-->" value="<!--{$detail.id}-->" />
      <input type="hidden" name="pricesp" id="pricesp<!--{$detail.id}-->" value="<!--{$price}-->" />
      <input type="hidden" name="namesp" id="namesp<!--{$detail.id}-->" value="<!--{$detail.name}-->" />
      <input type="hidden" name="imgsp" id="imgsp<!--{$detail.id}-->" value="<!--{$image_sp.img_thumb_vn}-->" />
      <input type="hidden" name="unique_key" id="unique_key<!--{$detail.id}-->" value="<!--{$image_sp.unique_key}-->" />
      <!--{if $showcart.open eq 1}-->
      <div class="qualitysl">
        <p>Số lượng </p>
        <div class="quantity">
          <input name="qty" type="number" id="qty<!--{$detail.id}-->" min="1" max="100" value="1" />
        </div>
      </div>
      <!--{/if}-->
      <script> jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
      jQuery('.quantity').each(function() {
      
      
      
      var spinner = jQuery(this),
      
      
      
      input = spinner.find('input[type="number"]'),
      
      
      
      btnUp = spinner.find('.quantity-up'),
      
      
      
      btnDown = spinner.find('.quantity-down'),
      
      
      
      min = input.attr('min'),
      
      
      
      max = input.attr('max');
      
      
      
      btnUp.click(function() {
      
      
      
      var oldValue = parseFloat(input.val());
      
      
      
      if(oldValue >= max) {
      
      
      
      var newVal = oldValue;
      
      
      
      } else {
      
      
      
      var newVal = oldValue + 1;
      
      
      
      }
      
      
      
      spinner.find("input").val(newVal);
      
      
      
      spinner.find("input").trigger("change");
      
      
      
      });
      
      
      
      btnDown.click(function() {
      
      
      
      var oldValue = parseFloat(input.val());
      
      
      
      if(oldValue <= min) {
      
      
      
      var newVal = oldValue;
      
      
      
      } else {
      
      
      
      var newVal = oldValue - 1;
      
      
      
      }
      
      
      
      spinner.find("input").val(newVal);
      
      
      
      spinner.find("input").trigger("change");
      
      
      
      });
      
      
      
      });
      
      
      
      </script>
      
      <!--{if $tinhnang.mausac eq 1 or $tinhnang.kichthuoc eq 1}-->
      
      <div class="box-addtocart sss">
        <button type="button" class="AddtoBasket" id="<!--{$detail.id}-->">
        <span class="icon-cart"></span>
        <span>Thêm vào giỏ hàng</span>
        </button>
        <a class="addnhanh" href="javascript:void(0)" onclick="addcartnhanh()">Đặt hàng</a>
      </div>
      <script> 
        function addcartnhanh() 
        {
          var prsized = document.querySelector('input[type=radio][name=optionsize]:checked');
          //var prcolored = document.querySelector('input[type=radio][name=optioncolor]:checked');
          /*if(prsized == null) {
            alert('Vui lòng chọn kích cỡ !');
          }*/
          /*if(prsized != null) {
            document.getElementById("addtocart").action = "<!--{$path_url}-->/mua-nhanh/";
            document.addtocart.submit();
          }*/
          document.getElementById("addtocart").action = "<!--{$path_url}-->/mua-nhanh/";
          document.addtocart.submit();
        } 
        </script>
      <!--{else}-->
      <div class="box-addtocart">
        <button type="button" class="AddtoBasket_nomarl" id="<!--{$detail.id}-->">
        <span class="icon-cart"></span>
        <span><i class="fa-light fa-cart-plus"></i> Thêm vào giỏ hàng</span>
        </button>
        <a class="addnhanh" href="javascript:void(0)" onclick="addcartnhan_nomarl()"><i class="fa-light fa-cart-plus"></i> Đặt hàng</a>
      </div>
      <script> function addcartnhan_nomarl() {
      document.getElementById("addtocart").action = "<!--{$path_url}-->/mua-nhanh/";
      
      document.addtocart.submit();
      
      }
      
      </script>
      <!--{/if}-->
      
      
    </form>
    <div class="clearfix"></div>
     
     <div class="opmore">
        <div class="fb-like" data-href="<!--{$path_url}--><!--{$smarty.server.REQUEST_URI}-->" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        
      </div>
    
  </div>
  <!--f-product-view-info-image-->
</div>
</div>
</div>
<!--detail-top-->
<div class="detail-bottom artseed-detail-content product_detail">
<div class="container">
  <div class="row">
    <!-- Nav tabs -->
    <ul class="sptab-dt nav nav-tabs" role="tablist">
      <li class="active"><a href="#noidung" data-toggle="tab">Thông tin sản phẩm</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="motachitiet" id="noidung">
        <!--{$detail.content}-->
      </div>
      <div class="clearfix"></div>
      <!--page_news-->
      <!--artseed-ftn-body-->
    </div>
  </div>

</div>
</div>
<!--detail-bottom-->
<div class="detail-pr-lq">
<div class="container">
<div class="pr_related ">
  <div class="news_title_related">
    <h2>Sản phẩm liên quan</h2>
  </div>
  <div class="row">
    <div class="owlsplq_ owl-carousel_">
      <!--{section name=i loop=$view}-->
      <!--{include file="brand/other.tpl"}-->
      <!--{/section}-->
    </div>
  </div>
</div>
</div>
</div>
<!--detail-pr-lq-->
<!--product related-->
<!--{if $tinhnang.viewed ==1}-->
<div class="detail-pr-lq">
<div class="container">
<div class="pr_related f-block-spnb">
  <div class="news_title_related">
    <h2>Sản phẩm đã xem</h2>
  </div>
  <div class="row">
    <div class="owlsplqed">
      <!--{$Listviewed}-->
    </div>
  </div>
</div>
</div>
</div>
<!--{/if}-->
</div>
</div>