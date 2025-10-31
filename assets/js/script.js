$("#registerForm").on("submit", function (e) {
  e.preventDefault();
  const form = $(this);
  let isValid = true;
  // Reset lỗi cũ
  form.find(".error-msg").text("");
  form.find("input, textarea").removeClass("input-error");

  const email = form.find('input[name="email"]').val().trim();
  const phone = form.find('input[name="phone"]').val().trim();
  // ===== Kiểm tra email =====
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (email === "") {
    showError('input[name="email"]', "Vui lòng nhập email.");
    isValid = false;
  } else if (!emailRegex.test(email)) {
    showError('input[name="email"]', "Email không hợp lệ.");
    isValid = false;
  }

  // ===== Kiểm tra số điện thoại (VN) =====
  const phoneRegex = /^(0|\+84)(\d{9})$/;
  if (phone === "") {
    showError('input[name="phone"]', "Vui lòng nhập số điện thoại.");
    isValid = false;
  } else if (!phoneRegex.test(phone)) {
    showError('input[name="phone"]', "Số điện thoại không hợp lệ.");
    isValid = false;
  }
  if (!isValid) return;

  $("#c-loading").fadeIn(200);
  $.ajax({
    url: baseUrl + "ajax/register_form.php",
    type: "POST",
    data: form.serialize(),
    dataType: "json",
    success: function (res) {
      $("#c-loading").fadeOut(200); // ẩn loading
      if (res.success) {
        showPopup("✅ " + res.message, "success");
        $("#registerForm")[0].reset();
      } else {
        showPopup("⚠️ " + res.message, "error");
      }
    },
    error: function (xhr) {
      $("#c-loading").fadeOut(200);
      showPopup("❌ Lỗi máy chủ: " + xhr.statusText, "error");
    },
  });
});
// === Hàm hiển thị lỗi dưới input ===
function showError(selector, message) {
  const input = $(selector);
  input.addClass("input-error");
  input.next(".error-msg").text(message);
}
// ===== Chặn ký tự không phải số trong ô điện thoại =====
$('input[name="phone"]').on("keypress", function (e) {
  const char = String.fromCharCode(e.which);
  const val = $(this).val();

  // Chỉ cho phép nhập số, hoặc dấu + (chỉ ở đầu)
  if (!/[0-9]/.test(char) && !(char === "+" && val.length === 0)) {
    e.preventDefault();
  }
});
// --- Hàm hiển thị popup ---
function showPopup(message, type = "success") {
  const $popup = $("#popupMessage");
  const $text = $("#popupText");

  $text.html(message);
  $popup
    .removeClass("popup-success popup-error")
    .addClass(type === "success" ? "popup-success" : "popup-error")
    .fadeIn(200)
    .css("display", "flex"); // đảm bảo dùng flex để căn giữa

  // Tự động ẩn sau 3 giây
  setTimeout(() => {
    $popup.fadeOut(300);
  }, 3000);
}

// --- Nút đóng thủ công ---
$("#popupClose").on("click", function () {
  $("#popupMessage").fadeOut(300);
});
