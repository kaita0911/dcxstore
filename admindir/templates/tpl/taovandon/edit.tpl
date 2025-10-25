<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         <!--{include file="left.tpl"}-->
      </div>
      <div class="right_content conten">
         <div class="left100">
            <div class="item">
               <div class="title">Họ tên</div>
               <div class="meta">
                  <input type="text" value="<!--{$edit.name|escape:"html":"UTF-8"}-->" class="InputText" />
               </div>
            </div>
            <div class="item">
               <div class="title">Điện thoại</div>
               <div class="meta">
                  <input type="text" value="<!--{$edit.phone}-->" class="InputText" />
               </div>
            </div>
            <div class="item">
               <div class="title">Email</div>
               <div class="meta">
                  <input type="text" value="<!--{$edit.email}-->" class="InputText" />
               </div>
            </div>
            <div class="item">
               <div class="title">Nội dung</div>
               <div class="meta">
                 <textarea class="InputTextarea"><!--{$edit.content}--></textarea>
               </div>
            </div>
            <p class="slss"><a href="index.php?do=taovandon" title="Trở về"><i class="fa fa-rotate-left"></i> Trở về</a></p>
         </div>
         
      </div>
   </div>
</div>
