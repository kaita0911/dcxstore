<div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      <!--{include file="left.tpl"}-->
    </div>
    <div class="right_content conten">
      
      <form name="allsubmit" id="frmEdit" action="index.php?do=footer&act=<!--{if $smarty.request.act eq 'add' }-->addsm<!--{else}-->editsm<!--{/if}-->" method="post" enctype="multipart/form-data">
      <div class="col00">
        <div class="content">
          <div class="btnseo">
            <input type="hidden" name="id" value="<!--{$edit.id}-->" />
            <button type="button" onclick=" return SubmitFromGo('checkForm','hinh-anh/trung-gian');"><i class="fa fa-save"></i> Save</button>
            <a href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a>
          </div>
          <!--{if $countlang > 1 }-->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <!--{section name=i loop=$languages}-->
            <li class="<!--{if $languages[i].id == 1}-->active <!--{/if}-->">
            <a href="#tab_<!--{$languages[i].id}-->"  data-toggle="tab">
            <!--{$languages[i].name}-->
          </a>
        </li>
        <!--{/section}-->
      </ul>
      <!-- Tab panes -->
      <!--{/if}-->
      <!-- Tab panes -->
      <div class="tab-content">
        <!--{section name=i loop=$languages}-->
        <div class="tab-pane <!--{if $languages[i].id == 1}-->active <!--{/if}-->" id="tab_<!--{$languages[i].id}-->">
        <div class="left100">
          <div class="item">
            <div class="title">Tiêu đề </div>
            <div class="info-title">
              <input type="text" value="<!--{$edit.name|escape:"html":"UTF-8"}-->" name="name_<!--{$languages[i].id}-->" id="title_1" class="InputText"/>
            </div>
          </div>
          
          <div class="item">
            <div class="title">Địa chỉ</div>
            <div class="info-title">
              <input type="text" value="<!--{$edit.address}-->" name="address_<!--{$languages[i].id}-->" class="InputText"/>
            </div>
          </div>
          <!--
          <div class="item">
            <div class="title">Văn phòng</div>
            <div class="info-title">
              <input type="text" value="<!--{$edit.vanphong}-->" name="vanphong_<!--{$languages[i].id}-->" class="InputText"/>
            </div>
          </div>
          <div class="item">
            <div class="title">Mô tả thêm nếu có</div>
            <div class="meta">
              <textarea  id="editor<!--{$languages[i].id}-->" name="content_<!--{$languages[i].id}-->" ><!--{$edit.content}--></textarea>
            </div>
          </div>-->
           <div class="item">
        <div class="title">Bản đồ</div>
        <div class="info-title">
          
          <textarea class="InputTextarea"  name="map"><!--{$edit.map}--></textarea>
          
        </div>
      </div>
        </div>
        <!--left100-->
      </div>
      <!--{/section}-->
      
    </div>
    <div class="right100">
     <div class="item">
          <div class="title">Hotline</div>
          <div class="info-title">
            <input type="text" value="<!--{$edit.hotline}-->" name="hotline" class="InputText"/>
          </div>
        </div>
         <!--<div class="item">
          <div class="title">Hotline kinh doanh</div>
          <div class="info-title">
            <input type="text" value="<!--{$edit.vanphong}-->" name="vanphong" class="InputText"/>
          </div>
        </div>-->
          <div class="item">
          <div class="title">Email</div> 
          <div class="info-title">
            <input type="text" value="<!--{$edit.email}-->" name="email" class="InputText"/>
          </div>
        </div>
      <!--<div class="item">
        <div class="title">MST</div>
        <div class="info-title">
          <input type="text" value="<!--{$edit.fax}-->" name="fax" class="InputText"/>
        </div>
      </div>
      <div class="item">
        <div class="title">Thời gian làm việc</div>
        <div class="info-title">
          <input type="text" value="<!--{$edit.tax}-->" name="tax" class="InputText"/>
        </div>
      </div>-->
     
    </div>
    <!--right100-->
  </div>
</div>
</form>
<div class="clear"></div>
</div>
</div>
</div>