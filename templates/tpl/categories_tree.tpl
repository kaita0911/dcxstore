{* categories_tree.tpl *}
{assign var="level" value=$level|default:1}
<ul class="level_{$level}">
    {foreach from=$categories item=cat}
    <li>
        {* link - dùng unique_key hoặc url theo hệ thống của bạn *}
        <a href="{$web_base_url}/{$cat.unique_key}">{$cat.name_detail}</a>

        {if isset($cat.children) && $cat.children|@count > 0}
        {* gọi đệ quy, tăng level lên 1 *}
        {include file='categories_tree.tpl' categories=$cat.children level=$level+1}
        {/if}
    </li>
    {/foreach}
</ul>