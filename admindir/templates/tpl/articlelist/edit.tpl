<div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      {include file="left.tpl"}
    </div>

    <div class="right_content">
      <form id="ArticleForm" name="allsubmit"
        action="index.php?do=articlelist&act={if $smarty.request.act == 'add'}addsm{else}editsm{/if}&comp={$smarty.request.comp}{$page_para}"
        method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="{$articlelist.id}" />
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
                    value="{$articlelistDetail.name|escape:'html':'UTF-8'}"
                    class="InputText title-input" required />
                </div>
              </div>
              <div class="item">
                <div class="title">URL</div>
                <div class="info-title">
                  <input type="text" id="slug" name="unique_key" value="{$articlelistDetail.unique_key}" class="InputText slug-input" />
                </div>
              </div>
              {if $tinhnang.short == 1}
              <div class="item">
                <div class="title">Mô tả ngắn</div>
                <div class="meta">
                  <textarea id="short" name="short">{$articlelistDetail.short}</textarea>
                </div>
              </div>
              {/if}
              {if $tinhnang.des == 1}
              <div class="item">
                <div class="title">Mô tả chi tiết</div>
                <div class="meta">
                  <textarea id="editor" name="content">{$articlelistDetail.content}</textarea>
                </div>
              </div>
              {/if}

              {if $tinhnang.metatag == 1}
              <div class="item">
                <div class="title">Meta Keywords</div>
                <div class="meta">
                  <input name="keyword" value="{$articlelistDetail.keyword}" data-role="tagsinput" class="InputText" />
                </div>
              </div>
              <div class="item">
                <div class="title">Meta Descriptions</div>
                <div class="meta">
                  <textarea name="des" class="InputTextarea" id="inputDesc">{$articlelistDetail.des}</textarea>
                  <span id="showNumDesc" style="color:#ed1b24;">0</span>
                </div>
              </div>
              {/if}
            </div>



            <div class="right100">
              {if $tinhnang.masp == 1}
              <div class="item">
                <div class="title">Mã sản phẩm</div>
                <div class="info-title">
                  <input type="text" name="code" id="code" class="InputText" value="{$articlelist.code}" />
                </div>
              </div>
              {/if}
              {if $tinhnang.link_out == 1}
              <div class="item">
                <div class="title">Link</div>
                <div class="info-title">
                  <input type="text" name="link_out" id="link_out" class="InputText" value="{$articlelist.link_out}" />
                </div>
              </div>
              {/if}

              {if $tinhnang.hinhanh == 1}
              <div class="item">
                <div class="title">Hình ảnh</div>
                <div class="info-title">
                  {if $articlelist.img_thumb_vn neq ""}
                  <!-- Ảnh cũ -->
                  <img id="current-img" src="../{$articlelist.img_thumb_vn}" height="60" style="display:block; margin-bottom:8px;">
                  {/if}

                  <label for="img_thumb_vn" class="custom-upload">
                    <i class="fa fa-upload"></i> Upload image
                  </label>
                  <!-- Input chọn ảnh -->
                  <input type="file"
                    accept="image/png,image/gif,image/jpeg,image/jpg"
                    name="img_thumb_vn"
                    id="img_thumb_vn" class="img-thumb-input">

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
                <div class="gallery-upload">
                  <label for="multiimages" class="custom-upload">
                    <i class="fa fa-upload"></i> Upload multi images
                  </label>
                  <input type="file" name="multiimages[]" id="multiimages" accept="image/png, image/jpeg, image/jpg, image/gif" multiple>
                  <div class="preview-gallery">
                    {foreach $multiimages as $img}
                    <div class="gallery-item" data-id="{$img.id}" data-num="{$img.num}">
                      <img src="../{$img.img_vn}" />
                      <div class="overlay">
                        <button type="button" class="remove-image" data-id="{$img.id}">&times;</button>
                      </div>
                      <input type="hidden" name="id_old[]" value="{$img.id}">
                      <input type="hidden" name="num_old[]" value="{$img.num}">
                    </div>
                    {/foreach}
                  </div>
                </div>
              </div>
              {/if}

              {if $tinhnang.price == 1}
              <div class="item">
                <div class="title">Giá</div>
                <input type="text" name="price" class="InputPrice" value="{$articlelistPrice.price}" />
              </div>
              {/if}

              {if $tinhnang.priceold == 1}
              <div class="item">
                <div class="title">Giá cũ</div>
                <input type="text" name="priceold" class="InputPrice" value="{$articlelistPrice.priceold}" />
              </div>
              {/if}

              {if $tinhnang.nhomcon == 1 && $checkcatdm > 0}
              <div class="item">
                <div class="title">Danh mục sản phẩm</div>
                <div class="selectlist">
                  <ul class="category-tree">
                    {foreach $categories as $node}
                    {include file="articlelist/category_tree.tpl" node=$node selected=$selected|default:[] level=0}
                    {/foreach}
                  </ul>
                </div>
              </div>
              {/if}
              {if $tinhnang.brand == 1}
              <div class="item">
                <div class="title">Thương hiệu</div>
                <div class="selectlist">
                  <ul class="category-tree">
                    {foreach $brands as $node}
                    <label> <input type="radio" name="brand_id" value="{$node.id}"
                        {if $node.id==$selectedBrandId}checked{/if}>
                      {$node.detail_name|escape:'html':'UTF-8'}</label>
                    {/foreach}
                  </ul>
                </div>
              </div>
              {/if}

              <div class="item">
                <div class="title">
                  <span>Thứ tự</span>
                  <input type="text" name="num" class="InputNum" value="{$articlelist.num}" />
                </div>
              </div>
              {if $tinhnang.new == 1}
              <div class="item">
                <div class="title">
                  Mới <input type="checkbox" class="CheckBox" name="new" value="new" {if $articlelist.new==1}checked{/if} />
                </div>
              </div>
              {/if}

              {if $tinhnang.hot == 1}
              <div class="item">
                <div class="title">
                  Nổi bật <input type="checkbox" class="CheckBox" name="hot" value="hot" {if $articlelist.hot==1}checked{/if} />
                </div>
              </div>
              {/if}
              {if $tinhnang.mostview == 1}
              <div class="item">
                <div class="title">
                  Xem nhiều<input type="checkbox" class="CheckBox" name="mostview" value="mostview" {if $articlelist.mostview==1}checked{/if} />
                </div>
              </div>
              {/if}
              <div class="item">
                <div class="title">
                  Hiển thị <input type="checkbox" class="CheckBox" name="active" value="acive" {if $articlelist.active==1}checked{/if} />
                </div>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<!-- 
{* ==== SCRIPTS ==== *}
<script src="js/autoNumeric.js"></script>
<script>
  function loadFile(event) {
    document.getElementById('output').src = URL.createObjectURL(event.target.files[0]);
  }
  $('.autoNumeric').autoNumeric('init', {
    aSep: '.',
    aDec: 'none'
  });
  const checkbox = document.getElementById('togglePrice');
  const target = document.getElementById('box-size-more');
  if (checkbox) {
    target.style.display = checkbox.checked ? 'block' : 'none';
    checkbox.addEventListener('change', () => {
      target.style.display = checkbox.checked ? 'block' : 'none';
    });
  }
</script> -->