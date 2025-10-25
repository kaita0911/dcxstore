<div class="main">
   <div class="container">
      <div class="bg-bred">
         <div class="productbreadcrumb">
            <ul>
               <li>
                  <a title="Trang chủ" href="<!--{$path_url}-->"><i class="fa fa-home"></i> Trang chủ</a>
               </li>
               <!--{$linkTitle}-->
            </ul>
         </div>
      </div>
      <div class="row">
         <!--{include file="left.tpl"}-->
         <div class="artseed-ftn-body col-md-9 col-sm-9 col-xs-12">
            <div class="title-page">
               <h1>
                  <!--{$seo.$name}-->
               </h1>
            </div>
            <div class="list-cate">
               <ul class="row">
                  <!--{section name=i loop=$menutopcat}-->
                  <!--{insert name="GetLinkCat" cat=$menutopcat[i]  lang=$lang  assign="linkcat" }-->
                  <li class="col-md-3 col-sm-6 col-xs-6">
                     <h2>
                        <a href="<!--{$path_url}-->/<!--{$menutopcat[i].unique_key}-->/" title="<!--{$menutopcat[i].$title_link}-->">
                           <!--{$menutopcat[i].$name}-->
                        </a>
                     </h2>
                  </li>
                  <!--{/section}-->
               </ul>
            </div>
            <!--list-cate-->
            <div class="row">
               <!--{if $CheckNull eq 0}-->
               <div class="nodate"> ##No_date## </div>
               <!--{else}-->
               <div id="viewlist" class="filter_data">
                 sssss
               </div>
               <!--{/if}--> 
               <!--{if $Checkpg eq 1 }--> 
               <div class="Clear"></div>
               <ul class="pagination" id="viewpage">
                  <!--{$linkpg}-->
               </ul>
               <!--{/if}-->         
            </div>
         </div>
         <!--contentduan-->
      </div>
   </div>
</div>
<!--artseed-home-pr-tab-->
<div class="clearfix"></div>