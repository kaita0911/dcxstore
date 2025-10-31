<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>

      <div class="right_content conten">
         <form name="allsubmit" id="frmEdit"
            action="index.php?do=categories&act={if $smarty.request.act eq 'add'}addsm{else}editsm{/if}&comp={$smarty.request.comp}"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="comp" value="{$smarty.request.comp|default:0}">
            <div class="divright">
               <div class="acti2">
                  <button type="submit" class="add">
                     <i class="fa fa-save"></i> Save
                  </button>
               </div>
               <div class="acti2">
                  <a class="add" href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a>
               </div>

            </div>
            <div class="main-content">
               <div class="wrap-main">
                  <div class="left100">
                     <div class="item">
                        <div class="title">Tiêu đề</div>
                        <div class="info-title">
                           <input type="text" name="name" id="title"
                              class="InputText title-input" required />
                        </div>
                     </div>
                     <div class="item">
                        <div class="title">URL</div>
                        <div class="info-title">
                           <input type="text" id="slug" name="unique_key"
                              class="InputText slug-input" />
                        </div>
                     </div>

                     <div class="item">
                        <div class="title">Mô tả chi tiết</div>
                        <div class="meta">
                           <textarea id="editor" name="content"></textarea>
                        </div>
                     </div>

                     <div class="item">
                        <div class="title">Meta Keywords</div>
                        <div class="meta">
                           <input name="keyword" value="{$edit.keyword|default:''}" data-role="tagsinput" class="InputText">
                        </div>
                     </div>

                     <div class="item">
                        <div class="title">Meta Descriptions</div>
                        <div class="meta">
                           <textarea name="des" class="InputTextarea" id="inputDesc"></textarea>
                           <span id="showNumDesc" style="color:#ed1b24;">0</span>
                        </div>
                     </div>

                  </div>
                  <div class="right100">
                     {if $categories|@count > 0}
                     <div class="item">
                        <div class="title">Danh mục</div>
                        <div class="selectlist">
                           <ul class="category-tree">
                              {foreach $categories as $node}
                              {include file="categories/category_tree.tpl" node=$node selected=$categoryRelatedIds|default:[] level=0}
                              {/foreach}
                           </ul>
                        </div>
                     </div>
                     {/if}
                     {if $tinhnang.hinhdanhmuc == 1}
                     <div class="item">
                        <div class="title">Hình ảnh</div>

                        <div class="info-title">
                           {if $articlelist.img_thumb_vn neq ""}
                           <!-- Ảnh cũ -->
                           <img id="current-img" src="../{$edit.img_vn}" height="60" style="display:block; margin-bottom:8px;">
                           {/if}

                           <label for="img_vn" class="custom-upload">
                              <i class="fa fa-upload"></i> Upload image
                           </label>
                           <!-- Input chọn ảnh -->
                           <input type="file"
                              accept="image/png,image/gif,image/jpeg,image/jpg"
                              name="img_vn"
                              id="img_vn" class="img-thumb-input">

                           <!-- Preview ảnh mới -->
                           <p class="previewimg" style="margin-top:8px;">
                              <img id="preview-img" style="max-height:150px; display:none;">
                           </p>
                        </div>
                     </div>
                     {/if}
                     <div class="item">
                        <div class="title">
                           Show <input type="checkbox" class="CheckBox" name="active" value="active"
                              {if $edit.active eq 1 || $smarty.request.act eq 'add' }checked{/if} />
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </form>
      </div>
   </div>
</div>