<div class="prlist col-md-4 col-sm-6 col-xs-6">

  <div class="f-prnb product_nb">



      <a class="img" href="<!--{$path_url}-->/<!--{$view[i].unique_key}-->.html" title="<!--{$view[i].$name}-->">

      

      <!--{insert name='getImgWebp' img=$view[i].img_thumb_vn alt=$view[i].$name  classimg='img-responsive' width='260' height='310'}-->

       <!--{insert name="showsale" idpr=$view[i].id}-->

    </a>



  <div class="meta">

    <h3>

    <a href="<!--{$path_url}-->/<!--{$view[i].unique_key}-->.html" title="<!--{$view[i].$name}-->">

    <!--{$view[i].$name}-->

  </a>

  </h3>

  

  
  
  <!--{if $view[i].mostview == 1}-->

  <div class="ht-price">

    <span class="new-price"><!--{$view[i].price_min|number_format:0:",":"."}--> ₫</span>
    <span class="line">-</span>
    <span class="new-price"><!--{$view[i].price_max|number_format:0:",":"."}--> ₫</span>

  </div>
  <!--{else}-->
    <div class="ht-price">

    <!--{insert name="showprice" idpr=$view[i].id}-->

  </div>
 <!--{/if}-->



</div>

</div>

</div>