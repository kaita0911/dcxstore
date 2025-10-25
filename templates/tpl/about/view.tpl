<div class="main">
   <div class="container">
      <div class="breadcumb">{include file='../breadcumb.tpl'}</div>
      <div class="clearfix"></div>
      <h1> {$c_ttl}</h1>
      <div class="artseed-ftn-body">
         <div class="content-news-main row">
            {if $CheckNull == 0}
            <div class="nodate">##No_date##</div>
            {else}
            <div id="viewlist">
               {foreach $view as $item}
               {include file="about/list.tpl"}
               {/foreach}
            </div>
            {/if}

            {if $Checkpg == 1}
            <div class="clearfix"></div>
            <div class="pagination" id="viewpage">
               {$linkpg|default:''}
            </div>
            {/if}
         </div>
      </div>
   </div>
</div>