      <div class="bg-bred">
        <div class="container">
         
         <div class="breadcrumb">
            <ul>
               <li>
                  <a title="Trang chủ" href="<!--{$path_url}-->"><i class="fa fa-home"></i> <!--{$home}--></a>
               </li>
               <li>
                  <a title="Liên hệ" href="<!--{$path_url}-->/lien-he/"><span> <!--{$contact}--></span></a>
               </li>
            </ul>
         </div>
      </div>
    </div>
      <div class="clearfix"></div>
<div class="main">
   <div class="container">

      <div class="pagecontact">
         
         <div class="row">
             <div class="conent-news-main col-md-6 col-sm-6 col-xs-12">
               <div class="title-page">
            <h1>
               <!--{$contact}-->
            </h1>
         </div>
            <div class="contact-form">
               <div class="form-right">
                  <h2><!--{$Footer.name}--></h2>
                  <br>
                  <p>##Address## :<!--{$Footer.address}--></p>
                  <p>##Phone## :<!--{$gioithieuFooter.hotline}--></p>
                  <p>##Email## :<!--{$gioithieuFooter.email}--></p>
                  
                
               </div>
               <div class="form-left">
                  <form  name="formcontact" action="" method="post" class="form-contact">
                     <input type="text" name="name" id="name" class="form-text" placeholder="Họ tên" />
                     <input type="text" name="phone" id="phone" class="form-text" placeholder="Điện thoại" />
                     <input type="text" name="email" id="email" class="form-text" placeholder="Email" />
                     <!--<input type="text" name="title" id="title" class="form-text" placeholder="Tiêu đề" value="<!--{$namesp}-->" />-->
                     <textarea name="message" id="content" class="form-textarea" placeholder="Nội dung"></textarea>
                  </form>
                  <div id="txtmsg"></div>
                  <div id="contact-see-all">
               
                        <a title="Gửi" href="javascript:void(0)" onclick="return cforms_validate();">Gửi</a>
                 
                    
                        <a title="Xóa" href="javascript:void(0)" onclick="return resetfrm();">Xóa</a>
                     
                  </div>
                  <script language="javascript">
                     function resetfrm(){   
                     
                     $('#name').val('');
                     
                     $('#phone').val('');
                     
                     $('#email').val('');
                     
                     /*$('#title').val('');*/
                     
                     $('#content').val('');
                     
                     }
                     
                     function cforms_validate(){    
                     
                         var name = $('#name');
                     
                     
                     
                         var phone = $('#phone');
                     
                         var email = $('#email');
                     
                         var message = $('#content');
                     
                         var r = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                     
                         
                     
                         $('#txtmsg').hide();
                     
                         if(name.val()==""){
                     
                             $('#txtmsg').show(200);
                     
                             $('#txtmsg').html('Vui lòng nhập họ tên.');
                     
                             name.focus();
                     
                             return false;
                     
                         }
                     
                         
                     
                         else if(phone.val()==""){
                     
                             $('#txtmsg').show(200);
                     
                             $('#txtmsg').html('Vui lòng nhập số điện thoại.');
                     
                             phone.focus();
                     
                             return false;
                     
                         }
                     
                         
                     
                         else if(email.val()==""){
                     
                             $('#txtmsg').show(200);
                     
                             $('#txtmsg').html('Vui lòng nhập địa chỉ email.');
                     
                             email.focus();
                     
                             return false;
                     
                         }
                     
                         else if(r.test(email.val())==false){
                     
                             $('#txtmsg').show();
                     
                             $('#txtmsg').html('Địa chỉ email không dúng định dạng');
                     
                             email.focus();
                     
                             return false;
                     
                         }
                     
                         else if(message.val()==""){
                     
                             $('#txtmsg').show(200);
                     
                             $('#txtmsg').html('Vui lòng nhập nội dung');
                     
                             message.focus();
                     
                             return false;
                     
                         }
                     
                         else{
                     
                             $('#txtmsg').hide(200);
                     
                             $('#contact-see-all').html('<img src="<!--{$path_url}-->/ajax-loader.gif" />');
                     
                             document.formcontact.submit();
                     
                         }
                     
                     }
                     
                  </script>
               </div>
            </div>
         </div>
         <div class="map col-md-6 col-sm-6 col-xs-12">
            <!--{$map.googlemap}-->
         </div>
         </div>
        
      </div>
   </div>
</div>