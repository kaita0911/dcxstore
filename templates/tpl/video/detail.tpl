<div class="artseed-main">
	<div class="container content-why">
    	<div class="productbreadcrumb">
            <ul>
                <li>
                    <a href="<!--{$path_url}-->" title="Trang chủ">Trang chủ</a>
                </li>
                <!--{$linkTitle}-->
            </ul>
        </div>      
        <div class="row">
            <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
                <div class="title-page"><h1><!--{$detail.$name}--></h1></div>
                 <div class="artseed-detail-content">
                     <iframe width="100%" height="350" src="https://www.youtube.com/embed/<!--{$detail.mavideo}-->" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                 </div>
                 <div class="news_related">
                    <div class="news_title_related"><h2>Video liên quan</h2></div>
 					<div class="row">
                        
                        <span id="showPg">
                            <!--{section name=i loop=$view}-->
                            	<!--{include file="video/list.tpl"}-->
                            <!--{/section}-->
                        </span>
                        <!--{if $Checkpg eq 1 }--> 
                            <div class="Clear"></div>
                            <div class="pagination" id="showPaging">
                                <!--{$linkpg}-->
                            </div>
                        <!--{/if}-->         
                    </div>
                  </div><!--page_news--> 
                
            </div><!--artseed-ftn-body-->
            <!--{include file="right.tpl"}-->
        </div>
    </div>
</div>