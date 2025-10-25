<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>
      <div class="right_content">
         <form name="allsubmit" id="ArticleForm"
            action="index.php?do=articlelist&act={if $smarty.request.act eq 'add'}addsm{else}editsm{/if}&comp={$smarty.request.comp}"
            method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="{$edit.id|default:0}" />
            <div class="divright">
               <div class="acti2">
                  <button class="add" type="submit"><i class="fa fa-save"></i> Save</button>
               </div>
               <div class="acti2">
                  <a class="add" href="javascript:history.go(-1)"><i class="fa fa-mail-reply"></i> Trở về</a>
               </div>
            </div>
            <div class="main-content">
               <ul class="nav nav-tabs">
                  {foreach $languages as $lang}
                  <li data-tab="tab_{$lang.id}" class="{if $lang.id == 1}active{/if}">
                     {$lang.name}
                  </li>
                  {/foreach}
               </ul>
               <div class="tab-content">
                  <div class="wrap-main">
                     <div class="left100 main-tabs">
                        {foreach $languages as $lang}
                        <div class="tab-pane {if $lang.id == 1}active{/if}" data-tab="tab_{$lang.id}">
                           <div class="item">
                              <div class="title">Tiêu đề</div>
                              <div class="info-title">
                                 <input type="text" id="title_{$lang.id}" name="name_{$lang.id}"
                                    class="InputText title-input" />
                              </div>
                           </div>
                           <div class="item">
                              <div class="title">URL</div>
                              <div class="info-title">
                                 <input type="text" id="slug_{$lang.id}" name="unique_key_{$lang.id}"
                                    class="InputText slug-input" />
                              </div>
                           </div>
                           <!-- {if $checkthuoctinh > 0}
                  {foreach $thuoctinh as $tt}
                  <div class="item">
                     <div class="title">{$tt.name}</div>
                     <div class="info-title">
                        <input type="text" name="tt_{$tt.properties_id}_{$lang.id}_thuoctinh"
                           {if $tinhnang.id==75}class="InputPrice autoNumeric" {/if}>
                        <input type="hidden" name="tt_{$tt.properties_id}_{$lang.id}_idthuoctinh" value="{$tt.properties_id}">
                     </div>
                  </div>
                  {/foreach}
                  {/if} -->

                           {if $tinhnang.short == 1}
                           <div class="item">
                              <div class="title">Mô tả ngắn</div>
                              <textarea name="short_{$lang.id}" id="short{$lang.id}"></textarea>
                           </div>
                           {/if}

                           {if $tinhnang.des == 1}
                           <div class="item">
                              <div class="title">Mô tả chi tiết</div>
                              <textarea name="content_{$lang.id}" id="editor{$lang.id}"></textarea>
                           </div>
                           {/if}

                           {if $tinhnang.metatag == 1}
                           <div class="item">
                              <div class="title">Meta Keywords</div>
                              <input type="text" name="keyword_{$lang.id}" value="{$edit.keyword|default:''}" data-role="tagsinput" class="InputText">
                           </div>
                           <div class="item">
                              <div class="title">Meta Descriptions</div>
                              <textarea name="des_{$lang.id}" class="InputTextarea" id="inputDesc"></textarea>
                              <span id="showNumDesc" style="color:#ed1b24;">0</span>
                           </div>
                           {/if}
                        </div>
                        {/foreach}
                     </div>
                     <div class="right100">
                        {if $tinhnang.masp == 1}
                        <div class="item">
                           <div class="title">Mã sản phẩm</div>
                           <input type="text" name="code" class="InputText">
                        </div>
                        {/if}
                        {if $tinhnang.link_out == 1}
                        <div class="item">
                           <div class="title">Link</div>
                           <input type="text" name="link_out" class="InputText">
                        </div>
                        {/if}

                        {if $tinhnang.hinhanh == 1}
                        <div class="item">
                           <div class="title">Hình ảnh</div>
                           <div class="info-title">
                              {if $edit.img_thumb_vn neq ""}
                              <!-- Ảnh cũ -->
                              <img id="current-img" src="../{$edit.img_thumb_vn}" height="60" style="display:block; margin-bottom:8px;">
                              {/if}

                              <label for="img_thumb_vn" class="custom-upload">
                                 <i class="fa fa-upload"></i> Upload image
                              </label>
                              <!-- Input chọn ảnh -->
                              <input type="file"
                                 accept="image/png,image/gif,image/jpeg,image/jpg"
                                 name="img_thumb_vn"
                                 id="img_thumb_vn">

                              <!-- Preview ảnh mới -->
                              <p class="previewimg" style="margin-top:8px;">
                                 <img id="preview-img" style="max-height:150px; display:none;">
                              </p>
                           </div>
                        </div>
                        {/if}

                        {if $tinhnang.nhieuhinh == 1}
                        <div class="item">
                           <div class="title">Upload multi images</div>
                           <label for="multiimages" class="custom-upload">
                              <i class="fa fa-upload"></i> Upload multi images
                           </label>
                           <input type="file" id="multiimages" name="multiimages[]" multiple accept="image/*">
                           <div class="preview-gallery"></div>

                        </div>
                        {/if}

                        <!-- {if $tinhnang.kichthuoc == 1}
                     <div class="item">
                        <div class="title">
                           <input type="checkbox" id="togglePrice" {if $edit.mostview eq 1}checked{/if}> Phân giá theo loại
                        </div>
                        <div id="box-size-more">
                           <div class="distance-price">
                              <input type="text" name="price-min" value="{$edit.price_min|default:''}" class="InputPrice autoNumeric">
                              <span>-</span>
                              <input type="text" name="price-max" value="{$edit.price_max|default:''}" class="InputPrice autoNumeric">
                           </div>
                           <div id="inputContainer"></div>
                           <div class="addInput" onclick="addTwoInputs()">Thêm loại và giá</div>
                           <input type="hidden" name="countsize" id="count-size">
                        </div>
                     </div>
                     {/if} -->
                        {if $tinhnang.price == 1}
                        <div class="item">
                           <div class="title">Giá</div>
                           <input type="text" name="price" class="InputPrice" />
                        </div>
                        {/if}

                        {if $tinhnang.priceold == 1}
                        <div class="item">
                           <div class="title">Giá cũ</div>
                           <input type="text" name="priceold" class="InputPrice" />
                        </div>
                        {/if}

                        {if $tinhnang.nhomcon == 1}
                        <div class="item">
                           <div class="title">Danh mục sản phẩm</div>
                           <div class="selectlist extra-tabs">
                              {foreach $languages as $lang}
                              <div class="tab-pane {if $lang.id == 1}active{/if}" data-tab="tab_{$lang.id}">
                                 <ul class="category-tree">
                                    {foreach $categories as $node}
                                    {include file="articlelist/category_tree.tpl" node=$node selected=$categoryRelatedIds|default:[] level=0}
                                    {/foreach}
                                 </ul>
                              </div>
                              {/foreach}
                           </div>
                        </div>
                        {/if}

                        {if $tinhnang.new == 1}
                        <div class="item">
                           <div class="title">
                              Mới <input type="checkbox" class="CheckBox" name="new" />
                           </div>
                        </div>
                        {/if}

                        {if $tinhnang.hot == 1}
                        <div class="item">
                           <div class="title">
                              Nổi bật <input type="checkbox" class="CheckBox" name="hot" />
                           </div>
                        </div>
                        {/if}
                        {if $tinhnang.mostview == 1}
                        <div class="item">
                           <div class="title">
                              Xem nhiều <input type="checkbox" class="CheckBox" name="mostview" />
                           </div>
                        </div>
                        {/if}
                        <div class="item">
                           <div class="title">Show</div>
                           <input type="checkbox" name="active" value="active" {if $edit.active eq 1 || $smarty.request.act eq 'add' }checked{/if}>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>