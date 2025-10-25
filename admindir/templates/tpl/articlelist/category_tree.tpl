<li>
    <label>
        <input type="checkbox"
            name="parentids[]"
            value="{$node.id}"
            data-parent="{$node.parent_id|default:0}"
            {if in_array(intval($node.id), $selected|default:[])}checked{/if}>
        {str_repeat('--&nbsp;', $node.level)}
        {if isset($node.details[$lang.id].name)}
        {$node.details[$lang.id].name}
        {else}
        {$node.name}
        {/if}
    </label>

    {if !empty($node.children)}
    <ul>
        {foreach $node.children as $child}
        {include file="articlelist/category_tree.tpl" node=$child selected=$selected lang=$lang}
        {/foreach}
    </ul>
    {/if}
</li>