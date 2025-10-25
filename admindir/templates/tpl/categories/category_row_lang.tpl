<tr data-id="{$category.id}">
    <td align="center">
        <input class="c-item" type="checkbox" name="cid[]" value="{$category.id}">
    </td>
    <td align="center">
        <input type="text" class="numInput"
            value="{$category.num}">
    </td>
    <td align="center" class="img-table">
        {if $category.img_vn neq ""}
        <div class="c-img">
            <img src="../{$category.img_vn}" alt="img">
        </div>
        {/if}
    </td>
    <td align="left" class="main-tabs">
        {foreach $languages as $lang}
        <span class="c-name {if $lang.id == 1}active{/if} tab-pane" data-tab="tab_{$lang.id}">
            {for $i=0 to $level-1}&nbsp;--{/for}
            {assign var="detail" value=$category.details[$lang.id]}
            {$detail.name|escape:'html':'UTF-8'}
        </span>
        {/foreach}
    </td>
    <td align="center">
        <button type="button"
            class="btn_checks btn_toggle"
            data-id="{$category.id}"
            data-active="{$category.home}"
            data-column="home"
            data-table="categories">
            <img src="images/{$category.home}.png" alt="Show/Hide">
        </button>
    </td>

    <td align="center">
        <button type="button"
            class="btn_checks btn_toggle"
            data-id="{$category.id}"
            data-active="{$category.active}"
            data-column="active"
            data-table="categories">
            <img src="images/{$category.active}.png" alt="Show/Hide">
        </button>

    </td>
    <td align="center">
        <div class="flex-btn extra-tabs">
            {foreach $languages as $lang}
            {assign var="detail" value=$category.details[$lang.id]}
            <a data-tab="tab_{$lang.id}" class="act-btn btnView tab-pane {if $lang.id == 1}active{/if}" href="{$web_base_url}/{$detail.unique_key}/"
                target="_blank"
                title="Xem nhanh">
                <i class="fa fa-eye"></i>
            </a>
            {/foreach}
            <a title="Chỉnh sửa" class="act-btn btnEdit" href="index.php?do=categories&act=edit&id={$category.id}&comp={$smarty.request.comp}">
                <i class="fa fa-edit"></i>
            </a>
            <button title="Xoá" type="button" class="act-btn btnDeleteRow" data-id="{$category.id}"> <i class="fa fa-trash"></i> </button>
        </div>
    </td>
</tr>

{* Hiển thị con nếu có *}
{if $category.children|@count > 0}
{foreach $category.children as $child}
{include file="categories/category_row_lang.tpl" category=$child lang=$lang level=$level+1}
{/foreach}
{/if}