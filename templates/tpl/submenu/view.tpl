         
    <div class="artseed-home-content">
        
        <div class="container content-why">
        <div class="productbreadcrumb">
            
            <ul>
                <li>
                    <a href="<!--{$path_url}-->" title="Trang chủ">Trang chủ</a>
                </li>
                <!--{$linkTitle}-->
            </ul>
        </div>  
        <div class="clearfix"></div>   
        <div class="row">
            <!--{include file="right_.tpl"}-->
            <div class="artseed-ftn-body col-md-12 col-sm-12 col-xs-12">
                <div class="artseed-title-pr-pagein"><h1><span><!--{$seo.$name}--></span></h1></div>
                
                <div class="row">
                    <!--{if $CheckNull eq 0}-->
                        <div class="nodate"> ##No_date## </div>
                    <!--{else}-->
                        <span id="showPg">
                            <!--{section name=i loop=$view}-->
                                <!--{include file="gallery/list.tpl"}-->
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
            </div><!--contentduan-->
            </div>
        </div>
    </div><!--artseed-home-pr-tab-->
    <div class="clearfix"></div>
