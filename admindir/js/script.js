// ==================== Main Script ====================
(function ($) {
  // Chạy khi DOM sẵn sàng
  $(function () {
    const currentUrl = window.location.href;

    // ==================== CKEditor ====================
    ["editor1", "editor2", "short1", "short2"].forEach((id) => {
      const el = document.getElementById(id);
      if (el && el.tagName.toLowerCase() === "textarea") {
        CKEDITOR.replace(id, {
          language: id.endsWith("2") ? "en" : "vi",
          removePlugins: "exportpdf",
        });
      }
    });

    // ==================== Slug ====================
    function slugify(str) {
      return str
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/[đð]/g, "d")
        .replace(/[^a-z0-9\s-]/g, "")
        .trim()
        .replace(/\s+/g, "-")
        .replace(/-+/g, "-");
    }

    function updateAllSlugs() {
      $(".title-input").each(function () {
        const langId = this.id.split("_").pop();
        const slugInput = $("#slug_" + langId);
        if (slugInput.length && !slugInput.data("edited")) {
          slugInput.val(slugify(this.value));
        }
      });
    }

    $(".title-input").on("input", function () {
      const langId = this.id.split("_").pop();
      const slugInput = $("#slug_" + langId);
      if (slugInput.length && !slugInput.data("edited")) {
        slugInput.val(slugify(this.value));
      }
    });

    $(".slug-input").on("input", function () {
      $(this).data("edited", true);
    });

    // ==================== Checkbox tree ====================
    const parentCheckboxes = $('input[name="parentids[]"]');

    function checkAncestors(parentId) {
      let pid = parentId;
      while (pid && pid != 0) {
        const parent = parentCheckboxes.filter('[value="' + pid + '"]');
        parent
          .prop("checked", true)
          .attr("data-autocheck", "1")
          .prop("disabled", true);
        pid = parent.data("parent");
      }
    }

    function uncheckChildren(parentId) {
      parentCheckboxes
        .filter('[data-parent="' + parentId + '"]')
        .each(function () {
          $(this)
            .prop("checked", false)
            .removeAttr("data-autocheck")
            .prop("disabled", false);
          uncheckChildren($(this).val());
        });
    }

    parentCheckboxes.on("change", function () {
      const current = $(this);
      const currentId = current.val();
      const currentParent = current.data("parent");
      if (current.is(":checked")) {
        parentCheckboxes
          .not(current)
          .prop("checked", false)
          .removeAttr("data-autocheck")
          .prop("disabled", false);
        checkAncestors(currentParent);
      } else {
        uncheckChildren(currentId);
      }
    });

    parentCheckboxes.filter(":checked").each(function () {
      const pid = $(this).data("parent");
      if (pid && pid != 0) checkAncestors(pid);
    });

    // ==================== Form Submit ====================
    $("#ArticleForm").on("submit", function (e) {
      const titleInput = $("#title_1");
      if (!titleInput.val().trim()) {
        e.preventDefault();
        titleInput.css("border", "1px solid #007bff");
        alert("Vui lòng nhập tiêu đề!");
        titleInput.focus();
        $("html, body").animate(
          { scrollTop: titleInput.offset().top - 100 },
          300
        );
        return false;
      } else {
        titleInput.css("border", "");
      }

      updateAllSlugs();

      $('input[name="parentids[]"][data-autocheck="1"]').prop("disabled", true);
    });

    // ==================== Chọn tất cả ====================
    const checkAll = $("#checkAll");
    const items = $(".c-item");
    if (checkAll.length) {
      checkAll.on("change", function () {
        items.prop("checked", this.checked);
      });
      items.on("change", function () {
        checkAll.prop(
          "checked",
          items.toArray().every((i) => i.checked)
        );
      });
    }

    // ==================== AutoNumeric / Format giá ====================
    if ($(".autoNumeric").length)
      $(".autoNumeric").autoNumeric("init", { aSep: ".", aDec: "none" });
    $(".InputPrice").on("input", function () {
      const number = this.value.replace(/\D/g, "");
      this.value = number ? Number(number).toLocaleString("vi-VN") : "";
    });

    // ==================== Countdown ====================
    (function () {
      const countDownDate = new Date("May 15, 2026 11:00:00").getTime();
      const timer = setInterval(() => {
        const now = new Date().getTime();
        const distance = countDownDate - now;
        if (distance < 0) {
          clearInterval(timer);
          $("#demo").text("EXPIRED");
          $(".bgleft").addClass("hide");
          $(".popupqc").addClass("show");
          return;
        }
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor(
          (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        $("#demo").text(
          `${days} Ngày ${hours} Giờ ${minutes} Phút ${seconds} Giây`
        );
      }, 1000);
    })();

    // ==================== Tab ====================
    $(".nav-tabs li").on("click", function () {
      const tabId = $(this).data("tab");
      $(".nav-tabs li").removeClass("active");
      $(this).addClass("active");
      $(".main-tabs .tab-pane, .extra-tabs .tab-pane").each(function () {
        $(this).toggleClass("active", $(this).data("tab") === tabId);
      });
    });

    // ==================== Button actions ====================
    function ajaxButton(selector, urlSuffix, dataMapper, onSuccess) {
      $(document).on("click", selector, function () {
        const btn = $(this);
        const data = dataMapper(btn);

        // Nếu hàm dataMapper trả về false thì hủy
        if (data === false) return;

        const url = currentUrl + urlSuffix;

        $.ajax({
          url,
          type: "POST",
          data,
          dataType: "json",
          success: function (res) {
            onSuccess(res, btn);
          },
          error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Lỗi kết nối máy chủ: " + error);
          },
        });
      });
    }

    // --- XÓA 1 DÒNG ---
    ajaxButton(
      ".btnDeleteRow",
      "&act=dellistajax",
      (btn) => {
        if (!confirm("Bạn có chắc muốn xoá mục này không?")) return false;
        return { cid: btn.data("id") };
      },
      function (res, btn) {
        if (res.success) {
          $("#orderMsg")
            .addClass("show")
            .html('<span><i class="fa fa-check"></i> Xoá thành công!</span>');

          let row = btn.closest("tr");
          if (!row.length) row = btn.closest(".item");
          if (!row.length) row = btn.closest(".gallery-item");

          if (row.length) {
            row.fadeOut(300, function () {
              $(this).remove();
            });
          } else {
            console.warn("Không tìm thấy phần tử để xoá");
          }

          setTimeout(() => $("#orderMsg").removeClass("show"), 2000);
        } else {
          alert(res.message || "Lỗi khi xoá!");
        }
      }
    );

    // --- XÓA NHIỀU DÒNG ---
    ajaxButton(
      "#btnDelete",
      "&act=dellistajax",
      () => {
        const ids = $('input[name="cid[]"]:checked')
          .map((_, el) => $(el).val())
          .get();

        if (ids.length === 0) {
          alert("Vui lòng chọn ít nhất một mục để xoá!");
          return false;
        }

        if (!confirm("Bạn có chắc muốn xoá các mục đã chọn không?"))
          return false;

        return { cid: ids.join(",") };
      },
      function (res) {
        if (res.success) {
          $("#orderMsg")
            .addClass("show")
            .html(
              '<span><i class="fa fa-check"></i> Đã xoá các mục được chọn!</span>'
            );

          $('input[name="cid[]"]:checked').each(function () {
            const id = $(this).val();
            const row = $('tr[data-id="' + id + '"]');
            if (row.length) {
              row.fadeOut(300, function () {
                $(this).remove();
              });
            }
          });

          setTimeout(() => $("#orderMsg").removeClass("show"), 2000);
        } else {
          alert(res.message || "Không thể xoá các mục đã chọn!");
        }
      }
    );

    ajaxButton(
      "#btnRefresh",
      "&act=refreshlistajax",
      () => {
        const ids = $('input[name="cid[]"]:checked')
          .map((_, el) => $(el).val())
          .get();
        return { cid: ids.join(",") };
      },
      (res) => {
        if (res.success) location.reload();
        else alert(res.message || "Lỗi không xác định");
      }
    );

    $("#btnAddnew").on("click", function () {
      const comp = $(this).data("comp") || 0;
      window.location.href =
        currentUrl + "&act=add" + (comp ? "&comp=" + comp : "");
    });

    ajaxButton(
      ".btnUpdateNum",
      "&act=updatenumajax",
      (btn) => {
        // 🟡 Thông báo xác nhận
        if (!confirm("Bạn có chắc muốn làm mới không?")) return false;

        // Lấy toàn bộ giá trị trong các input class="numInput"
        const nums = $(".numInput")
          .map((_, el) => $(el).val())
          .get();

        // Lấy id của nút bấm (nếu có)
        const id = btn.data("id") || 0;

        return {
          id, // gửi id của nút
          num: nums, // gửi mảng num[]
        };
      },
      function (res) {
        if (res.success) {
          $("#orderMsg")
            .addClass("show")
            .html(
              '<span><i class="fa fa-check"></i> ✅ Cập nhật thành công!</span>'
            );
          setTimeout(() => $("#orderMsg").removeClass("show"), 1000);
          location.reload();
        } else {
          alert(res.message || "Lỗi khi cập nhật num!");
        }
      }
    );
    //=======upload image đại diện======================

    const input = document.getElementById("img_thumb_vn");
    if (input) {
      const preview = document.getElementById("preview-img");
      const current = document.getElementById("current-img");

      input.addEventListener("change", function () {
        const file = this.files[0];
        if (!file) {
          if (preview) preview.style.display = "none";
          if (current) current.style.display = "block";
          return;
        }

        if (!file.type.startsWith("image/")) {
          alert("Vui lòng chọn đúng định dạng ảnh (JPG, PNG, GIF)!");
          this.value = "";
          return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
          if (preview) {
            preview.src = e.target.result;
            preview.style.display = "block";
          }
          if (current) current.style.display = "none";
        };
        reader.readAsDataURL(file);
      });
    }

    // ==================== Upload & Preview nhiều image ====================
    ////////di chuyển vị trí ảnh////////////////
    const gallery = document.querySelector(".preview-gallery");
    if (gallery) {
      // Khởi tạo SortableJS
      Sortable.create(gallery, {
        animation: 200,
        easing: "cubic-bezier(0.25, 1, 0.5, 1)",
        ghostClass: "sortable-ghost",
        swapThreshold: 0.65,
        onEnd: function () {
          collectGalleryNums(); // gọi luôn
        },
      });
    }

    function collectGalleryNums() {
      $(".preview-gallery .gallery-item").each(function (i) {
        const id = $(this).data("id");
        const num = i + 1; // thứ tự mới
        $(this).find("input[name='num_old[]']").val(num);
        $(this).find("input[name='id_old[]']").val(id);
      });
    }
    // Khi chọn nhiều ảnh mới

    let dt = new DataTransfer(); // quản lý file mới

    // Upload ảnh mới
    $("#multiimages").on("change", function () {
      const preview = $(".preview-gallery");

      for (const file of this.files) {
        if (!file.type.startsWith("image/")) continue;

        dt.items.add(file); // thêm vào DataTransfer

        const reader = new FileReader();
        reader.onload = function (e) {
          const html = `
            <div class="gallery-item" data-name="${file.name}">
              <img src="${e.target.result}">
              <div class="overlay">
                <button type="button" class="remove-image">X</button>
              </div>
            </div>
          `;
          preview.append(html);
        };
        reader.readAsDataURL(file);
      }

      // cập nhật lại input
      this.files = dt.files;
    });

    // Xóa ảnh
    $(document).on("click", ".remove-image", function () {
      const galleryItem = $(this).closest(".gallery-item");
      const id = galleryItem.data("id");

      if (id) {
        // ảnh cũ → xóa bằng Ajax
        if (!confirm("Bạn có chắc muốn xóa ảnh này?")) return;
        $.post(
          "index.php?do=articlelist&act=deleteimage",
          { id },
          function (res) {
            if (res.success) galleryItem.remove();
            else alert("Xóa thất bại!");
          },
          "json"
        );
      } else {
        // ảnh mới → remove khỏi DataTransfer
        const name = galleryItem.data("name");
        for (let i = 0; i < dt.items.length; i++) {
          if (dt.items[i].getAsFile().name === name) {
            dt.items.remove(i);
            break;
          }
        }
        galleryItem.remove();
        $("#multiimages")[0].files = dt.files;
      }
    });

    // Trước khi submit form, rebuild file mới theo thứ tự DOM
    $("#ArticleForm").on("submit", function () {
      const newDt = new DataTransfer();
      $(".preview-gallery .gallery-item").each(function () {
        const name = $(this).data("name");
        if (name) {
          for (let i = 0; i < dt.files.length; i++) {
            if (dt.files[i].name === name) {
              newDt.items.add(dt.files[i]);
              break;
            }
          }
        }
      });
      dt = newDt;
      $("#multiimages")[0].files = dt.files;
    });

    /////////////////////MENU LEFT/////////////////////////
    $(".nav-toggle").on("click", function (e) {
      e.preventDefault();

      const $parent = $(this).closest(".nav-item");
      const $submenu = $parent.find(".list-sidebar");

      // Đóng các menu khác
      $(".list-sidebar").not($submenu).slideUp(200);
      $(".nav-item").not($parent).removeClass("active");

      // Toggle menu hiện tại
      $parent.toggleClass("active");
      $submenu.stop(true, true).slideToggle(200);
    });
    // ====== Khi click menu con ======
    $(document).on("click", ".list-sidebar a", function () {
      const href = $(this).attr("href");
      const $parent = $(this).closest(".nav-item");

      // Lưu trạng thái vào sessionStorage
      sessionStorage.setItem("activeMenuHref", href);
      sessionStorage.setItem("activeMenuParent", $parent.index());
    });

    // ====== Khi load lại trang ======
    const activeHref = sessionStorage.getItem("activeMenuHref");
    if (activeHref) {
      // Tìm link trùng với URL đã lưu
      const $activeLink = $(`.list-sidebar a[href='${activeHref}']`);
      if ($activeLink.length) {
        // Mở menu cha
        const $parent = $activeLink.closest(".nav-item");
        $parent.addClass("active");
        $parent.find(".list-sidebar").show();

        // Đánh dấu link con
        $(".list-sidebar a").removeClass("active");
        $activeLink.addClass("active");
      }
    }

    // ==================== Xóa trạng thái menu khi logout ====================
    $(document).on("click", 'a[href*="act=log_out"]', function () {
      sessionStorage.removeItem("activeMenu");
      sessionStorage.removeItem("activeSubmenu");
    });

    // Khi load trang login hoặc log_out
    if (
      window.location.href.includes("do=login") ||
      window.location.href.includes("act=log_out")
    ) {
      sessionStorage.removeItem("activeMenu");
      sessionStorage.removeItem("activeSubmenu");
    }
    /////////////////active-///////////////
    $(document).on("click", ".btn_toggle", function () {
      const btn = $(this);
      const id = btn.data("id");
      const table = btn.data("table");
      const column = btn.data("column");
      const currentValue = parseInt(btn.data("active"), 10);
      const newValue = currentValue === 1 ? 0 : 1;
      const msg = newValue === 0 ? "Ẩn" : "Hiển thị";

      if (confirm(`Bạn muốn ${msg}?`)) {
        $.ajax({
          type: "POST",
          url: "/admindir/functions/toggle.php",
          data: {
            id: id,
            value: newValue,
            table: table,
            column: column,
          },
          success: function () {
            // cập nhật lại UI
            btn.data("active", newValue);
            btn.find("img").attr("src", "images/" + newValue + ".png");
            btn
              .removeClass("btn-success btn-danger")
              .addClass(newValue === 1 ? "btn-success" : "btn-danger");
          },
          error: function (xhr, status, error) {
            alert("Lỗi AJAX: " + error);
          },
        });
      }
    });
    /////CẬP NHẬT TÊN
    // Bấm vào tên -> chuyển sang ô input
    $(document).on("click", ".editable-name .view-text", function () {
      const span = $(this).closest(".editable-name");
      span.find(".view-text").hide();
      span.find(".edit-input").show().focus();
    });

    // Nhấn Enter hoặc blur -> lưu AJAX
    $(document).on("keypress", ".editable-name .edit-input", function (e) {
      if (e.which === 13) {
        e.preventDefault();
        saveQuickEdit($(this));
      }
    });
    $(document).on("blur", ".editable-name .edit-input", function () {
      saveQuickEdit($(this));
    });
    function saveQuickEdit(input) {
      const span = input.closest(".editable-name");
      const id = span.data("id");
      const lang = span.data("lang");
      const newValue = input.val().trim();
      const oldValue = span.find(".view-text").text().trim();

      if (newValue === oldValue || newValue === "") {
        input.hide();
        span.find(".view-text").show();
        return;
      }

      $.ajax({
        url: "/admindir/functions/update_name.php",
        method: "POST",
        data: { id: id, lang: lang, name: newValue },
        dataType: "json",
        success: function (res) {
          if (res.success) {
            span.find(".view-text").text(newValue);
          } else {
            alert("❌ " + res.message);
            input.val(oldValue);
          }
          input.hide();
          span.find(".view-text").show();
        },
        error: function () {
          alert("Không thể cập nhật!");
          input.hide();
          span.find(".view-text").show();
        },
      });
    }
    ///////////////CẬP NHẬT GIÁ
    $(document).on("blur", ".editable-price", function () {
      let $this = $(this);
      let id = $this.data("id");
      let price = $(this).text().replace(/[^\d]/g, "");
      price = parseInt(price) || 0;

      $.ajax({
        url: "/admindir/functions/update_price.php",
        type: "POST",
        dataType: "json",
        data: { id: id, price: price },
        success: function (res) {
          if (res.success) {
            $this.text(new Intl.NumberFormat("vi-VN").format(price) + "₫");
            $this.css("background", "#e8ffe8");
            setTimeout(() => $this.css("background", ""), 600);
          } else {
            alert(res.message || "Không thể cập nhật giá");
          }
        },
        error: function (xhr) {
          console.error(xhr.responseText);
          alert("Lỗi AJAX khi cập nhật giá!");
        },
      });
    });
    // ✅ Xử lý Enter để blur (kích hoạt AJAX)
    $(document).on("keydown", ".editable-price", function (e) {
      if (e.key === "Enter") {
        e.preventDefault(); // ngăn xuống dòng
        $(this).blur(); // tự động blur => kích hoạt AJAX update
      }
    });
  }); // end ready
})(jQuery);
