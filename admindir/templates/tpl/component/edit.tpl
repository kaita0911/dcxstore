<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>
      <div class="right_content">
         <form name="allsubmit" id="frmEdit"
            action="index.php?do=component&act={if $smarty.request.act eq 'add'}addsm{else}editsm{/if}&id={$smarty.request.id}"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{$edit.id}" />
            <div class="divright">
               <div class="acti2">
                  <button class="add" type="submit"><i class="fa fa-save"></i> Save</button>
               </div>
            </div>
            <div class="main-content">
               <!-- ================== THÔNG TIN CƠ BẢN ================== -->
               <fieldset>
                  <legend>Thông tin cơ bản</legend>
                  <div class="box-feature">
                  </div>
                  {if $edit.motamodule eq 1}
                  {if $countlang > 1}
                  <ul class="nav nav-tabs">
                     {section name=i loop=$languages}
                     <li class="{if $languages[i].id == 1}active{/if}">
                        <a href="#tab_{$languages[i].id}" data-toggle="tab">{$languages[i].name}</a>
                     </li>
                     {/section}
                  </ul>
                  {/if}

                  <div class="tab-content">
                     {section name=i loop=$edit_name}
                     <div class="tab-pane {if $smarty.section.i.index+1 == 1}active{/if}" id="tab_{$smarty.section.i.index+1}">
                        <div class="item">
                           <div class="title">Mô tả</div>
                           <div class="meta">
                              <textarea id="editor{$smarty.section.i.index+1}"
                                 name="content_{$smarty.section.i.index+1}">{$edit_name[i].content}</textarea>
                           </div>
                        </div>
                     </div>
                     {/section}
                  </div>
                  {/if}

                  <div class="item">
                     <div class="title">Hình ảnh</div>
                     <div class="info-title">
                        {if $edit.img_vn neq ""}
                        <img height="50" src="../{$edit.img_vn}" /><br />
                        {/if}
                        <input type="file" accept="image/*" name="img_vn" id="img_vn" onchange="loadFile(event)">
                        <p class="previewimg"><img id="output" /></p>
                        <script>
                           var loadFile = function(event) {
                              document.getElementById('output').src = URL.createObjectURL(event.target.files[0]);
                           };
                        </script>
                     </div>
                  </div>

                  <!-- Tiêu đề & URL -->
                  {if $checklang gt 0}
                  {section name=i loop=$edit_name}
                  <div class="item">
                     <div class="title">Tiêu đề {$edit_name[i].code}</div>
                     <input type="text" value="{$edit_name[i].name}"
                        name="name_{$smarty.section.i.index+1}" class="InputText"
                        id="title_{$smarty.section.i.index+1}" onkeyup="ChangeToSlug{$smarty.section.i.index+1}();" />
                  </div>
                  <div class="item">
                     <div class="title">URL {$edit_name[i].code}</div>
                     <input type="text" id="slug{$smarty.section.i.index+1}"
                        value="{$edit_name[i].unique_key}"
                        name="unique_key_{$smarty.section.i.index+1}" class="InputText" />
                  </div>
                  {/section}
                  {else}
                  {section name=i loop=$languages}
                  <div class="item">
                     <div class="title">Tiêu đề {$languages[i].code}</div>
                     <input type="text" value="{$edit.name}"
                        name="name_{$languages[i].id}" class="InputText"
                        id="title_{$languages[i].id}" onkeyup="ChangeToSlug{$languages[i].id}();" />
                  </div>
                  <div class="item">
                     <div class="title">URL {$languages[i].code}</div>
                     <input type="text" id="slug{$languages[i].id}"
                        value="{$edit.unique_key}"
                        name="unique_key_{$languages[i].id}" class="InputText" />
                  </div>
                  {/section}
                  {/if}
                  <div class="item">
                     <div class="title">TYPE</div>
                     <input type="text" value="{$edit.do}" name="do" class="InputText" />
                  </div>
                  <div class="item">
                     <div class="title">Icon font</div>
                     <input type="text" value="{$edit.iconfont}" name="iconfont" class="InputText" />
                  </div>
                  <div class="item">
                     <div class="title">Thứ tự</div>
                     <input type="text" value="{$edit.num}" name="num" class="InputNum num-order" />
                  </div>

               </fieldset>

               <!-- ================== THUỘC TÍNH RIÊNG ================== -->
               <fieldset>
                  <legend>Thuộc tính riêng</legend>
                  {assign var="attrs" value=[
                  ['name'=>'nhomcon','label'=>'Nhóm con'],
                  ['name'=>'hinhanh','label'=>'Hình ảnh'],
                  ['name'=>'short','label'=>'Mô tả vắn tắt'],
                  ['name'=>'des','label'=>'Mô tả chi tiết'],
                  ['name'=>'metatag','label'=>'Meta tag'],
                  ['name'=>'nhieuhinh','label'=>'Nhiều hình'],
                  ['name'=>'masp','label'=>'Mã sản phẩm'],
                  ['name'=>'price','label'=>'Có giá'],
                  ['name'=>'priceold','label'=>'Giá cũ'],
                  ['name'=>'mausac','label'=>'Màu sắc'],
                  ['name'=>'kichthuoc','label'=>'Kích thước'],
                  ['name'=>'voucher','label'=>'Mã voucher'],
                  ['name'=>'phiship','label'=>'Phí ship'],
                  ['name'=>'new','label'=>'Mới'],
                  ['name'=>'hot','label'=>'Nổi bật'],
                  ['name'=>'mostview','label'=>'Xem nhiều'],
                  ['name'=>'viewed','label'=>'Đã xem'],
                  ['name'=>'active','label'=>'Show'],
                  ['name'=>'link_out','label'=>'Link ngoài']
                  ]}
                  <div class="box-feature">
                     {foreach $attrs as $attr}
                     {assign var="checked" value=false}
                     {if $attr.name eq 'active'}
                     {if $edit.active eq 1 || $smarty.request.act eq 'add'}{assign var="checked" value=true}{/if}
                     {else}
                     {if $edit[$attr.name] eq 1}{assign var="checked" value=true}{/if}
                     {/if}
                     <div class="item">
                        <div class="title">
                           {$attr.label}
                           <input type="checkbox" class="CheckBox" name="{$attr.name}" value="{$attr.name}" {if $checked}checked{/if} />
                        </div>
                     </div>
                     {/foreach}
                  </div>

               </fieldset>

               <!-- ================== THUỘC TÍNH CHUNG MODULE ================== -->
               <fieldset>
                  <legend>Thuộc tính chung module</legend>
                  <div class="box-feature">
                     <div class="item">
                        <div class="title"> Hình ảnh
                           <input type="checkbox" class="CheckBox" name="hinhmodule" value="hinhmodule" {if $edit.hinhmodule eq 1}checked{/if} />

                        </div>
                     </div>
                     <div class="item">
                        <div class="title"> Mô tả chung
                           <input type="checkbox" class="CheckBox" name="motamodule" value="motamodule" {if $edit.motamodule eq 1 || $smarty.request.act eq 'add' }checked{/if} />

                        </div>
                     </div>
                  </div>
               </fieldset>
            </div>
         </form>
      </div>
   </div>
</div>