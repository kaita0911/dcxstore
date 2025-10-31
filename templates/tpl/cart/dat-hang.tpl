<title>Xác nhận đặt hàng</title>

<div class="main">
  <div class="container">
    <form name="formOrder" id="formOrder" class="form-contact" method="post">
      <div class="flex-cart">
        <div class="cart-actions">
          <button type="submit" class="btn-order">Thanh toán</button>
        </div>

        <div class="main-cart cart">
          <div class="info-detail-cart">
            <div class="form-receive-cart">
              <div class="input-group">
                <input type="text" class="form-control" id="names" name="names" placeholder="Họ tên" required />
              </div>

              <div class="input-group">
                <input type="text" class="form-control" id="phones" name="phones" placeholder="Điện thoại" required />
              </div>

              <div class="box-choosed">
                <div class="box-choosed__rd">
                  <input type="radio" id="c-home" name="shipped" value="home" checked>
                  <label for="c-home">Giao tận nơi</label>
                </div>
                <div class="box-choosed__rd">
                  <input type="radio" id="c-shop" name="shipped" value="Nhận tại cửa hàng">
                  <label for="c-shop">Nhận tại cửa hàng</label>
                </div>
              </div>

              <div id="box-home" class="is-show">
                <div class="input-group">
                  <input type="text" class="form-control" id="addresss" name="addresss" placeholder="Địa chỉ" required />
                </div>

                <div class="address-flex">
                  <select id="city" name="city" required>
                    <option value="">Tỉnh/TP</option>
                    {foreach $thanhpho as $tp}
                    <option value="{$tp.matp}">{$tp.name}</option>
                    {/foreach}
                  </select>

                  <select id="district" name="district" required>
                    <option value="">Quận/Huyện</option>
                  </select>

                  <select id="wards" name="wards" required>
                    <option value="">Phường/Xã</option>
                  </select>
                </div>
              </div>

              <div class="input-group">
                <textarea name="content" placeholder="Ghi chú"></textarea>
              </div>
            </div>
          </div>

          <div class="info-detail-cart">
            <div class="tit-detail-cart">
              <img src="{$path_url}/images/ic_cart_2.svg" /> Chi tiết đơn hàng
            </div>
            <div class="sum-info-cart">
              <div class="cart-box">
                {if isset($cart) && $cart|@count > 0}
                <ul class="cart-items">
                  {foreach $cart as $item}
                  {assign var="itemTotal" value=$item.price * $item.quantity}
                  <li class="cart-item" data-id="{$item.id}">
                    <a class="cart-item-name" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html">{$item.name}</a>
                    <div class="cart-item-image"><img src="{$path_url}/{$item.image}" alt="{$item.name}"></div>
                    <div class="cart-item-quantity">{$item.quantity}</div>
                    <div class="cart-item-price" data-price="{$item.price}">
                      {$item.price|number_format:0:',':'.'}₫
                    </div>
                    <div class="cart-item-total">
                      Thành tiền: {$itemTotal|number_format:0:',':'.'}₫
                    </div>
                  </li>
                  {/foreach}
                </ul>
                {else}
                <p>Giỏ hàng trống.</p>
                {/if}
              </div>
            </div>
          </div>

          <div class="right_info_customer">
            <div class="box-pay">
              <div class="right_info_customer__ttl">Chi tiết đơn hàng</div>
              <div class="totalend totalsumall" id="sumall">
                <span class="">Số lượng</span>
                <span class="cart-total-quality">
                  {assign var="totalQty" value=0}
                  {foreach $cart as $item}
                  {assign var="totalQty" value=$totalQty + $item.quantity}
                  {/foreach}
                  {$totalQty}
                </span>
                <div class="sum">
                  Tổng tiền <strong>
                    {assign var="total" value=0}
                    {foreach $cart as $item}
                    {assign var="total" value=$total + ($item.price * $item.quantity)}
                    {/foreach}
                    {$total|number_format:0:',':'.'}₫
                  </strong>
                </div>

                <div class="option-cart-vc hidden-xs">
                  <div class="tit-detail-cart">Phương thức thanh toán</div>
                  <ul>
                    <li>
                      <label for="radio-cart2">
                        <input id="radio-cart2" type="radio" name="radiothanhtoan" value="Thanh toán khi giao hàng (COD)" checked="checked" />
                        <img src="{$path_url}/images/cod.png" alt="cod" /> Thanh toán khi giao hàng (COD)
                      </label>
                    </li>
                    <li>
                      <label for="radio-cart1">
                        <input id="radio-cart1" type="radio" name="radiothanhtoan" value="Chuyển khoản qua ngân hàng" />
                        <img src="{$path_url}/images/other.png" alt="bank" /> Chuyển khoản qua ngân hàng
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            {if $makm.open == 1}
            <div class="info-detail-cart">
              <div class="sum-info-cart">
                <div class="field-vouchers">
                  <div class="field-input-wrapper">
                    <input placeholder="Mã giảm giá" id="vouchers" name="vouchers" value="">
                  </div>
                  <span class="btn-vouchers"><span class="btn-content">Sử dụng</span></span>
                  <div id="showvouchers"></div>
                  <div class="listvourcher">
                    {$list_x_vouches}
                    <div class="black"></div>
                  </div>
                </div>
              </div>
            </div>
            {/if}
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div id="c-loading">
  <div id="orderLoading"><img src="{$path_url}/assets/images/loading.svg"></div>
</div>