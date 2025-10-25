<div class="bg-bred">
   <div class="container">
      <div class="title-page">
         <h1>
            <span>{$seo.name|default:''}</span>
         </h1>
      </div>
      <div class="breadcrumb">
         <ul>
            <li>
               <a title="Trang chủ" href="{$path_url|default:'#'}">
                  <i class="fa fa-home"></i>{$home|default:'Trang chủ'}
               </a>
            </li>
            {if isset($seo.menu_id)}
            {insert name="checkcatbreadcumb" idpr=$seo.menu_id}
            {/if}
         </ul>
      </div>
   </div>
</div>

<div class="clearfix"></div>

<div class="main">
   <div class="container">
      <div class="row">
         {include file="left.tpl"}
         <div class="col-md-9 col-sm-9">
            <div class="title-page">
               <h1>
                  <span>{$seo.name}</span>
               </h1>
            </div>

            <div class="page-news">
               {if $CheckNull eq 0}
               <div class="nodate">##No_date##</div>
               {else}
               <div id="viewlist">
                  {section name=i loop=$view}
                  {include file="intro/list.tpl"}
                  {/section}
               </div>
               {/if}

               <div class="clearfix"></div>

               {if $Checkpg eq 1}
               <ul class="pagination">
                  {$linkpg|default:''}
               </ul>
               {/if}
            </div>
         </div>
      </div>
   </div>
</div>