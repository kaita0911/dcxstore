<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>
      <div class="right_content conten">
         <div class="tbtitle2 link00">
            <form id="f" method="post" action="index.php?do=infos&act=dellist&cid=1">
               <table class="br1" style="border-bottom:0" width="100%" cellspacing="0" cellpadding="0">
                  <thead>
                     <tr>
                        <th class="width-order">Thứ tự</th>
                        <th class="width-ttl">Tiêu đề</th>
                        {if $smarty.session.admin_artseed_username == 'kaita'}
                        <th class="width-show">Show</th>
                        <th class="width-show">Kích hoạt</th>
                        {/if}
                        <th class="width-action">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     {foreach $view as $index => $item}
                     <tr>
                        <td align="center" class="brbottom">{$index+1+$number}</td>
                        <td class="paleft brbottom linkblack">{$item.name_vn|escape}</td>
                        {if $smarty.session.admin_artseed_username == 'kaita'}
                        <td align="center" class="brbottom">
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="{$item.id}"
                              data-active="{$item.active}"
                              data-column="active"
                              data-table="infos">
                              <img src="images/{$item.active}.png" alt="Show/Hide">
                           </button>
                        </td>
                        <td align="center" class="brbottom">
                           {if in_array($item.id, [2,12,13,14,15,16,19,20,21,22,23,24,25,26,27,28,30])}
                           <button type="button"
                              class="btn_checks btn_toggle"
                              data-id="{$item.id}"
                              data-active="{$item.open}"
                              data-column="open"
                              data-table="infos">
                              <img src="images/{$item.open}.png" alt="Show/Hide">
                           </button>
                           {/if}
                        </td>
                        {/if}

                        <td align=" center" class="brbottom">
                           <div class="flex-btn">
                              <a class="act-btn btnEdit" href="index.php?do=infos&act=edit&comp={$smarty.request.comp}&id={$item.id}" title="Sửa">
                                 <i class="fa fa-edit"></i>
                              </a>
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