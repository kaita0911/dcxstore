<div class="conten_body">
        <div class="conten margin10">
            <div class="divtitle">
                <div class="divleft">
                    <div class="divright">
                      	<span class="subconten"><a title="Menu" href="index.php?do=categories&amp;cid=2&amp;root=1&amp;p=">		
                        	Menu 
                    	</a> </span>
                		<span class="subconten"><img style="margin-top:13px" src="images/icon.gif"></span>      
                    	<span class="subconten">
                        	<a title="Khách Hàng Liên Hệ" href="index.php?do=taovandon">Khách Hàng Liên Hệ </a>
                        </span>  
                        <span class="subconten"><img style="margin-top:13px" src="images/icon.gif"></span>      
                    	<span class="subconten">Xem Chi tiết</span>                
                    </div>
              </div>
            </div>              	
            <table  width="100%" border="0" cellspacing="15" cellpadding="0">
               
                  <tr>
                       <td width="30%"  valign="top" align="right">
                           <strong>Họ và tên</strong> 
                       </td>
                        <td valign="top" width="70%" align="left">                          
                           <input type="text" value="<!--{$edit.name|escape:"html":"UTF-8"}-->" class="InputText" />
                        </td>
                  </tr>
                  
                  <tr>
                       <td width="30%"  valign="top" align="right">
                           <strong>Điện thoại</strong> 
                       </td>
                        <td valign="top" width="70%" align="left">                          
                           <input type="text" value="<!--{$edit.phone}-->" class="InputText" />
                        </td>
                  </tr>
                  
                  <tr>
                       <td width="30%"  valign="top" align="right">
                           <strong>Email</strong> 
                       </td>
                        <td valign="top" width="70%" align="left">                          
                           <input type="text" value="<!--{$edit.email}-->" class="InputText" />
                        </td>
                  </tr>
                 
                 
                   <tr>
                       <td width="30%"  valign="top" align="right">
                           <strong>Địa chỉ</strong> 
                       </td>
                        <td valign="top" width="70%" align="left">                          
                           <input type="text" value="<!--{$edit.address}-->" class="InputText" />
                        </td>
                  </tr>
                  
                  <tr>
                       <td width="30%"  valign="top" align="right">
                           <strong>Nội dung</strong> 
                       </td>
                       
                        <td valign="top" width="70%" align="left">                          
                            <textarea class="InputTextarea"><!--{$edit.content}--></textarea>
                        </td>
                  </tr>
                  
                  
            </table>

          <div class="clear"></div>
        </div>
        
    </div>