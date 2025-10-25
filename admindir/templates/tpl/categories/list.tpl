<div class="contentmain">
  <div class="main">
    <div class="left_sidebar padding10">
      {include file="left.tpl"}
    </div>
    <div class="right_content">
      <div class="divright">
        <div class="acti2">
          <button class="add" type="button" id="btnAddnew" data-comp="{$smarty.request.comp|default:0}">
            <i class="fa fa-plus-circle"></i> Thêm mới
          </button>
        </div>
        <div class="acti2">
          <button class="add" type="button" id="btnDelete">
            <i class="fa fa-trash"></i> Xóa
          </button>
        </div>
        <div class="acti2">
          <button class="add" type="button" id="saveOrderBtn" data-comp="{$smarty.request.comp|default:0}">
            <i class="fa fa-first-order"></i> Sắp xếp
          </button>
        </div>
      </div>
      <div class="main-content">
        {* Tab language ngoài table *}
        <ul class="nav nav-tabs" role="tablist">
          {foreach $languages as $lang}
          <li data-tab="tab_{$lang.id}" class="{if $lang.id == 1}active{/if}">
            {$lang.name}
          </li>
          {/foreach}
        </ul>
        <div class="tab-content main-tabs">
          <form class="form-all" id="categoryForm" method="post" action="" enctype="multipart/form-data">
            <table class="br1 catelist" width="100%" cellspacing="0" cellpadding="0" style="border-bottom:0">
              <thead>
                <tr>
                  <th class="width-del">
                    <input type="checkbox" name="all" id="checkAll" />
                  </th>
                  <th class="width-order">Thứ tự</th>
                  <th class="width-image">Hình ảnh</th>
                  <th class="width-ttl">Tiêu đề</th>
                  <th class="width-show">Home</th>
                  <th class="width-show">Show</th>
                  <th class="width-action">Action</th>
                </tr>
              </thead>
              <tbody>
                {foreach $categories as $category}
                {* Chỉ hiển thị cột title của ngôn ngữ hiện tại *}
                {include file="categories/category_row_lang.tpl" category=$category lang=$lang level=0}
                {/foreach}
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>