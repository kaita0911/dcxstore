<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>

      <div class="right_content">
         {* ====== Thanh công cụ hành động ====== *}
         <div class="divright">
            <div class="acti2">
               <button class="add" type="button" id="btnAddnew" data-comp="0">
                  <i class="fa fa-plus-circle"></i> Thêm mới
               </button>
            </div>
            <div class="acti2">
               <button class="add" type="button" id="btnDelete" data-comp="{$smarty.request.comp}">
                  <i class="fa fa-trash"></i> Xóa
               </button>
            </div>
            <!-- <div class="acti2">
               <button class="add" type="button" id="saveOrderBtn" data-comp="{$smarty.request.comp|default:0}">
                  <i class="fa fa-first-order"></i> Sắp xếp
               </button>
            </div> -->
            <div class="acti2">
               <button class="add" type="button" id="btnRefresh" data-comp="{$smarty.request.comp}">
                  <i class="fa fa-copy"></i> Copy
               </button>
            </div>
         </div>
         <div class="main-content">
            <form class="form-all" method="post" action="">
               <table class="br1">
                  <thead>
                     <tr>
                        <th align="center" class="width-del">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th align="center" class="width-order">Thứ tự</th>
                        {if $tinhnang.hinhanh == 1}
                        <th align="center" class="width-image">Hình ảnh</th>
                        {/if}

                        {if $tinhnang.masp == 1000}
                        <th align="center" class="width-image">Mã Sp</th>
                        {/if}

                        <th align="left" class="width-ttl">Tiêu đề</th>

                        {if $tinhnang.price == 1}
                        <th align="center" class="width-image">Giá</th>
                        {/if}

                        <th align="center" class="width-image">Ngày tạo</th>
                        <th align="center" class="width-image">Ngày sửa</th>

                        {if $tinhnang.new == 1}
                        <th align="center" class="width-show">Mới</th>
                        {/if}

                        {if $tinhnang.hot == 1}
                        <th align="center" class="width-show">Bán chạy</th>
                        {/if}

                        {if $tinhnang.mostview == 1}
                        <th align="center" class="width-show">Xem nhiều</th>
                        {/if}

                        <th align="center" class="width-show">Show</th>

                        <th align="center" class="width-action">Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     {foreach $articlelist as $item}
                     <tr data-id="{$item.id}">
                        <td align="center">
                           <input type="checkbox" class="c-item" name="cid[]" value="{$item.id}">
                        </td>
                        <td align="center">
                           <input type="text" class="numInput" value="{$item.num}" />
                        </td>

                        {if $tinhnang.hinhanh == 1}
                        <td align="center">
                           {if $item.img_thumb_vn neq ""}
                           <div class="c-img">
                              <img src="../{$item.img_thumb_vn}" />
                           </div>
                           {/if}
                        </td>
                        {/if}

                        {if $tinhnang.masp == 1000}
                        <td align="left">
                           {$item.code}
                        </td>
                        {/if}

                        <td align="left">
                           <span class="c-name editable-name" data-id="{$item.id}">
                              <span class="view-text">{$item.details.name|escape:'html':'UTF-8'}</span>
                              <input type="text" class="edit-input form-control" value="{$item.details.name|escape:'html':'UTF-8'}" style="display:none;">
                           </span>
                        </td>

                        {if $tinhnang.price == 1}

                        <td align="center">
                           <span class="editable-price"
                              data-id="{$item.id}"
                              contenteditable="true">
                              {$item.price.price}₫
                           </span>
                        </td>
                        {/if}

                        <td align="center">
                           {$item.dated|date_format:"%d/%m/%Y %H:%M"}
                        </td>

                        <td align="center">
                           {$item.dated_edit|date_format:"%d/%m/%Y %H:%M"}
                        </td>

                        {if $tinhnang.new == 1}
                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="{$item.id}"
                              data-active="{$item.new}"
                              data-column="new"
                              data-table="articlelist">
                              <img src="images/{$item.new}.png" alt="Trạng thái Mới" />
                           </button>
                        </td>
                        {/if}

                        {if $tinhnang.hot == 1}
                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="{$item.id}"
                              data-active="{$item.hot}"
                              data-column="hot"
                              data-table="articlelist">
                              <img src="images/{$item.hot}.png" alt="Trạng thái Hot" />
                           </button>
                        </td>
                        {/if}

                        {if $tinhnang.mostview == 1}
                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="{$item.id}"
                              data-active="{$item.mostview}"
                              data-column="mostview"
                              data-table="articlelist">
                              <img src="images/{$item.mostview}.png" alt="Trạng thái Xem nhiều" />
                           </button>
                        </td>
                        {/if}

                        <td align="center">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="{$item.id}"
                              data-active="{$item.active}"
                              data-column="active"
                              data-table="articlelist">
                              <img src="images/{$item.active}.png" alt="Hiển thị / Ẩn" />
                           </button>
                        </td>


                        <td align="center">
                           <div class="flex-btn extra-tabs">
                              {if $smarty.request.comp == 3 || $smarty.request.comp == 2 || $smarty.request.comp == 1 || $smarty.request.comp == 25}
                              <a class="act-btn btnView" href="{$web_base_url}/{$item.details.unique_key}.html"
                                 target="_blank"
                                 title="Xem nhanh">
                                 <i class="fa fa-eye"></i>
                              </a>
                              {/if}
                              <a title="Chỉnh sửa" class="act-btn btnEdit" href="index.php?do=articlelist&act=edit&id={$item.id}&comp={$smarty.request.comp}">
                                 <i class="fa fa-edit"></i>
                              </a>
                              <button title="Làm mới" type="button" class="act-btn btnUpdateNum" data-id="{$item.id}" data-comp=" {$smarty.request.comp}">
                                 <i class="fa fa-refresh"></i>
                              </button>
                              <button title="Xoá" type="button" class="act-btn btnDeleteRow" data-id="{$item.id}" data-comp="{$smarty.request.comp}"> <i class="fa fa-trash"></i> </button>
                           </div>
                        </td>
                     </tr>
                     {/foreach}
                  </tbody>
               </table>
            </form>
            <div class="pagination-wrapper">
               {$pagination nofilter}
            </div>

         </div>
      </div>
   </div>
</div>