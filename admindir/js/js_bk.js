

<div id="orderMsg"></div>
{literal}

<script>
	(function() {
		// CKEditor init cho tất cả textarea tồn tại
		['editor1', 'editor2', 'short1', 'short2'].forEach(function(id) {
			var el = document.getElementById(id);
			if (el && el.tagName.toLowerCase() === 'textarea') {
				CKEDITOR.replace(id, {
					language: id.endsWith('2') ? 'en' : 'vi',
					removePlugins: 'exportpdf' // bỏ plugin export PDF để không báo lỗi
				});
			}
		});


		// Slug gộp chung
		window.ChangeToSlug = function(inputId, outputId) {
			var title = document.getElementById(inputId).value;
			var slug = title.toLowerCase()
				.normalize('NFD').replace(/[\u0300-\u036f]/g, '')
				.replace(/đ/g, 'd')
				.replace(/[^a-z0-9]+/g, '-')
				.replace(/^-+|-+$/g, '');
			document.getElementById(outputId).value = slug;
		};

		// Toggle SEO
		$('#chkSeo').on('click', function() {
			if ($(this).is(':checked')) {
				$('#divCaptionSeo').show();
				$('#divCaptionNo').hide();
			} else {
				$('#divCaptionSeo').hide();
				$('#divCaptionNo').show();
			}
		});

		// Checkbox tree logic
		$(".child-child-term :input").change(function() {
			if (this.checked) {
				$(this).closest('.child-child-term')
					.prevAll(".child-term:first")
					.find("input").prop("checked", true)
					.end()
					.prevAll(".parent-term:first")
					.find("input").prop("checked", true);
			}
		});

		$(".child-term :input").change(function() {
			if (this.checked) {
				$(this).closest('.child-term')
					.prevAll(".parent-term:first")
					.find("input").prop("checked", true);
			}
		});

		// AutoNumeric init
		if ($('.autoNumeric').length) $('.autoNumeric').autoNumeric('init', {
			aSep: '.',
			aDec: 'none'
		});
	})();
	////////////cố định//////////////////
