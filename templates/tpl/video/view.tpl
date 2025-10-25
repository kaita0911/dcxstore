<div class="main">
	<div class="container">
    	
        <div class="productbreadcrumb">
            <ul>
                <li>
                    <a href="<!--{$path_url}-->" title="Trang chủ">Trang chủ</a>
                </li>
                <!--{$linkTitle}-->
            </ul>
        </div>  
        <div class="clearfix"></div>
       
            <div class="artseed-ftn-body">
                <div class="title-page"><h1><!--{$seo.$name}--></h1></div>
                <div class="conent-news-main row">
                    <!--{if $CheckNull eq 0}-->
                        <div class="nodate"> ##No_date## </div>
                    <!--{else}-->
                        <span id="showPg">
                            <!--{section name=i loop=$view}-->
                                <!--{include file="video/list.tpl"}-->
                            <!--{/section}-->
                        </span>
                    <!--{/if}--> 

                    <!--{if $Checkpg eq 1 }--> 
                        <div class="Clear"></div>
                        <div class="pagination" id="showPaging">
                            <!--{$linkpg}-->
                        </div>
                    <!--{/if}-->        
                      
                </div>  
          
            
        </div>
    </div>
</div>