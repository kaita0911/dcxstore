<div class="contentmain">
   <div class="main">
      <!-- Sidebar -->
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>
      <!-- Main content -->
      <div class="right_content">
         <!-- Action buttons -->
         <div class="divright">
            <div class="acti2">
               <a class="add" href="index.php?do=component&act=add">
                  <i class="fa fa-plus-circle"></i> Thêm mới
               </a>
            </div>
         </div>
         <div class="main-content">
            <!-- Component Table -->
            <form name="f" id="f" method="post" action="index.php?do=component&act=dellist">
               <table class="br1" cellspacing="0" cellpadding="0">
                  <thead>
                     <tr>
                        <th align="center" class="width-del"><input type="checkbox" onclick="checkAll();" name="all" /></th>
                        <th align="center" class="width-order">Thứ tự</th>
                        <th class="width-image left">Type</th>
                        <th class="width-ttl">Tiêu đề</th>
                        <th class="width-show">Show</th>
                        <th class="width-action">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     {foreach $view as $item}
                     <tr>
                        <td align="center">
                           <input type="checkbox" value="{$item.id}" name="iddel[]" />
                        </td>
                        <td align="center">
                           <input type="text" name="ordering[]" class="InputOrder" value="{$item.num}" size="2">
                           <input type="hidden" name="id[]" value="{$item.id}" />
                        </td>
                        <td class="paleft">{$item.do}</td>
                        <td class="paleft">{$item.name}</td>
                        <td align="center" class="hidden-xs">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="{$item.id}"
                              data-active="{$item.active}"
                              data-column="active"
                              data-table="component">
                              <img src="images/{$item.active}.png" alt="Show/Hide">
                           </button>
                        </td>
                        <td align="center">
                           <div class="flex-btn">
                              <a class="act-btn btnEdit" href="index.php?do=component&act=edit&id={$item.id}" title="Edit"><i class="fa fa-edit"></i></a>
                           </div>
                        </td>
                     </tr>
                     {/foreach}
                  </tbody>
               </table>
            </form>
         </div>

      </div>
   </div>
</div>