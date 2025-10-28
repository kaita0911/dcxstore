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
                        <th class="width-ttl" align="left">Tiêu đề</th>
                        <th class="width-image" align="center">Ngày tháng</th>
                        <th class="width-action" align="center">Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     {foreach $view as $item}
                     <tr data-id="{$item.id}">
                        <td align="center" class="brbottom">
                           <input class="c-item" type="checkbox" name="cid[]" value="{$item.id}">
                        </td>

                        <td align="left" class=" brbottom">
                           {$item.name|escape}
                        </td>
                        <td align="center" class="brbottom">
                           {$item.dated|escape}
                        </td>
                        <td align="center" class="brbottom">

                           <a href="index.php?do=contact&act=edit&id={$item.id}&comp={$smarty.request.comp}">
                              Chi tiết
                           </a>
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