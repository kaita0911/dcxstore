{if $breadcrumbs|@count > 1}
<nav class="breadcrumb">
    {foreach $breadcrumbs as $key => $item}
    {if $key+1 < $breadcrumbs|@count}
        <a href="{$item.link}">{$item.name}</a> &raquo;
        {else}
        <span>{$item.name}</span>
        {/if}
        {/foreach}
</nav>
{/if}