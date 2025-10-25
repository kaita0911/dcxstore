<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>

      <div class="right_content">
         <div class="divright">
            <div class="acti2">
               <button class="add" type="button" id="btnDelete" data-comp="0">
                  <i class="fa fa-trash"></i> Xóa
               </button>
            </div>
         </div>
         <div class="tbtitle2 main-content">
            <form name="f" id="f" method="post" action="">
               <table class="br1 order">
                  <thead>
                     <tr>
                        <th class="width-del" align="center">
                           <input type="checkbox" name="all" id="checkAll" />
                        </th>
                        <th class="width-image" align="center">Mã đơn</th>
                        <th class="width-ttl">Tiêu đề</th>
                        <th class="width-image" align="center">Ngày đặt</th>
                        <th class="width-action" align="center">Tổng tiền</th>
                        <th class="width-action" align="center">Action</th>
                     </tr>
                  </thead>

                  <tbody>
                     {foreach $view as $i => $item}
                     {assign var="class" value=($i % 2 == 0) ? 'bgno' : 'bgf2'}
                     <tr>
                        <td class="brbottom" align="center">
                           <input class="c-item" type="checkbox" name="cid[]" value="{$item.id}" />
                        </td>

                        <td class="brbottom" align="center">
                           {$item.id}
                        </td>

                        <td class="paleft brbottom">
                           {$item.name}
                        </td>

                        <td class="brbottom" align="center">
                           {$item.created_at|date_format:"%d/%m/%Y"}
                        </td>

                        <td class="brbottom" align="center">
                           {$item.totalend|number_format:0:".":","} đ
                        </td>

                        <td class="brbottom editorder" align="center">
                           <a href="index.php?do=orders&act=edit&id={$item.id}" title="Chi tiết">
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