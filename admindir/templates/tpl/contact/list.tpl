<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>

      <div class="right_content">
         <div class="divright">
            <div class="acti2">
               <div class="acti2">
                  <button class="add" type="button" id="btnDelete" data-comp="0">
                     <i class="fa fa-trash"></i> Xóa
                  </button>
               </div>
            </div>
         </div>
         <div class="tbtitle2 main-content">
            <form id="f" name="f"
               method="post"
               action="index.php?do=contact&act=dellist&cid=1&city={$smarty.request.city}&type={$smarty.request.type}">
               <table class="br1">
                  <thead>
                     <tr>
                        <th class="width-del" align="center">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th class="width-order" align="center">Thứ tự</th>
                        <th class="width-ttl" align="left">Tiêu đề</th>
                        <th class="width-image" align="center">Ngày tháng</th>
                        <th class="width-show" align="center">Chi tiết</th>
                     </tr>
                  </thead>

                  <tbody>
                     {foreach $view as $i => $item}
                     <tr data-id="{$item.id}">
                        <td align="center" class="brbottom">
                           <input type="checkbox" name="cid[]" value="{$item.id}">
                        </td>
                        <td align="center" class="brbottom">
                           {$i+1+$number}
                        </td>
                        <td align="left" class="paleft brbottom">
                           {$item.name|escape}
                        </td>
                        <td align="center" class="brbottom">
                           {$item.dated|escape}
                        </td>
                        <td align="center" class="brbottom">
                           <img src="images/icon3.gif" alt="Chi tiết" />
                           <a href="index.php?do=contact&act=edit&id={$item.id}&city={$smarty.request.city}&type={$smarty.request.type}">
                              Chi tiết
                           </a>
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