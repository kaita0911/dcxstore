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
                  <!-- Tiêu đề & URL -->
                  <div class="item">
                     <div class="title">Tiêu đề</div>
                     <input type="text" value="{$edit.name}"
                        name="name" class="InputText"
                        id="title" />
                  </div>
                  <div class="item">
                     <div class="title">TYPE</div>
                     <input type="text" value="{$edit.do}" name="do" class="InputText" />
                  </div>
                  <div class="item">
                     <div class="title">Phân trang</div>
                     <input type="num" value="{$edit.phantrang}" name="phantrang" class="InputText" />
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
               <!-- ================== THUỘC TÍNH DANH MỤC ================== -->
               <fieldset>
                  <legend>Thuộc tính DANH MỤC</legend>

                  {assign var="attrs" value=[
                  ['name'=>'nhomcon','label'=>'Danh mục'],
                  ['name'=>'hinhdanhmuc','label'=>'Hình danh mục'],
                  ['name'=>'motadanhmuc','label'=>'Mô tả danh mục'],
                  ['name'=>'brand','label'=>'Thương hiệu']
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