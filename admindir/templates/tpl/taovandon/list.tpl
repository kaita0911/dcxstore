







 <div class="contentmain">

 <div class="main">

    <div class="left_sidebar padding10">

         <!--{include file="left.tpl"}-->

      </div>

   <div class="right_content conten">

        

        <div class="divtitle margin5">

            <div class="divleft">

               <div class="divright link00">

                 

                  <div class="acti2">

                     <a class="del" href="javascript:void(0)" title="Delete" onclick="ChangeAction('index.php?do=taovandon&act=dellist');">

                     <i class="fa fa-trash"></i> Xóa

                     </a> 

                  </div>

                 

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

                                <td width="5%" height="25" align="center" class="brbottom">

                                	<input type="checkbox" onclick="checkAll();"  name="all"/>                                  

                                </td>

                                

                                <td width="5%" height="25" align="center" class="brbottom brleft">

                                    <strong>STT</strong>

                                </td>

                                

                                <td width="10%" height="25"  align="center" class="brbottom brleft">

                                    <strong> Date </strong>

                                </td>

                                

                                <td  width="73%" height="25"  align="left" class="paleft brbottom brleft">

                                    <strong> Họ và Tên </strong>

                                </td>

                                

                               

                                

                           
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

                             <td  align="center" class="brleft paleft pa_t_b  brbottom linkblack">

                             	<!--{$view[i].dated}-->

                            </td>

                            <td  align="left" class="brleft paleft pa_t_b  brbottom linkblack">

                             	 <!--{$view[i].name}-->

                            </td>

                        

                     

                            

                                                        

                            <td  align="center" class="brleft paleft pa_t_b  brbottom">

                                <div class="acti">

                                    <img src="images/icon3.gif"  align="left"/> 

                                      <a href="index.php?do=taovandon&act=edit&id=<!--{$view[i].id}-->"> 

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

      

    

      <div class="clear"></div>

    </div>

    

</div>

</div>



