<div class="wraptop">
	<div class="container">
    	<div class="row10">
      		<!--{include file="left.tpl"}-->
        	<div class="f-ctn-body padding10">
                <div class="productbreadcrumb">
                    <ul>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<!--{$path_url}-->" title="Trang chủ">Trang chủ</a>
                        </li>
                        <!--{$linkTitle}-->
                    </ul>
                </div>
          		<div class="clearfix"></div>
              	<div class="box-pr">
              		<div class="tit-pr-home"><h1><!--{$seo.$name}--></h1></div>
              		<div class="content-pr-cate">
                		<!--{if $CheckNull eq 0}-->
                            <div class="nodate"> ##No_date## </div>
                        <!--{else}-->
                            <ul id="showPg">
                                <!--{section name=i loop=$view}-->
                                    <!--{include file="products/list.tpl"}-->
                                <!--{/section}-->
                            </ul>
                        <!--{/if}--> 
                        <!--{if $Checkpg eq 1 }--> 
                            <div class="clearfix"></div>
                            <div class="pagination" id="showPaging">
                                <!--{$linkpg}-->
                            </div>
                        <!--{/if}-->             	
              		</div>
         		</div>
       		</div>
    	</div>
  	</div>
</div>