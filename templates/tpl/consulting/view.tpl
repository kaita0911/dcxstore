 <div class="bg-bred">
   <div class="container">
     
         <div class="productbreadcrumb">
            <ul>
               <li>
                  <a title="Trang chủ" href="<!--{$path_url}-->"><i class="fa fa-home"></i><!--{$home}--></a>
               </li>
                <!--{insert name="checkcatbreadcumb" idpr=$seo.categories_id }-->   
            </ul>
         </div>
      </div>
   </div>
<div class="main">
   <div class="container">
     
      <div class="clearfix"></div>
      
         <!--{include file="left_.tpl"}-->
         <div class="artseed-ftn-body">
            
            <div class="conent-news-main row">
               <!--{if $CheckNull eq 0}-->
               <div class="nodate"> ##No_date## </div>
               <!--{else}-->
               <div id="viewlist">
                  <!--{section name=i loop=$view}-->
                  <!--{include file="intro/list.tpl"}-->
                  <!--{/section}-->
               </div>
               <!--{/if}--> 
               <!--{if $Checkpg eq 1 }--> 
               <div class="Clear"></div>
               <div class="pagination" id="viewpage">
                  <!--{$linkpg}-->
               </div>
               <!--{/if}-->        
            </div>
         </div>
      
   </div>
</div>