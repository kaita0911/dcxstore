<header>
  <!-- <div class="topmb">
    <div class="menu-icon"><i class="fa-solid fa-list-check"></i> Menu</div>
    <div class="searchmb"><span class="icon-search"><i class="fa fa-search"></i> Search</span></div>
    <div class="cartmb">
      <div class="cart">
        <a href="{$path_url}/gio-hang/" class="cart-popover btn" title="Shopping Cart">
          <i class="fa-light fa-cart-arrow-down"></i>
          <span class="badge">0</span>
          <span class="seds hidden-xs">Giỏ hàng</span>
        </a>
      </div>
    </div>
  </div> -->
  <div class="container">
    <div class="header-body">
      <div class="logo">
        <a href="{$path_url}" title="{$logoHome.name_vn}">
          <img src="{$path_url}/{$logoHome.img_thumb_vn}" class="img-responsive" alt="{$logoHome.name_vn}">
        </a>
      </div>
      <div class="lang-switch">
        <!-- VN: ẩn /vn/ -->
        <a href="{$path_url}/" class="{if $lang == 'vn'}active{/if}">
          VI
        </a>
        <!-- EN: có /en/ -->
        <a href="{$path_url}/en/" class="{if $lang == 'en'}active{/if}">
          EN
        </a>
      </div>
      <div class="product-search">
        <form id="searchForm">
          <input type="text" name="keyword" id="keyword" placeholder="Nhập từ khóa..." required>
          <button type="submit">Tìm kiếm</button>
        </form>
        <div class="cart">
          <a href="{$path_url}/gio-hang" class="cart-popover btn" title="Shopping Cart">
            <i class="fa-light fa-cart-arrow-down"></i>
            <span id="num-cart">0</span>
            <span class="seds hidden-xs">Giỏ hàng</span>
          </a>
        </div>
        <div class="menu menu_mb">
          <nav class="menutop">
            <ul class="menu">

              <li>
                <a href="{$path_url}/{$lang_prefix}" title="{$home|escape:'html'}">
                  {$home|escape:'html'}
                </a>
              </li>


              {foreach from=$menus item=menu}
              <li>
                <a href="{$path_url}/{$lang_prefix}{$menu.unique_key_detail}">{$menu.name_detail}</a>

                {if $menu.categories|@count > 0}
                <ul class="submenu">
                  {include file='categories_tree.tpl' categories=$menu.categories level=1}
                </ul>
                {/if}
              </li>
              {/foreach}

              <li>
                <a href="{$path_url}/{$lang_prefix}lien-he"
                  title="{$contact|escape:'html'}">
                  {$contact|escape:'html'}
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
</header>