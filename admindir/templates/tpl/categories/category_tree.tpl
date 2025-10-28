<li>
    <label>
        <input type="checkbox"
            name="parentids[]"
            value="{$node.id}"
            data-parent="{$node.parent_id|default:0}"
            {if in_array($node.id, $selected|default:[])}checked{/if}>
        {str_repeat('--&nbsp;', $node.level)} {$node.details.name|default:$node.name}
    </label>

    {if $node.children|@count > 0}
    <ul>
        {foreach $node.children as $child}
        {include file="categories/category_tree.tpl" node=$child selected=$selected}
        {/foreach}
    </ul>
    {/if}
</li>