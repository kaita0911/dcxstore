<a href="/" target="_blank" class="logo">
  <img height="40" src="../{$logoadmin.img_thumb_vn}" alt="Logo" />
</a>

<div class="menusidebar" id="sidebar">
  {foreach from=$ListMenuLeft item=menu}
  <div class="nav-item">
    <div class="nav-toggle" href="{$menu.links.list}">
      <span><i class="fa {$menu.icon}"></i></span>
      <label>{$menu.name}</label>
      <i class="fa fa-angle-down"></i>
    </div>

    {* Nếu menu có link con thì hiển thị *}
    {if isset($menu.category) || isset($menu.detail) || isset($menu.size) || isset($menu.color) || isset($menu.links.add)}
    <div class="list-sidebar">
      <a href="{$menu.links.list}">Danh sách</a>

      {if isset($menu.category)}
      <a href="{$menu.category}">Danh mục</a>
      {/if}

      {if isset($menu.detail)}
      <a href="{$menu.detail}">Cấu hình</a>
      {/if}

      {if isset($menu.size)}
      <a href="{$menu.size}">Kích thước</a>
      {/if}

      {if isset($menu.color)}
      <a href="{$menu.color}"> Màu sắc</a>
      {/if}
    </div>
    {/if}
  </div>
  {/foreach}

  <div class="nav-item">
    <div class="nav-toggle">
      <span><i class="fa fa-book"></i></span>
      <label>Liên hệ</label>
      <i class="fa fa-angle-down"></i>
    </div>
    <div class="list-sidebar">
      <a href="index.php?do=contact&comp=23">
        KH Liên hệ
      </a>
      {if $showform.open eq 1}
      <a href="index.php?do=taovandon">
        KH đăng ký Form
      </a>
      {/if}
    </div>
  </div>
  {if $smarty.session.admin_artseed_username == 'kaita'}
  <div class="nav-item">
    <div class="nav-toggle">
      <span><i class="fa fa-globe"></i></span>
      <label>Thông tin website</label>
      <i class="fa fa-angle-down"></i>
    </div>
    <div class="list-sidebar">
      <a href="index.php?do=component"> Module</a>
      <a href="index.php?do=language">Ngôn ngữ</a>
      <a href="index.php?do=properties">Thuộc tính</a>
      <a href="index.php?do=menu">Menu trên</a>
      <a href="index.php?do=infos&comp=9">Cấu hình</a>
    </div>
  </div>
  {else}

  <a class="nav-normal" href="index.php?do=infos&comp=9">
    <span><i class="fa fa-globe"></i></span>
    <label>Cấu hình</label>
  </a>
  {/if}
</div>