<div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      {include file="left.tpl"}
    </div>

    <div class="right_content ">
      <form name="allsubmit" id="frmEdit"
        action="index.php?do=footer&act={if $smarty.request.act eq 'add'}addsm{else}editsm{/if}"
        method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="{$edit.id}" />
        <div class="divright">
          <div class="acti2">
            <button class="add" type="submit"><i class="fa fa-save"></i> Save</button>
          </div>
          <div class="acti2"><a class="add" href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a></div>
        </div>

        <div class="main-content">
          <div class="wrap-main">


            <div class="left100">
              <div class="item">
                <div class="title">Tiêu đề</div>
                <div class="info-title">
                  <input type="text" name="name" class="InputText" />
                </div>
              </div>

              <div class="item">
                <div class="title">Địa chỉ</div>
                <div class="info-title">
                  <input type="text" name="address" class="InputText" />
                </div>
              </div>
              <!-- <div class="item">
                <div class="title">Văn phòng</div>
                <div class="info-title">
                  <input type="text" name="vanphong" class="InputText" />
                </div>
              </div> -->

              <div class="item">
                <div class="title">Mô tả thêm nếu có</div>
                <div class="meta">
                  <textarea id="editor" name="content"></textarea>
                </div>
              </div>


              <div class="item">
                <div class="title">Bản đồ</div>
                <div class="info-title">
                  <textarea class="InputTextarea" name="map"></textarea>
                </div>
              </div>
            </div>
            <div class="right100">
              <div class="item">
                <div class="title">Hotline</div>
                <div class="info-title">
                  <input type="text" name="hotline" value="{$edit.hotline|escape:'html':'UTF-8'}" class="InputText" />
                </div>
              </div>

              <div class="item">
                <div class="title">Email</div>
                <div class="info-title">
                  <input type="text" name="email" value="{$edit.email|escape:'html':'UTF-8'}" class="InputText" />
                </div>
              </div>


              <!-- <div class="item">
                <div class="title">MST</div>
                <div class="info-title">
                  <input type="text" name="fax" value="{$edit.fax}" class="InputText" />
                </div>
              </div>

              <div class="item">
                <div class="title">Thời gian làm việc</div>
                <div class="info-title">
                  <input type="text" name="tax" value="{$edit.tax}" class="InputText" />
                </div>
              </div> -->

            </div>
            <!-- right100 -->
          </div>
        </div>
      </form>
    </div>
  </div>
</div>