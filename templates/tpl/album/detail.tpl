<div class="bg-bred">
  <div class="container">
    <div class="title-page-detail">
      <h1><!--{$detail.name}--> </h1>
    </div>
    <div class="productbreadcrumb">
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
  <div class="container">
    <div class="row">
      <div class="artseed-ftn-body col-md-12 col-sm-12 col-xs-12">
        <div class="pagewhite">
          <div class="row">
            <div class="listalbum">
              <!--{section name=i loop=$viewgallery}-->
              <div class="item"><a class="fancybox_ablum" data-fancybox-group="gallery" href="<!--{$path_url}-->/<!--{$viewgallery[i].img_vn}-->" title="<!--{$viewgallery[i].$name}-->">
              <img src="<!--{$path_url}-->/<!--{$viewgallery[i].img_vn}-->" class="img-responsive" alt="<!--{$viewgallery[i].$name}-->"/>
            </a></div>
            <!--{/section}-->
            
          </div>
        </div>
        <script type="text/javascript">$(document).ready(function() {$('.fancybox_ablum').fancybox();});</script>
        
        
        
        
        
        
        <!--<div class="ngaydang">
          <i class="fa-regular fa-calendar-days"></i> <!--{$date.dated|date_format:"%d/%m/%Y"}-->
        </div>-->
        <div class="fb-like" data-href="<!--{$path_url}--><!--{$smarty.server.REQUEST_URI}-->" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        <br />
        <div class="clearfix"></div>
        <div class="artseed-detail-content">
          <!--{$detail.content}-->
        </div>
        <div class="clearfix"></div>
        <div class="news_related">
          <div class="news_title_related">
            <h2>Thông tin khác</h2>
          </div>
          <ul>
            <!--{section name=i loop=$view}-->
            
            <!--{insert name="getNewrelated" idpr=$view[i].id}-->
            <!--{/section}-->
          </ul>
        </div>
        <!--page_news-->
      </div>
    </div>
    <!--artseed-ftn-body-->
    <!--{include file="right_.tpl"}-->
  </div>
</div>
</div>
</div>