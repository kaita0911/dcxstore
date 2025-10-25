<div class="bg-bred ">
  <div class="container">
    <div class="breadcrumb">
      <ul>
        <li>
          <a title="Trang chủ" href="<!--{$path_url}-->"><i class="fa fa-home"></i>
          <!--{$home}-->
        </a>
      </li>
      <!--{insert name="checkbreadcumb" idpr=$detail.articlelist_id}-->
      <li>
        <span>
          <!--{$detail.name}--><!--{$detail.name}-->
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
         <!--{include file="left.tpl"}-->
         <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
            <div class="title-page">
                  <h1><!--{$detail.name}--> </h1>
               </div>
            <div class="pagewhite">
              
      
               <div class="artseed-detail-content">
                  <!--{$detail.content}-->
               </div>
               <div class="clearfix"></div>
               <div class="news_related">
                  <div class="news_title_related">
                     <h2>##Tinlienquan##</h2>
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
        
      </div>
   </div>
</div>
</div>