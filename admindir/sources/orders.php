<?php
global $sp, $db_sp;

$act  = $_REQUEST['act'] ?? '';
$page = max(1, intval($_GET['page'] ?? 1));

// =========================
// Lấy thông tin chung
// =========================
$info = $sp->getRow("SELECT * FROM {$db_sp}.infos WHERE id = 21");
$smarty->assign("infos14", $info);

// =========================
// Xử lý các hành động
// =========================
switch ($act) {

	case "edit":
		$id = intval($_GET['id'] ?? 0);
		if ($id > 0) {
			$order = $sp->getRow("SELECT * FROM {$db_sp}.orders WHERE id = ?", [$id]);
			$order_lines = $sp->getAll("SELECT * FROM {$db_sp}.orders_line WHERE order_id = ?", [$id]);
			$smarty->assign("edit", $order);
			$smarty->assign("order_line_view", $order_lines);
		}
		$template = "orders/edit.tpl";
		break;

	case "dellistajax":
		ob_clean(); // Xóa output trước đó
		$ids = $_POST['cid'] ?? '';
		if ($ids) {
			$idList = array_map('intval', explode(',', $ids));
			$idStr = implode(',', $idList);

			// Xóa chi tiết trước, rồi xóa đơn hàng
			$sp->query("DELETE FROM {$db_sp}.order_line WHERE order_id IN ($idStr)");
			$sp->query("DELETE FROM {$db_sp}.orders WHERE id IN ($idStr)");

			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
		exit;

	default:
		// =========================
		// Danh sách đơn hàng + phân trang
		// =========================
		$num_rows_page = 100;

		// Lấy tổng số bản ghi
		$total = $sp->getOne("SELECT COUNT(*) FROM {$db_sp}.orders");

		$num_page = max(1, ceil($total / $num_rows_page));
		$begin = ($page - 1) * $num_rows_page;

		$orders = $sp->getAll("SELECT * FROM {$db_sp}.orders ORDER BY id DESC LIMIT $begin, $num_rows_page");

		// Pagination
		$url = "index.php?do=orders";
		$iSEGSIZE = 10;
		$link_url = $num_page > 1 ? paginator($num_page, $page, $iSEGSIZE, $url) : '';

		$smarty->assign([
			"view"     => $orders,
			"link_url" => $link_url,
			"number"   => $num_rows_page * ($page - 1)
		]);

		$template = "orders/list.tpl";
		break;
}

// =========================
// Render template
// =========================

$smarty->display("header.tpl");
$smarty->display($template);
$smarty->display("footer.tpl");
