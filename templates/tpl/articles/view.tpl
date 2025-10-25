<div class="main  ddd">
   <div class="container">
      <div class="breadcumb">{include file='../breadcumb.tpl'}</div>
      <div class="clearfix"></div>
      <h1> {$c_ttl}</h1>
      <div class="artseed-ftn-body">
         <div class="content-news-main row">
            {if $CheckNull == 0}
            <div class="nodate">##No_date##</div>
            {else}
            <div id="viewlist" data-ajax-load="1" data-container="viewlist" data-pagination="viewpage" data-module="{$data_url}" data-comp="{$data_comp}"></div>
            <div id="viewpage" class="pagination" data-container="viewlist" data-module="{$data_url}" data-comp="{$data_comp}"></div>

            {/if}
         </div>

      </div>
   </div>
</div>