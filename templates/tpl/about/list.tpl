<div class="news-item col-md-4 col-sm-6">
    <a href="{$path_url}/{$lang_prefix}{$item.unique_key|escape:'url'}.html" title="{$item.name|escape}">
        <img src="{$path_url}/{$item.img_thumb_vn|escape:'url'}" alt="{$item.name|escape}" class="img-responsive">
        <h3>{$item.name_detail}</h3>
    </a>
    <div class="news-desc">
        {$item.short_detail}
    </div>
</div>