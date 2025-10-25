<div id="wapperContent" class="bgtrang"> 
    <div class="WapperGroup group">
        <div class="PanalRight w81">
        	<div class="Breadcrumb">        	
                <div class="BreadcrumbText">
                    <a title="Trang chủ" href="<!--{$path_url}-->/">Trang chủ</a>
                </div>
                <!--{$linkTitle}-->
                <div class="breadcrumbs_sepa">&nbsp;</div>
                <div class="BreadcrumbTextEnd">
                    <!--{$seo.$name}-->
                </div>
            </div>
        </div>
        
        <div class="MailTitle">
            <h1 class="Title">
                <a href="<!--{$UrlLink}-->" title="<!--{$seo.$title_link}-->">
                    <!--{$seo.$name}-->
                </a>
            </h1>
            <div class="Homepage">
                <a rel="nofollow" class="Pre"></a>
                <a rel="nofollow" class="Next"></a>
            </div>	
        </div>
        
        <div class="main-branch">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr class="trtop">
                    <td class="bgnew3"> Chi nhánh </td>
                    <td class="bgnew3"> Tên </td>
                    <td class="bgnew3"> Địa chỉ </td>
                    <td class="bgnew3"> Điện thoại </td>
                  </tr>
                  <!--{section name=i loop=$view}-->
                      <tr <!--{if $view[i].map neq ''}--> onclick="window.open('<!--{$view[i].map}-->','_blank')" <!--{/if}-->>
                        <td> <!--{$view[i].chinhanh}--> </td>
                        <td> <!--{$view[i].name}--> </td>
                        <td> <!--{$view[i].address}--> </td>
                        <td> <!--{$view[i].phone}--> </td>
                      </tr>
                  <!--{/section}-->
                  
            </table>

        </div>
            
    </div>  
</div>