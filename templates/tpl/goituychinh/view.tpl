<div class="artseed-main">
	<div class="container content-why">
       <!--{if $bannercon.id neq ''}-->
            <a <!--{if $bannercon.link neq ''}-->href="<!--{$bannercon.link}-->"<!--{/if}--> title="<!--{$bannercon.title_link}-->">	
                <img class="img-responsive imgcat" src="<!--{$path_url}-->/<!--{$bannercon.img_vn}-->" alt="<!--{$bannercon.alt_img}-->" class="img-responsive"/>
            </a>
        <!--{/if}-->
        <div class="productbreadcrumb">
            <ul>
                <li>
                    <a href="<!--{$path_url}-->" title="Trang chủ">Trang chủ</a>
                </li>
                <!--{$linkTitle}-->
            </ul>
        </div>  
        <div class="clearfix"></div>
       
            <div class="pagecontac">
                <div class="title-page"><h1><!--{$seo.$name}--></h1></div>
                
                <div class="conent-news-main">
                 	
                    <div class="contact-form row">
                   
                    <div class="form-left col-md-6 col-sm-6 col-xs-12">
                        <form  name="formcontact" action="" method="post" class="form-contact">
                            <input type="text" name="name" id="name" class="form-text" placeholder="Nhập họ tên: (*)" />
                            <input type="text" name="phone" id="phone" class="form-text" placeholder="Nhập số điện thoại: (*)" />
                            <input type="text" name="email" id="email" class="form-text" placeholder="Nhập địa chỉ email: (*)" />
                            <input type="text" name="title" id="title" class="form-text" placeholder="Nhập tiêu đề:" value="<!--{$namesp}-->" />
                            <textarea name="message" id="message" class="form-textarea" placeholder="Nhập nội dung: (*)"></textarea>
                            
                        </form>
                        <div id="txtmsg"></div>
                        <span id="contact-see-all">
                            <div class="contact-send">	
                                <a title="Gửi thông tin" href="javascript:void(0)" onclick="return cforms_validate();"><strong>Gửi thông tin</strong></a>
                            </div> 
                            <div class="contact-send">	
                                <a title="Xóa thông tin" href="javascript:void(0)" onclick="return resetfrm();"><strong>Xóa thông tin</strong></a>
                            </div>
                        </span>
                        
                        <script language="javascript">
                            function resetfrm(){	
								$('#name').val('');
								$('#phone').val('');
								$('#email').val('');
								$('#title').val('');
								$('#message').val('');
							}
                            function cforms_validate(){	
                                var name = $('#name');
 
                                var phone = $('#phone');
                                var email = $('#email');
                                var message = $('#message');
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
            </div>

    </div>
</div>