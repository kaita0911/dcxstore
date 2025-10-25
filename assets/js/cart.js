const baseUrl = typeof PATH_URL !== "undefined" ? PATH_URL : "";
$(document).ready(function () {
  updateCartBadge();
  function updateCartBadge() {
    $.ajax({
      url: baseUrl + "ajax/addtocart.php",
      type: "POST",
      data: { action: "getCount" },
      dataType: "json",
      success: function (res) {
        $("#num-cart").text(res.total_items || 0);
      },
    });
  }
  // Event delegation cho tất cả nút thêm giỏ hàng
  $(document).on("click", ".btn-add-cart", function (e) {
    e.preventDefault();
    const productId = $(this).data("id");
    const qty = $("#product-order-form input[name='quantity']").val() || 1;

    $.ajax({
      url: baseUrl + "ajax/addtocart.php",
      type: "POST",
      data: {
        id: productId,
        quantity: qty,
      },
      dataType: "json",
      success: function (res) {
        if (res.success) {
          updateCartBadge();
          showCartPopup(res.product); // 👉 gọi hàm tách riêng
        } else {
          alert(res.message || "Lỗi thêm sản phẩm.");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX error:", status, error);
        alert("⚠️ Không thể gọi addtocart.php. Kiểm tra URL và server.");
      },
    });
  });
  // cart-popup.js
  function showCartPopup(product) {
    const popup = `
            <div class="popup-cart">
              <div class="popup-cart__img"><img src="${product.image}" alt="${
      product.name
    }"></div>
              <div class="popup-cart__info">
                <div class="popup-cart__ttl"><a href="${
                  baseUrl + product.unique_key + ".html"
                }">${product.name}</a></div>
                <div class="popup-cart__price">${product.price}</div>
                <div class="popup-cart__quality">X ${product.quantity}</div>
              </div>
            </div>
            
              <a class="view-cart" href="${
                baseUrl + "gio-hang"
              }">Xem giỏ hàng</a>
         
          `;
    $("#cart-popup").html(popup).fadeIn(200);
    setTimeout(() => $("#cart-popup").fadeOut(300), 4000);
  }
  /////////////XOÁ/////////////
  $(document).on("click", ".btn-remove-item", function (e) {
    e.preventDefault();

    const id = $(this).data("id");
    const $item = $(this).closest(".cart-item");
    // 🔹 Hỏi xác nhận trước khi xoá
    if (!confirm(`Bạn có chắc muốn xoá sản phẩm khỏi giỏ hàng không?`)) {
      return; // ❌ Dừng lại nếu người dùng bấm "Hủy"
    }
    $.ajax({
      url: baseUrl + "ajax/remove_cart_item.php",
      type: "POST",
      data: { id: id },
      dataType: "json",
      success: function (res) {
        if (res.success) {
          $item.fadeOut(300, function () {
            $(this).remove();
            //$(".cart-summary").find("strong.total").text(res.total_price);
            $("#num-cart").text(res.total_items);
            updateCartSummary();
          });

          if (res.total_items == 0) {
            $(".cart-box").html("<p>Giỏ hàng trống.</p>");
          }
          showSuccessMessage("🗑️ Sản phẩm đã được xoá khỏi giỏ hàng!");
        } else {
          alert(res.message || "Không thể xoá sản phẩm.");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX error:", status, error);
        alert("⚠️ Không thể gọi remove_cart_item.php");
      },
    });
  });
  // 🔸 Hàm hiển thị thông báo thành công
  function showSuccessMessage(message) {
    const $msg = $(`
    <div class="cart-message-success">
      ${message}
    </div>
  `).appendTo("body");

    // Hiện và tự ẩn sau 2.5s
    $msg.fadeIn(200);
    setTimeout(() => {
      $msg.fadeOut(400, function () {
        $(this).remove();
      });
    }, 2500);
  }
  //////Cap nhat so luong/////////
  function formatNumber(num) {
    return num.toLocaleString("vi-VN");
  }

  // Khi nhấn nút tăng/giảm
  $(document).on("click", ".btn-qty", function () {
    const $item = $(this).closest(".cart-item");
    const $input = $item.find(".input-qty");
    let qty = parseInt($input.val()) || 1;
    const id = $input.data("id");

    if ($(this).hasClass("increase")) qty++;
    if ($(this).hasClass("decrease") && qty > 1) qty--;

    $input.val(qty);
    updateCartDisplay($item, qty);
    updateCartServer(id, qty);
  });

  // Khi nhập trực tiếp
  $(document).on("change", ".input-qty", function () {
    const $input = $(this);
    const $item = $input.closest(".cart-item");
    const id = $input.data("id");
    let qty = parseInt($input.val()) || 1;

    if (qty < 1) qty = 1;
    $input.val(qty);

    updateCartDisplay($item, qty);
    updateCartServer(id, qty);
  });
  // ✅ Cập nhật giá hiển thị ngay
  function updateCartDisplay($item, qty) {
    const price = parseFloat($item.find(".cart-item-price").data("price")) || 0;
    const $totalEl = $item.find(".cart-item-total");

    // Cập nhật giá từng sản phẩm
    const itemTotal = price * qty;
    $totalEl.text(formatNumber(itemTotal) + "₫");

    // Cập nhật tổng giỏ hàng
    let total = 0;
    let totalQty = 0;
    $(".cart-item").each(function () {
      const p = parseFloat($(this).find(".cart-item-price").data("price")) || 0;
      const q = parseInt($(this).find(".input-qty").val()) || 1;
      total += p * q;
      totalQty += q;
    });
    $(".cart-summary").text(formatNumber(total) + "₫");
    $(".cart-total-quality").text(totalQty);
  }

  // ✅ Gửi AJAX cập nhật session
  function updateCartServer(id, qty) {
    $.ajax({
      url: baseUrl + "ajax/update_cart_item.php",
      type: "POST",
      dataType: "json",
      data: { id: id, quantity: qty },
      success: function (res) {
        if (!res.success) {
          alert(res.message || "Không thể cập nhật giỏ hàng.");
        }
      },
    });
  }
  //////
  function updateCartSummary() {
    let totalPrice = 0;
    let totalQty = 0;

    $(".cart-item").each(function () {
      const price =
        parseFloat($(this).find(".cart-item-price").data("price")) || 0;
      const qty = parseInt($(this).find(".input-qty").val()) || 1;

      totalPrice += price * qty;
      totalQty += qty;
    });

    $(".cart-summary").text(totalPrice.toLocaleString("vi-VN") + "₫");
    $(".cart-total-quality").text(totalQty);
    $("#num-cart").text(total_items); // nếu có hiển thị ở header
  }
  ///////////Load tp, quan huyen
  // Khi chọn Tỉnh/TP
  $("#city").on("change", function () {
    const city_ID = $(this).val();

    if (city_ID) {
      $.ajax({
        type: "POST",
        url: baseUrl + "ajax/loaddistrict.php", // path_url = biến gốc của site
        data: { city_ID: city_ID },
        success: function (html) {
          $("#district").html(html);
          $("#wards").html('<option value="">Phường/Xã</option>'); // reset wards
        },
        error: function () {
          alert("Lỗi tải quận/huyện!");
        },
      });
    } else {
      $("#district").html('<option value="">Quận/Huyện</option>');
      $("#wards").html('<option value="">Phường/Xã</option>');
    }
  });

  // Khi chọn Quận/Huyện
  $("#district").on("change", function () {
    const district_ID = $(this).val();

    if (district_ID) {
      $.ajax({
        type: "POST",
        url: baseUrl + "ajax/loadphuongxa.php",
        data: { district_ID: district_ID },
        success: function (html) {
          $("#wards").html(html);
        },
        error: function () {
          alert("Lỗi tải phường/xã!");
        },
      });
    } else {
      $("#wards").html('<option value="">Phường/Xã</option>');
    }
  });
  ////////////////Dat hang
  $(function () {
    $("#formOrder").on("submit", function (e) {
      e.preventDefault();
      $("#c-loading").fadeIn(200);
      $.ajax({
        url: baseUrl + "/sources/cart.php?action=thanh-toan",
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function (res) {
          $("#c-loading").fadeOut(200); // ẩn loading
          if (res.success) {
            window.location.href = res.redirect;
          } else {
            $("#orderMessage").html("<p>" + res.message + "</p>");
          }
        },
        error: function (xhr) {
          $("#orderMessage").html(
            "<p>Lỗi: " + xhr.status + " - " + xhr.statusText + "</p>"
          );
          console.error(xhr.responseText);
        },
      });
    });
  });
});
$(document).on("click", ".btn-buy-now", function (e) {
  e.preventDefault();

  e.preventDefault();
  const productId = $(this).data("id");
  const qty = $("#product-order-form input[name='quantity']").val() || 1;

  $.ajax({
    url: baseUrl + "ajax/addtocart.php",
    type: "POST",
    data: {
      id: productId,
      quantity: qty,
    },
    dataType: "json",
    success: function (res) {
      if (res.success) {
        // Thêm thành công → chuyển tới trang thanh toán
        window.location.href = baseUrl + "dat-hang";
      } else {
        alert(res.message || "Lỗi thêm sản phẩm.");
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", status, error);
      alert("Không thể thêm sản phẩm.");
    },
  });
});
