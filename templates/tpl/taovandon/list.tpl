 <div class="conten_body">
   <div class="conten">
        <div class="divtitle">
            <div class="divleft">
                <div class="divright">
                	<span class="subconten"><a title="Menu" href="index.php?do=categories&amp;cid=2&amp;root=1&amp;p=">		
                        Menu 
                    </a> </span>
                	<span class="subconten"><img style="margin-top:13px" src="images/icon.gif"></span>      
                    <span class="subconten">Khách Hàng Liên Hệ</span>           
                </div>
          </div>
        </div>
        <div class="raised"> 
            <b class="top"><b class="b1"></b><b class="b2"></b><b class="b3"></b><b class="b4"></b></b>           
            <div class="boxcontent">
            
          </div>
            <b class="top"><b class="b4"></b><b class="b3"></b><b class="b2"></b><b class="b1"></b></b>
        </div>
         <div class="divtitle margin5">
            <div class="divleft">
                <div class="divright link00">
                    
                    <span style="float:left">
                        <strong>Tác Dụng:</strong> 
                    </span>
                     
                     <!--{if $checkPer3 eq "true" }--> 
                        <div class="acti2"><img src="images/delete.png" /> 
                           <a href="javascript:void(0)" title="Delete" onclick="ChangeAction('index.php?do=taovandon&act=dellist&cid=<!--{$smarty.request.cid}-->&city=<!--{$smarty.request.city}-->&type=<!--{$smarty.request.type}-->');">
                                Xóa
                            </a> 
                        </div>
                      <!--{else}-->  
                         <div class="acti2"><img src="images/delete-no.png" /> 
                           <a>
                                Xóa
                            </a> 
                        </div>
                     <!--{/if}--> 
                    
                    
              </div>
            </div>
        </div>
      <div class="tbtitle2 link00" >
        <div class="left"></div> 
          <div class="right"></div>
         <form name="f" id="f" method="post"  action="index.php?do=taovandon&act=dellist&cid=1&city=<!--{$smarty.request.city}-->&type=<!--{$smarty.request.type}-->">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                        <table class="br1"  style="border-bottom:0px" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="3%" height="25" align="center" class="brbottom">
                                	<input type="checkbox" onclick="checkAll();"  name="all"/>                                  
                                </td>
                                
                                <td width="4%" height="25" align="center" class="brbottom brleft">
                                    <strong>STT</strong>
                                </td>
                                
                                <td height="25"  align="center" class="brbottom brleft">
                                    <strong> Date </strong>
                                </td>
                                
                                <td  height="25"  align="center" class="brbottom brleft">
                                    <strong> Họ và Tên </strong>
                                </td>
                                
                                <td height="25"  align="center" class="brbottom brleft">
                                    <strong> Tiêu đề </strong>
                                </td>
                                
                                <td height="25"  align="center" class="brbottom brleft">
                                    <strong> Điện Thoại </strong>
                                </td>
                                
                                <td height="25"  align="center" class="brbottom brleft">
                                    <strong> Email </strong>
                                </td>
                                
                                <td width="7%" height="25" align="center" class="brbottom brleft">
                                    <strong> Xem CT</strong>
                                </td>
                          </tr>
                         
                          <!--{section name=i loop=$view}--> 
                            <!--{if $smarty.section.i.index%2 eq 0}-->
                               <!--{assign var="class" value="bgno"}--> 
                            <!--{else}-->
                                <!--{assign var="class" value="bgf2"}-->
                           <!--{/if}-->      
                        <tr class="<!--{cycle values='bgno,bgf2'}-->"  onmouseout="this.className='<!--{$class}-->'" onmouseover="this.className='bgonmose'" id="g<!--{$view[i].mspid}-->">
                          
                            <td class="pa_t_b brbottom"  align="center">
                               <input type="checkbox" value="<!--{$view[i].id}-->" name="iddel[]" id="check<!--{$smarty.section.i.index}-->">
                            </td>
                            <td  align="center" class="brleft pa_t_b  brbottom">
                                <!--{$smarty.section.i.index+1+$number}-->
                            </td>
                             <td  align="left" class="brleft paleft pa_t_b  brbottom linkblack">
                             	<!--{$view[i].dated}-->
                            </td>
                            <td  align="left" class="brleft paleft pa_t_b  brbottom linkblack">
                             	 <!--{$view[i].name}-->
                            </td>
                            <td  align="left" class="brleft paleft pa_t_b  brbottom linkblack">
                             	 <!--{$view[i].title}-->
                            </td>
                            
                            <td  align="left" class="brleft paleft pa_t_b  brbottom linkblack">
                             	 <!--{$view[i].phone}-->
                            </td>
                            
                            <td  align="left" class="brleft paleft pa_t_b  brbottom linkblack">
                             	 <!--{$view[i].email}-->
                            </td>
                            
                                                        
                            <td  align="center" class="brleft paleft pa_t_b  brbottom">
                                <div class="acti">
                                    <img src="images/icon3.gif"  align="left"/> 
                                      <a href="index.php?do=taovandon&act=edit&id=<!--{$view[i].id}-->&city=<!--{$smarty.request.city}-->&type=<!--{$smarty.request.type}-->"> 
                                         Xem
                                      </a>
                                 </div> 
                            </td>
                          </tr> 
                         <!--{/section}--> 
                                                        
                      </table>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        
                    </td>
                  </tr>
                </table>
             </form>
      </div>
      
      <div class="tbtitle2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="25" align="left">&nbsp;&nbsp;<strong>Tổng Số <!--{$total}--> Trang</strong></td>
                <td height="25" align="right" class="link00"><!--{$link_url}-->&nbsp;&nbsp;</td>
              </tr>
          </table>
        </div> 
        
      <div class="clear"></div>
    </div>
    
</div>