</script>
<script type="text/javascript">
	const currentUrl = window.location.href;
	///////////////set đóng web//////////////////////
	// --- Countdown license expiration ---
	(function() {
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
			const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			const seconds = Math.floor((distance % (1000 * 60)) / 1000);
			$("#demo").text(`${days} Ngày ${hours} Giờ ${minutes} Phút ${seconds} Giây`);
		}, 1000);
	})();
	///////////////active - tab///////////////////////
	document.querySelectorAll('.nav-tabs li').forEach(tab => {
		tab.addEventListener('click', function() {
			const tabId = this.dataset.tab;

			// Xóa active ở tất cả tab header
			document.querySelectorAll('.nav-tabs li').forEach(li => li.classList.remove('active'));
			this.classList.add('active');

			// Chuyển main tab
			document.querySelectorAll('.main-tabs .tab-pane').forEach(pane => {
				pane.classList.toggle('active', pane.dataset.tab === tabId);
			});

			// Chuyển extra tab
			document.querySelectorAll('.extra-tabs .tab-pane').forEach(pane => {
				pane.classList.toggle('active', pane.dataset.tab === tabId);
			});
		});
	});

	/////////////////active-///////////////
	$(document).on('click', '.btn_toggle', function() {
		const btn = $(this);
		const id = btn.data('id');
		const table = btn.data('table');
		const column = btn.data('column');
		const currentValue = parseInt(btn.data('active'), 10);
		const newValue = currentValue === 1 ? 0 : 1;
		const msg = newValue === 0 ? 'Ẩn' : 'Hiển thị';

		if (confirm(`Bạn muốn ${msg}?`)) {
			$.ajax({
				type: "POST",
				url: "/admindir/ajax_active/toggle.php",
				data: {
					id: id,
					value: newValue,
					table: table,
					column: column
				},
				success: function() {
					// cập nhật lại UI
					btn.data('active', newValue);
					btn.find('img').attr('src', 'images/' + newValue + '.png');
					btn.removeClass('btn-success btn-danger')
						.addClass(newValue === 1 ? 'btn-success' : 'btn-danger');
				},
				error: function(xhr, status, error) {
					alert("Lỗi AJAX: " + error);
				}
			});
		}
	});


	// Hàm chuyển chuỗi thành slug
	// Hàm chuyển chuỗi tiếng Việt (hoặc có dấu) thành slug chuẩn SEO
	function slugify(str) {
		return str
			.toLowerCase()
			.normalize("NFD") // Tách dấu tiếng Việt
			.replace(/[\u0300-\u036f]/g, "") // Xóa toàn bộ dấu
			.replace(/[đð]/g, "d") // Thay đ, ð thành d
			.replace(/[^a-z0-9\s-]/g, "") // Loại bỏ ký tự đặc biệt
			.trim() // Xóa khoảng trắng đầu và cuối
			.replace(/\s+/g, "-") // Thay khoảng trắng bằng dấu gạch ngang
			.replace(/-+/g, "-"); // Xóa gạch ngang thừa
	}


	// Cập nhật tất cả slug theo title (đa ngôn ngữ)
	function updateAllSlugs() {
		document.querySelectorAll(".title-input").forEach(titleInput => {
			const langId = titleInput.id.split("_").pop(); // ví dụ: title_1 → 1
			const slugInput = document.getElementById("slug_" + langId);
			if (slugInput && !slugInput.dataset.edited) {
				slugInput.value = slugify(titleInput.value);
			}
		});
	}

	// Khi người dùng nhập title → tự sinh slug (nếu slug chưa bị chỉnh tay)
	document.addEventListener("DOMContentLoaded", () => {
		document.querySelectorAll(".title-input").forEach(titleInput => {
			titleInput.addEventListener("input", function() {
				const langId = this.id.split("_").pop();
				const slugInput = document.getElementById("slug_" + langId);
				if (slugInput && !slugInput.dataset.edited) {
					slugInput.value = slugify(this.value);
				}
			});
		});

		// Nếu người dùng sửa slug → đánh dấu để không bị ghi đè
		document.querySelectorAll(".slug-input").forEach(slugInput => {
			slugInput.addEventListener("input", function() {
				this.dataset.edited = "true";
			});
		});
	});

	// Khi bấm Save
	function SubmitFromGo(formId) {
		var firstTitle = document.getElementById("title_1");
		if (!firstTitle || firstTitle.value.trim() === "") {
			alert("Vui lòng nhập tiêu đề");
			if (firstTitle) firstTitle.focus();
			return false;
		}

		updateAllSlugs(); // tạo slug

		var form = document.getElementById(formId);
		if (form) {
			form.submit(); // ✅ submit trực tiếp, file sẽ được gửi
		}
	}

	//////////////////////////////////////////////
	document.addEventListener('DOMContentLoaded', function() {
		const checkAll = document.getElementById('checkAll');
		const items = document.querySelectorAll('.c-item');
		if (checkAll) {
			// Khi tick "Chọn tất cả"
			checkAll.addEventListener('change', function() {
				items.forEach(cb => cb.checked = this.checked);
			});
			// Khi tick từng item, cập nhật lại trạng thái của "Chọn tất cả"
			items.forEach(cb => {
				cb.addEventListener('change', function() {
					checkAll.checked = [...items].every(i => i.checked);
				});
			});
		}
	});

	/////////xoa tung dong theo comp
	$(document).on('click', '.btnDeleteRow', function() {
		var btn = $(this);
		var id = btn.data('id');

		if (!confirm('Bạn có chắc muốn xoá mục này không?')) return;

		let comp = $(this).data('comp'); // lấy data-comp (nếu có)
		let url = currentUrl + '&act=dellistajax' + (comp !== 0 ? '&comp=' + comp : '');

		$.ajax({

			url: url,
			type: 'POST',
			data: {
				cid: id
			}, // gửi id duy nhất
			dataType: 'json',
			success: function(res) {
				if (res.success) {
					$('#orderMsg').addClass('show').html('<span><i class="fa fa-check"></i>Xoá thành công!</span>');
					btn.closest('tr').fadeOut(300, function() {
						$(this).remove();
					});
				} else {
					//alert('Xoá thất bại!');
					$('#orderMsg').html('<span>Lỗi: ' + (res.message || 'Không xác định') + '</span>');

				}
			},
			error: function(xhr, status, error) {
				console.error(xhr.responseText);
				alert('Lỗi khi gửi yêu cầu xoá!');
			}
		});
	});

	///////////xoa duong link////
	document.addEventListener('DOMContentLoaded', () => {
		const btnDeleteComp = document.getElementById('btnDelete');
		if (btnDeleteComp) {
			btnDeleteComp.addEventListener('click', () => {
				var ids = [];
				var rows = []; // lưu tr để xóa sau
				let comp = $(this).data('comp'); // lấy data-comp (nếu có)
				console.log(comp, currentUrl);

				$('input[name="cid[]"]:checked').each(function() {
					ids.push($(this).val());
					rows.push($(this).closest('tr'));
				});

				if (ids.length === 0) {
					alert('Vui lòng chọn ít nhất một mục để xóa!');
					return;
				}

				if (!confirm('Bạn có chắc muốn xóa các mục đã chọn không?')) return;


				let url = currentUrl + '&act=dellistajax' + (comp !== 0 ? '&comp=' + comp : '');

				$.ajax({
					url: url,
					type: 'POST',
					data: {
						cid: ids.join(',')
					},
					dataType: 'json',
					success: function(res) {
						if (res.success) {
							// ✅ Xóa trực tiếp các hàng được chọn
							$('#orderMsg').addClass('show').html('<span><i class="fa fa-check"></i>Xoá thành công!</span>');
							rows.forEach(function(row) {
								row.fadeOut(300, function() {
									$(this).remove();
								});
							});
							//alert('Đã xóa thành công!');
						} else {
							alert('Không thể xóa!');
						}
						setTimeout(function() {
							$('#orderMsg').removeClass('show');
							location.reload();
						}, 2000);
					},
					error: function(xhr, status, error) {
						console.error(xhr.responseText);
						alert('Lỗi khi gửi yêu cầu xóa!');
					}
				});
			});
		}

	});
	//////////////check quan he danh muc cha con//////////////////

	$(document).ready(function() {
		const checkboxes = $('input[name="parentids[]"]');

		// ========= 1️⃣ Khi thay đổi checkbox =========
		checkboxes.on('change', function() {
			const current = $(this);
			const currentId = current.val();
			const currentParent = current.data('parent');
			const isChecked = current.is(':checked');

			if (isChecked) {
				// 👉 Bỏ chọn tất cả checkbox khác (kể cả nhánh cũ)
				checkboxes.not(current).prop('checked', false)
					.removeAttr('data-autocheck')
					.prop('disabled', false);

				// 👉 Auto check tất cả cha của nhánh hiện tại
				checkAncestors(currentParent);
			} else {
				// 👉 Nếu bỏ chọn thì bỏ luôn các con
				uncheckChildren(currentId);
			}
		});

		// ========= 2️⃣ Khi load trang: tự động check cha =========
		$('input[name="parentids[]"]:checked').each(function() {
			const parentId = $(this).data('parent');
			if (parentId && parentId != 0) {
				checkAncestors(parentId);
			}
		});

		// ========= 3️⃣ Trước khi submit =========
		$('form').on('submit', function() {
			$('input[name="parentids[]"][data-autocheck="1"]').prop('disabled', true);
		});

		// ========= Hàm phụ trợ =========
		function checkAncestors(parentId) {
			let pid = parentId;
			while (pid && pid != 0) {
				const parentCheckbox = checkboxes.filter('[value="' + pid + '"]');
				parentCheckbox.prop('checked', true)
					.attr('data-autocheck', '1')
					.prop('disabled', true);
				pid = parentCheckbox.data('parent');
			}
		}

		function uncheckChildren(parentId) {
			checkboxes.filter('[data-parent="' + parentId + '"]').each(function() {
				$(this).prop('checked', false)
					.removeAttr('data-autocheck')
					.prop('disabled', false);
				uncheckChildren($(this).val());
			});
		}
	});

	///////////////////thêm mới danh mục//////////////
	$('#btnAddnew').on('click', function() {
		let comp = $(this).data('comp'); // lấy comp từ data attribute
		let url = currentUrl + '&act=add' + (comp !== 0 ? '&comp=' + comp : '');
		// Chuyển trang giống href cũ
		window.location.href = url;
	});
	////////////////////////////
	var loadFile = function(event) {
		var file = event.target.files[0];
		if (!file) return;

		// Hiển thị kích thước file
		document.querySelector('.Size').textContent = (file.size / 1024).toFixed(2) + ' KB';

		// Preview ảnh mới
		var image = document.getElementById('output');
		image.src = URL.createObjectURL(file);

		image.onload = function() {
			URL.revokeObjectURL(image.src); // giải phóng bộ nhớ
		};

		// Ẩn ảnh cũ khi chọn ảnh mới
		var currentImg = document.getElementById('current-img');
		if (currentImg) currentImg.style.display = 'none';
	};
	///////////////format gia/
	document.querySelectorAll('.InputPrice').forEach(input => {
		input.addEventListener('input', function() {
			// Lấy giá trị số, bỏ ký tự không phải số
			let number = this.value.replace(/\D/g, '');

			// Format VND
			if (number) {
				this.value = Number(number).toLocaleString('vi-VN');
			} else {
				this.value = '';
			}
		});
	});
	////////////copy dong////////////
	$('#btnRefresh').on('click', function() {
		const ids = [];
		$('input[name="cid[]"]:checked').each(function() {
			ids.push($(this).val());
		});
		let comp = $(this).data('comp'); // lấy data-comp (nếu có)
		if (ids.length === 0) {
			alert('Vui lòng chọn ít nhất một dòng để làm mới!');
			return;
		}

		if (!confirm('Bạn có chắc muốn sao chép các dòng này không?')) return;

		let url = currentUrl + '&act=refreshlistajax' + (comp !== 0 ? '&comp=' + comp : '');

		$.ajax({
			url: url,
			type: 'POST',
			data: {
				cid: ids.join(',')
			},
			dataType: 'json',
			success: function(res) {
				if (res.success) {
					//alert(res.message);
					location.reload();
				} else {
					alert(res.message || 'Lỗi không xác định!');
				}
			},
			error: function() {
				alert('Không thể kết nối máy chủ!');
			}
		});
	});
	/////////////////lam moi row/////////////
	$(document).on('click', '.btnUpdateNum', function() {
		const $btn = $(this);
		const $row = $btn.closest('tr');
		const id = $btn.data('id');
		let comp = $(this).data('comp'); // lấy data-comp (nếu có)
		let url = currentUrl + '&act=updatenumajax' + (comp !== 0 ? '&comp=' + comp : '');

		$.ajax({
			url: url,
			type: 'POST',
			data: {
				id
			},
			dataType: 'json',
			success: function(res) {
				if (res.success) {
					$row.find('.numInput').val(res.newNum);
					const $tbody = $row.closest('tbody');
					$row.fadeOut(150, function() {
						$row.prependTo($tbody).fadeIn(200);
					});
				} else {
					alert(res.message || 'Cập nhật thất bại');
				}
			},
			error: function(xhr) {
				console.error(xhr.responseText);
				alert('Lỗi kết nối máy chủ!');
			}
		});
	});


	// Xóa ảnh live bằng AJAX
	document.querySelectorAll('.remove-image').forEach(el => {
		el.addEventListener('click', function() {
			const id = this.dataset.id;
			if (!confirm('Bạn có chắc muốn xóa ảnh này?')) return;

			fetch('index.php?do=articlelist&act=deleteimage', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					},
					body: 'id=' + id
				})
				.then(res => res.json())
				.then(res => {
					if (res.success) {
						const parent = this.closest('.gallery-item');
						if (parent) parent.remove();
					} else {
						alert('Xóa thất bại!');
					}
				});
		});
	});

	// Preview ảnh mới trước khi upload
	document.addEventListener('DOMContentLoaded', function() {
		const multiimages = document.getElementById('multiimages');
		if (!multiimages) return; // tránh lỗi nếu không tìm thấy
		multiimages.addEventListener('change', function() {
			const preview = document.querySelector('.preview-gallery');
			for (const file of this.files) {
				const reader = new FileReader();
				reader.onload = function(e) {
					const div = document.createElement('div');
					div.className = 'gallery-item';
					div.innerHTML = `<img src="${e.target.result}"><div class="overlay"><span class="num">#new</span></div>`;
					preview.appendChild(div);
				};
				reader.readAsDataURL(file);
			}
		});
	});
	/////////////////////Luu danh muc khi đang bài viết////////////////
	const idForm = document.getElementById('ArticleForm');
	if (idForm) {
		idForm.addEventListener('submit', function(e) {
			// --- Checkbox tree logic ---
			const checked = Array.from(this.querySelectorAll('input[name="parentids[]"]:checked'));
			const allIds = new Set();

			checked.forEach(chk => {
				let id = parseInt(chk.value);
				allIds.add(id);

				let parentId = parseInt(chk.dataset.parent || 0);
				while (parentId) {
					allIds.add(parentId);
					const parentChk = this.querySelector('input[name="parentids[]"][value="' + parentId + '"]');
					parentId = parentChk ? parseInt(parentChk.dataset.parent || 0) : 0;
				}
			});

			this.querySelectorAll('input[name="parentids[]"]').forEach(chk => chk.checked = false);
			allIds.forEach(id => {
				const chk = this.querySelector('input[name="parentids[]"][value="' + id + '"]');
				if (chk) chk.checked = true;
			});

			// --- Bắt buộc nhập tiêu đề ---
			const titleInput = this.querySelector('#title_1'); // chỉ trong form
			if (titleInput && !titleInput.value.trim()) {
				titleInput.style.border = '1px solid red';
				alert('Vui lòng nhập tiêu đề!');
				titleInput.scrollIntoView({
					behavior: 'smooth',
					block: 'center'
				});
				titleInput.focus();
				e.preventDefault(); // ngăn submit
			} else if (titleInput) {
				titleInput.style.border = ''; // reset nếu có giá trị
			}
		});
	}
</script>
{/literal}