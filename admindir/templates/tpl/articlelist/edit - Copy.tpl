<div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      <!--{include file="left.tpl"}-->
    </div>
    <div class="right_content conten margin10">
      <form name="allsubmit" id="frmEdit" action="index.php?do=articlelist&act=<!--{if $smarty.request.act eq 'add' }-->addsm<!--{else}-->editsm<!--{/if}-->&comp=<!--{$smarty.request.comp}-->" method="post" enctype="multipart/form-data">
        <div class="col00">
          <div class="content">
            <div class="btnseo">
              <input type="hidden" name="id" id="id" value="<!--{$edit.id}-->" />
              <button type="button" onclick=" return SubmitFromGo('articlelist','hinh-anh/san-pham');"><i class="fa fa-save"></i> Save</button>
              <a href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a>
            </div>
            <!--{if $countlang > 1 }-->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <!--{section name=i loop=$languages}-->
              <li class="<!--{if $languages[i].id == 1}-->active <!--{/if}-->"><a href="#tab_<!--{$languages[i].id}-->" data-toggle="tab"><!--{$languages[i].name}--></a></li>
              <!--{/section}-->
            </ul>
            <!--{/if}-->
            <div class="left100">
              <div class="itemurl">
                <div class="item">
                  <div class="title">URL</div>
                  <div class="info-title"><input type="text" id="slug1" value="<!--{$edit.unique_key}-->" name="unique_key_1" class="InputText" /></div>
                </div>
              </div>
              <div class="tab-content">
                <!--{section name=i loop=$edit_name}-->
                <div class="tab-pane <!--{if $smarty.section.i.index+1 == 1}-->active <!--{/if}-->" id="tab_<!--{$smarty.section.i.index+1}-->">

                  <div class="item itemname">
                    <div class="title">Tiêu đề</div>
                    <div class="info-title">
                      <input type="text" value="<!--{$edit_name[i].name|escape:" html":"UTF-8"}-->" name="name_<!--{$smarty.section.i.index+1}-->" class="InputText" id="title_<!--{$smarty.section.i.index+1}-->" onkeyup="ChangeToSlug<!--{$smarty.section.i.index+1}-->();"/>
                    </div>
                  </div>
                  <!--{$listinput}-->

                  <!--{if $check_count_thuoctinh gt 0}-->
                  <!--{if $checkthuoctinh_edit gt 0}-->
                  <!--{section name=j loop=$namethuoctinh}-->
                  <div class="item">
                    <div class="title"><!--{$namethuoctinh[j].name}--></div>

                    <!--{section name=k loop=$thuoctinh_edit}-->
                    <!--{if $thuoctinh_edit[k].properties_id == $namethuoctinh[j].properties_id}-->
                    <div class="info-title">
                      <input type="text" value="<!--{$thuoctinh_edit[k].value}-->" name="tt_<!--{$namethuoctinh[j].properties_id}-->_<!--{$smarty.section.i.index+1}-->_thuoctinh">
                      <input type="hidden" value='<!--{$namethuoctinh[j].properties_id}-->' name="tt_<!--{$namethuoctinh[j].properties_id}-->_<!--{$smarty.section.i.index+1}-->_idthuoctinh">
                    </div>
                    <!--{/if}-->
                    <!--{/section}-->

                  </div>
                  <!--{/section}-->
                  <!--{else}-->
                  <!--{section name=j loop=$thuoctinh}-->
                  <div class="item sss">
                    <div class="title">
                      <!--{$thuoctinh[j].name}-->
                    </div>
                    <div class="info-title">
                      <input type="text" name="tt_<!--{$thuoctinh[j].properties_id}-->_<!--{$languages[i].id}-->_thuoctinh">
                      <input type="hidden" value='<!--{$thuoctinh[j].properties_id}-->' name="tt_<!--{$thuoctinh[j].properties_id}-->_<!--{$languages[i].id}-->_idthuoctinh">
                    </div>
                  </div>
                  <!--{/section}-->
                  <!--{/if}-->


                  <!--{/if}-->
                  <!--{if $tinhnang.short ==1}-->
                  <div class="item">
                    <div class="title">Mô tả ngắn</div>
                    <div class="meta">
                      <textarea id="short<!--{$smarty.section.i.index+1}-->" name="short_<!--{$smarty.section.i.index+1}-->"><!--{$edit_name[i].short}--></textarea>
                    </div>
                  </div>
                  <!--{/if}-->
                  <!--{if $tinhnang.des ==1}-->
                  <div class="item">
                    <div class="title">Mô tả chi tiết</div>
                    <div class="meta">
                      <textarea id="editor<!--{$smarty.section.i.index+1}-->" name="content_<!--{$smarty.section.i.index+1}-->"><!--{$edit_name[i].content}--></textarea>
                    </div>
                  </div>
                  <!--{/if}-->
                  <!--{if $tinhnang.metatag ==1}-->
                  <div class="item">
                    <div class="title">Meta Keywords</div>
                    <div class="meta"><input name='keyword_<!--{$smarty.section.i.index+1}-->' value='<!--{$edit_name[i].keyword}-->' data-role="tagsinput" class="InputText"></div>
                  </div>
                  <div class="item">
                    <div class="title">Meta Descriptions</div>
                    <div class="meta">
                      <textarea name="des_<!--{$smarty.section.i.index+1}-->" class="InputTextarea" id="inputDesc"><!--{$edit_name[i].des}--></textarea>
                      <span id="showNumDesc" style="color:#ed1b24;">0</span>
                    </div>
                  </div>
                  <!--{/if}-->

                </div>
                <!--{/section}-->
              </div>
            </div>
            <div class="right100">
              <!--{if $tinhnang.hinhanh ==1}-->
              <div class="item">
                <div class="title">Hình đại diện</div>
                <div class="info-title uploadimage">
                  <!--{if $edit.img_thumb_vn neq ""}-->
                  <img height="50" src="../<!--{$edit.img_thumb_vn}-->" /><br />
                  <!--{/if}-->

                  <p><input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" name="img_thumb_vn" id="img_thumb_vn" onchange="loadFile(event)" style="display: none;"></p>
                  <p><label for="img_thumb_vn" style="cursor: pointer;"><i class="fa fa-upload"></i> Upload Image</label></p>

                  <p><img id="output" width="70" /></p>

                  <script>
                    var loadFile = function(event) {
                      var image = document.getElementById('output');
                      image.src = URL.createObjectURL(event.target.files[0]);
                    };
                  </script>
                </div>
              </div>
              <!--{/if}-->
              <!--{if $tinhnang.nhieuhinh ==1}-->
              <div class="item">
                <div class="title">Hình liên quan của sản phẩm</div>
                <div class="info-title">
                  <div class="se-updla">

                    <label for="multiimages">
                      <i class="fa fa-upload"></i>
                      <span>Upload Images</span>
                      <p>(Có thể upload nhiều hình cùng lúc)</p>
                      <input type="file" id="multiimages" name="multiimages[]" accept="image/png, image/gif, image/jpeg, image/jpg" multiple />
                    </label>
                    <div id="gallery_multiimages">
                    </div>
                  </div>
                  <script>
                    $(document).ready(function() {
                      if (window.File && window.FileList && window.FileReader) {
                        $("#multiimages").on("change", function(e) {
                          var files = e.target.files,
                            filesLength = files.length;
                          for (var i = 0; i < filesLength; i++) {
                            var f = files[i]
                            var fileReader = new FileReader();
                            fileReader.onload = (function(e) {
                              var file = e.target;
                              $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\">x</span>" +
                                "</span>").insertAfter("#multiimages");
                              $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                              });
                            });
                            fileReader.readAsDataURL(f);
                          }
                          console.log(files);
                        });
                      } else {
                        alert("Your browser doesn't support to File API")
                      }
                    });
                  </script>
                  <!--{section name=i loop=$multiimages}-->

                  <label class="pip">
                    <input type="checkbox" name="checkdelimage[]" value="<!--{$multiimages[i].id}-->" />

                    <img width="65" height="65" class="imageThumb" src="../<!--{$multiimages[i].img_vn}-->">
                    <span class="checkmark">x</span>
                  </label>
                  <!--{/section}-->
                </div>

                <script>
                  $(document).ready(function() {
                    $(".remove").click(function() {
                      $(this).parent(".pip").remove();
                    });



                  });
                </script>


              </div>
              <!--{/if}-->
              <!--{if $tinhnang.new ==1}-->
              <div class="item">
                <div class="title">
                  Mới<input type="checkbox" class="CheckBox" name="new" value="new" <!--{if $edit.new eq 1}-->checked<!--{/if}--> />
                </div>
              </div>
              <!--{/if}-->

              <!--{if $tinhnang.hot ==1}-->
              <div class="item">
                <div class="title">
                  Nổi bật<input type="checkbox" class="CheckBox" name="hot" value="hot" <!--{if $edit.hot eq 1}-->checked<!--{/if}--> />
                </div>
              </div>
              <!--{/if}-->
              <!--{if $tinhnang.mostview ==1}-->
              <div class="item">
                <div class="title">
                  Xem nhiều<input type="checkbox" class="CheckBox" name="mostview" value="mostview" <!--{if $edit.mostview eq 1}-->checked<!--{/if}--> />
                </div>
              </div>
              <!--{/if}-->
              <!--{if $tinhnang.price ==1}-->
              <div class="item">
                <div class="title">Giá</div>
                <input type="text" value="<!--{$editprice.price}-->" name="prices" class="InputPrice autoNumeric" />
              </div>
              <!--{/if}-->
              <!--{if $tinhnang.priceold ==1}-->
              <div class="item">
                <div class="title">Giá cũ</div>
                <input type="text" value="<!--{$editprice.priceold}-->" name="priceolds" class="InputPrice autoNumeric" />
              </div>
              <!--{/if}-->
              <!--{if $tinhnang.nhomcon ==1}-->
              <!--{if $checkcatdm > 0}-->
              <div class="item">
                <div class="title">Danh mục</div>
                <div class="selectlist">
                  <!--{insert name="checkcatesp" idpr=$edit.id idcomp=$edit.comp}-->
                </div>
              </div>
              <!--{/if}-->
              <!--{/if}-->




              <!--{if $tinhnang.kichthuoc ==1}-->
              <div class="item itemsize">
                <div class="title">Chọn Size</div>
                <div class="info-title">
                  <!--{insert name="checksize" idpr=$edit.id}-->
                </div>
              </div>
              <!--{/if}-->
              <!--{if $tinhnang.mausac ==1}-->
              <div class="item itemsize">
                <div class="title">Chọn màu sắc</div>
                <div class="info-title">
                  <!--{insert name="checkColor" idpr=$edit.id}-->
                </div>
              </div>
              <!--{/if}-->
              <div class="item">
                <div class="title"><span>Số Thứ Tự</span> <input type="text" value="<!--{$edit.num}-->" name="num" class="InputNum num-order" /> </div>
              </div>

              <div class="item">
                <div class="title">
                  Show <input type="checkbox" class="CheckBox" name="active" value="active" <!--{if $edit.active eq 1 || $smarty.request.act eq 'add' }-->checked<!--{/if}--> />
                </div>
              </div>

            </div>
            <!--right100-->
          </div>
        </div>
        <div class="clear"></div>
    </div>
  </div>
  </form>
</div>
<script type="text/javascript" src="js/autoNumeric.js"></script>
<script>
  $('.autoNumeric').autoNumeric('init', {
    aSep: '.',
    aDec: 'none'
  });
</script>