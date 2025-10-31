{if $totalPages > 1}
<ul id="viewpage" class="pagination" data-container="viewlist" data-module="{$module}" data-comp="{$comp}">
    {if $currentPage > 1}
    <li><a href="/{$module}{if $currentPage-1 > 1}/page/{$currentPage-1}{/if}">
            &laquo;
        </a></li>
    {/if}

    {section name=page start=1 loop=$totalPages+1}
    {assign var=pageNum value=$smarty.section.page.iteration}
    {if $pageNum == $currentPage || ($currentPage == 0 && $pageNum == 1)}
    <li><span>{$smarty.section.page.index}</span></li>
    {else}
    <li> <a href="/{$module}{if $pageNum>1}/page/{$pageNum}{/if}">
            {$pageNum}
        </a></li>
    {/if}
    {/section}

    {if $currentPage < $totalPages}
        <li><a href="/{$module}/page/{$currentPage+1}">
            &raquo;
        </a></li>
        {/if}
</ul>
{/if}