<div class="bg-bred">
   <div class="container">
      
      <div class="breadcrumb">
         <ul>
            <li>
               <a title="Trang chủ" href="<!--{$path_url}-->"><i class="fa fa-home"></i><!--{$home}--></a>
               
            </li>
            <!--{insert name="checkcatbreadcumb" idpr=$seo.categories_id }-->
         </ul>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="main">
   <div class="container">
      <div class="row">
         <!--{include file="left.tpl"}-->
         <div class="col-md-9 col-sm-9 col-xs-12">
            
            <div class="page-news">
               <!--{if $CheckNull eq 0}-->
               <div class="nodate"> ##No_date## </div>
               <!--{else}-->
               <div id="viewlist">
                  <!--{section name=i loop=$view}-->
                  <!--{include file="service/list.tpl"}-->
                  <!--{/section}-->
               </div>
               <!--{/if}-->
               <!--{if $Checkpg eq 1 }-->
               <div class="clearfix"></div>
               <div class="pagination" id="viewpage">
                  <!--{$linkpg}-->
               </div>
               <!--{/if}-->
            </div>
         </div>
         
      </div>
   </div>
</div>