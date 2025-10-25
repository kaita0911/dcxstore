<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <!--{include file="left.tpl"}-->
      </div>
      <div class="right_content">
       
         <div class="divtitle margin5">
            <div class="divleft">
               <div class="divright link00">
                  <div class="acti2">
                     <a class="add" href="index.php?do=footer&act=add">
                     <i class="fa fa-plus-circle"></i> Thêm mới
                     </a> 
                  </div>
                  <div class="acti2">
                     <a class="del" href="javascript:void(0)" title="Delete" onclick="ChangeAction('index.php?do=footer&act=dellist');">
                     <i class="fa fa-trash"></i> Xóa
                     </a> 
                  </div>
                  
               </div>
            </div>
         </div>
         <div class="tbtitle2 link00" >
            <div class="left"></div>
            <div class="right"></div>
            <form name="f" id="f" method="post"  action="index.php?do=footer&act=dellist"  >
               <table class="br1"  style="border-bottom:0px" width="100%" border="0" cellspacing="0" cellpadding="0">

                  <tr>
                     <td width="3%" height="25" align="center" class="brbottom">
                        <input type="checkbox" onclick="checkAll();"  name="all"/>                                  
                     </td>
                    
                     <td height="25"  align="left" class="brbottom brleft paleft">
                        <strong>Tiêu đề </strong>
                     </td>
                   
                    
                     <td width="5%" height="25" align="center" class="brbottom brleft">
                        <strong>Edit</strong>
                     </td>
                  </tr>
                  <!--{section name=i loop=$view}--> 
                  <tr>
                      <td class="pa_t_b brbottom"  align="center">
                        <input type="checkbox" value="<!--{$view[i].id}-->" name="iddel[]" id="check<!--{$smarty.section.i.index}-->">
                     </td>
                     <td  align="left" class="brleft paleft pa_t_b  brbottom linkblack">
                        <!--{$view[i].name_vn}-->
                     </td>
                     <td  align="center" class="brleft pa_t_b  brbottom">
                       
                        <a href="index.php?do=footer&act=edit&id=<!--{$view[i].id}-->" title="Eidt"> 
                        <img src="images/icon3.gif"  align="center"/> Sửa
                        </a>
                        
                     </td>
                   </tr>
                  <!--{/section}-->
               </table>
            </form>
         </div>
        
         <div class="clear"></div>
      </div>
   </div>
</div>
</div>
<script language="javascript">

   
   $(document).on('click','.status_active',function(){
   
        var actived = ($(this).hasClass("btn-success")) ? '0' : '1';
   
        //var prsized = document.querySelector('input[type=radio][name=optionsize]:checked');  
   
         var msg = (actived=='0')? 'Ẩn' : 'Hiển thị';
   
        if(confirm("Bạn muốn "+ msg)){
   
          var current_element = $(this);
   
          url = "<!--{$path_admin_url}-->/ajax_active/category.php";
   
          $.ajax({
   
            type:"POST",
   
            url: url,
   
            data: {id:$(current_element).attr('data'),actived:actived},
   
            success: function(data)
   
            {   
   
              location.reload();
   
            }
   
           
   
          });
   
        }      
   
      });
   
    $(document).on('click','.status_menutren',function(){
   
        var menutren = ($(this).hasClass("btn-success")) ? '0' : '1';
   
        //var prsized = document.querySelector('input[type=radio][name=optionsize]:checked');  
   
         var msg = (menutren=='0')? 'Ẩn' : 'Hiển thị';
   
        if(confirm("Bạn muốn "+ msg)){
   
          var current_element = $(this);
   
          url = "<!--{$path_admin_url}-->/ajax_active/menutren.php";
   
          $.ajax({
   
            type:"POST",
   
            url: url,
   
            data: {id:$(current_element).attr('data'),menutren:menutren},
   
            success: function(data)
   
            {   
   
              location.reload();
   
            }
   
           
   
          });
   
        }      
   
      });
   
    $(document).on('click','.status_home',function(){
   
        var home = ($(this).hasClass("btn-success")) ? '0' : '1';
   
        //var prsized = document.querySelector('input[type=radio][name=optionsize]:checked');  
   
         var msg = (home=='0')? 'Ẩn' : 'Hiển thị';
   
        if(confirm("Bạn muốn "+ msg)){
   
          var current_element = $(this);
   
          url = "https://hieuthinh.ghekhandaixep.com/admindir/ajax_active/pr_cat_home.php";
   
          $.ajax({
   
            type:"POST",
   
            url: url,
   
            data: {id:$(current_element).attr('data'),home:home},
   
            success: function(data)
   
            {   
   
              location.reload();
   
            }
   
           
   
          });
   
        }      
   
      });
   
</script>