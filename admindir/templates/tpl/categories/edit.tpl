<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>

      <div class="right_content conten">
         <form name="allsubmit" id="frmEdit" method="post" enctype="multipart/form-data"
            action="index.php?do=categories&act={if $smarty.request.act == 'add'}addsm{else}editsm{/if}&comp={$smarty.request.comp}&id={$smarty.request.id}">
            <input type="hidden" name="id" value="{$category.id}" />
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
               <ul class="nav nav-tabs" role="tablist">
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
                                 <input type="text" name="name_{$lang.id}" id="title_{$lang.id}" class="InputText title-input"
                                    value="{$categoryDetail[$lang.id].name|escape:'html':'UTF-8'}" />
                              </div>
                           </div>

                           <div class="item">
                              <div class="title">URL</div>
                              <div class="info-title">
                                 <input type="text" id="slug_{$lang.id}" name="unique_key_{$lang.id}" value="{$categoryDetail[$lang.id].unique_key}" class="InputText slug-input" />
                              </div>
                           </div>

                           <div class="item">
                              <div class="title">Mô tả chi tiết</div>
                              <div class="meta">
                                 <textarea id="editor{$lang.id}" name="content_{$lang.id}">{$categoryDetail[$lang.id].content}</textarea>
                              </div>
                           </div>

                           <div class="item">
                              <div class="title">Meta Keywords</div>
                              <div class="meta">
                                 <input name="keyword_{$lang.id}" value="{$categoryDetail[$lang.id].keyword}" data-role="tagsinput" class="InputText">
                              </div>
                           </div>

                           <div class="item">
                              <div class="title">Meta Descriptions</div>
                              <div class="meta">
                                 <textarea name="des_{$lang.id}" class="InputTextarea" id="inputDesc">{$categoryDetail[$lang.id].des}</textarea>
                                 <span id="showNumDesc" style="color:#ed1b24;">0</span>
                              </div>
                           </div>
                        </div>
                        {/foreach}
                     </div>
                     <div class="right100">
                        <div class="item">
                           <div class="title">Chọn danh mục liên quan</div>
                           <div class="selectlist extra-tabs">
                              {foreach $languages as $lang}
                              <div class="tab-pane {if $lang.id == 1}active{/if}" data-tab="tab_{$lang.id}">
                                 <ul class="category-tree">
                                    {foreach $categories as $node}
                                    {include file="categories/category_tree.tpl" node=$node selected=$categoryRelatedIds|default:[] level=0}
                                    {/foreach}
                                 </ul>
                              </div>
                              {/foreach}
                           </div>
                        </div>

                        {if $showanhdanhmuc.open == 1}
                        <div class="item">
                           <div class="title">Hình ảnh</div>
                           <div class="info-title">
                              {if $category.img_vn neq ""}
                              <img height="50" src="../{$category.img_vn}" /><br />
                              {/if}
                              <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" name="img_vn" id="img_vn" onchange="loadFile(event)">
                              <span class="Size"></span>
                              <p class="previewimg"><img id="output" /></p>
                              <script>
                                 var loadFile = function(event) {
                                    var image = document.getElementById('output');
                                    image.src = URL.createObjectURL(event.target.files[0]);
                                 };
                              </script>
                           </div>
                        </div>
                        {/if}

                        <div class="item">
                           <div class="title">Thứ Tự
                              <input type="text" name="num" value="{$category.num}" class="InputNum" />
                           </div>
                        </div>

                        <div class="item">
                           <div class="title">Show
                              <input type="checkbox" class="CheckBox" name="active" value="active"
                                 {if $category.active eq 1 || $smarty.request.act=='add' }checked{/if} />
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>