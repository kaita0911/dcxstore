<div class="cart-box">
  {if isset($cart) && $cart|@count > 0}
  <ul class="cart-items">
    {foreach $cart as $item}
    <li class="cart-item" data-id="{$item.id}">
      <a class="cart-item-name" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html">{$item.name}</a>
      <div class="cart-item-image"><img src="{$path_url}/{$item.image}" alt="{$item.name}"></div>
      <div class="cart-item-quantity">
        <button class="btn-qty decrease">−</button>
        <input type="number" min="1" value="{$item.quantity}" class="input-qty" data-id="{$item.id}">
        <button class="btn-qty increase">+</button>
      </div>
      <div class="cart-item-price" data-price="{$item.price}">

        {$item.price|number_format:0:',':'.'}₫

      </div>
      <div class="cart-item-total">
        {if $item.price > 0}
        Thành tiền: {($item.price * $item.quantity)|number_format:0:',':'.'}₫
        {/if}
      </div>
      <button class="btn-remove-item" data-id="{$item.id}">Xoá</button>
    </li>
    {/foreach}
  </ul>

  <div class="cart-summary">
    Tổng:
    {assign var="total" value=0}
    {foreach $cart as $item}
    {assign var="total" value=$total + ($item.price * $item.quantity)}
    {/foreach}
    {$total|number_format:0:',':'.'}₫
  </div>
  <div class="cart-total-quality">
    <span class="cart-total-quality">
      {assign var="totalQty" value=0}
      {foreach $cart as $item}
      {assign var="totalQty" value=$totalQty + $item.quantity}
      {/foreach}
      {$totalQty}
    </span>
  </div>

  <div class="cart-actions">
    <a href="{$path_url}/dat-hang" class="btn btn-primary">Đặt hàng</a>
    <!-- <a href="{$path_url}/cart.php" class="btn btn-secondary">Xem giỏ hàng</a> -->
  </div>
  {else}
  <p>Giỏ hàng trống.</p>
  {/if}
</div>