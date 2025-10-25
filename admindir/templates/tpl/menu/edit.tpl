<div class="contentmain">
   <div class="main">
      <div class="left_sidebar padding10">
         {include file="left.tpl"}
      </div>
      <div class="right_content">
         <form id="formId"
            action="index.php?do=menu&act={if $smarty.request.act=='add'}addsm{else}editsm{/if}&comp={$smarty.request.comp}"
            method="post"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="{$edit.id|default:''}">

            <div class="divright">
               <div class="acti2">
                  <button class="add" type="submit">
                     <i class="fa fa-save"></i> Save
                  </button>
               </div>
               <div class="acti2">
                  <a class="add" href="javascript:history.back()">
                     <i class="fa fa-mail-reply"></i> Trở về
                  </a>
               </div>
            </div>

            <div class="main-content">
               <ul class="nav nav-tabs">
                  {foreach from=$languages item=lang}
                  <li data-tab="tab_{$lang.id}" class="{if $lang.id==1}active{/if}">
                     {$lang.name|escape}
                  </li>
                  {/foreach}
               </ul>
               <div class="tab-content main-tabs">
                  {foreach from=$languages item=lang}
                  <div class="tab-pane {if $lang.id==1}active{/if}" data-tab="tab_{$lang.id}">
                     <div class="item">
                        <div class="title">Tiêu đề</div>
                        <div class="info-title">
                           <input type="text"
                              name="name_{$lang.id}"
                              id="title_{$lang.id}"
                              class="InputText title-input"
                              value="{$menuDetail[$lang.id].name|default:''|escape:'html':'UTF-8'}">
                        </div>
                     </div>

                     <div class="item">
                        <div class="title">URL</div>
                        <div class="info-title">
                           <input type="text"
                              name="unique_key_{$lang.id}"
                              id="slug_{$lang.id}"
                              class="InputText slug-input"
                              value="{$menuDetail[$lang.id].unique_key|default:''|escape:'html':'UTF-8'}">
                        </div>
                     </div>
                  </div>
                  {/foreach}
               </div>

               <div class="item">
                  <div class="title">Thứ tự</div>
                  <div class="info-title">
                     <input type="text"
                        name="num"
                        class="InputNum num-order"
                        value="{$edit.num|default:0|escape:'html':'UTF-8'}">
                  </div>
               </div>

               <div class="item">
                  <div class="title">Liên kết</div>
                  <div class="option_link">
                     <label>
                        <input type="radio" name="choose" value="1" {if $edit.choose==1}checked{/if}>
                        Loại bài viết
                     </label>
                     <label>
                        <input type="radio" name="choose" value="0" {if $edit.choose==0}checked{/if}>
                        Link
                     </label>
                  </div>

                  <select id="menu" name="menu" class="show">
                     {foreach from=$lienket item=link}
                     <option value="{$link.id}" {if $link.id==$edit.comp}selected{/if}>
                        {$link.name|escape}
                     </option>
                     {/foreach}
                  </select>

                  <input type="text"
                     id="link"
                     name="link"
                     class="linkngoai hide"
                     value="{$edit.link_out|default:''|escape:'html':'UTF-8'}">
               </div>

               <div class="item">
                  <label>
                     <input type="checkbox"
                        name="menucon"
                        value="menucon"
                        class="CheckBox"
                        {if $edit.has_sub==1}checked{/if}>
                     Có menucon
                  </label>
                  <label>
                     <input type="checkbox"
                        name="active"
                        value="active"
                        class="CheckBox"
                        {if $edit.active==1 || $smarty.request.act=='add' }checked{/if}>
                     Show
                  </label>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
{literal}
<script>
   document.addEventListener("DOMContentLoaded", function() {
      const toggleMenuLink = () => {
         const yes1 = document.querySelector("#yes1");
         const menu = document.getElementById("menu");
         const link = document.querySelector(".linkngoai");
         if (yes1 && yes1.checked) {
            menu.classList.add("hide");
            menu.classList.remove("show");
            link.classList.add("show");
            link.classList.remove("hide");
         } else {
            menu.classList.add("show");
            menu.classList.remove("hide");
            link.classList.add("hide");
            link.classList.remove("show");
         }
      };
      document.querySelectorAll('input[name="choose"]').forEach(el => {
         el.addEventListener("change", toggleMenuLink);
      });
      toggleMenuLink();
   });
</script>
{/literal}