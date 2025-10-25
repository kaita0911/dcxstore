<div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      <!--{include file="left.tpl"}-->
    </div>
    <div class="right_content conten">
      
      <form name="allsubmit" id="frmEdit" action="index.php?do=footer&act=<!--{if $smarty.request.act eq 'add' }-->addsm<!--{else}-->editsm<!--{/if}-->&id=<!--{$smarty.request.id}-->" method="post" enctype="multipart/form-data">
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
      <div class="tab-content">
        <!--{section name=i loop=$edit_name}-->
        <div class="tab-pane <!--{if $smarty.section.i.index+1 == 1}-->active <!--{/if}-->" id="tab_<!--{$smarty.section.i.index+1}-->">
        <div class="left100">
          <div class="item">
            <div class="title">Tiêu đề</div>
            <div class="info-title">
              <input type="text" value="<!--{$edit_name[i].name|escape:"html":"UTF-8"}-->" name="name_<!--{$smarty.section.i.index+1}-->" class="InputText" id="title_<!--{$smarty.section.i.index+1}-->" onkeyup="ChangeToSlug<!--{$smarty.section.i.index+1}-->();"/>
            </div>
          </div>
          <div class="item">
            <div class="title">Địa chỉ</div>
            <div class="info-title">
              <input type="text" value="<!--{$edit_name[i].address}-->" name="address_<!--{$smarty.section.i.index+1}-->" class="InputText"/>
            </div>
          </div>
          <!--<div class="item">
            <div class="title">Văn phòng</div>
            <div class="info-title">
              <input type="text" value="<!--{$edit_name[i].vanphong}-->" name="vanphong_<!--{$smarty.section.i.index+1}-->" class="InputText"/>
            </div>
          </div>
          
          <div class="item">
            <div class="title">Mô tả thêm nếu có</div>
            <div class="meta">
              <textarea  id="editor<!--{$smarty.section.i.index+1}-->" name="content_<!--{$smarty.section.i.index+1}-->" ><!--{$edit_name[i].content}--></textarea>
            </div>
          </div>-->
          <div class="item">
            <div class="title">Bản đồ</div>
            <div class="info-title">
              
              <textarea class="InputTextarea"  name="map"><!--{$edit.map}--></textarea>
              
            </div>
          </div>
          
          </div><!--left100-->
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
        <!--
        <div class="item">
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
        </div>
        -->
      </div>
      <!--right100-->
    </div>
  </div>
</form>
<div class="clear"></div>
</div>
</div>
</div>