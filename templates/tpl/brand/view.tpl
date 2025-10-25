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
         <!--{include file="left_.tpl"}-->
         <div class="col-md-12 col-sm-12">
             <div class="title-page">
         <h1>
         <span>
            <!--{$seo.name}-->
         </span>
         </h1>
      </div>
            <!--{if $CheckNull eq 0}-->
            <div class="nodate"> ##No_date## </div>
            <!--{else}-->
            <div id="viewlist" class="row5">
               <!--{section name=i loop=$view}-->
               <!--{include file="brand/list.tpl"}-->
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
      <!--contentduan-->
   </div>
</div>
<!--artseed-home-pr-tab-->
<div class="clearfix"></div>