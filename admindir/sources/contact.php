<?php
// ==========================
// Contact Controller
// ==========================
$act  = $_REQUEST['act'] ?? '';
$type = intval($_REQUEST['type'] ?? 0);
$city = intval($_REQUEST['city'] ?? 1);
$page = intval($_GET['p'] ?? 1);

global $db_sp, $sp, $numPageAll, $smarty;

switch ($act) {
	// ==========================
	// EDIT CONTACT
	// ==========================
	case 'edit':

		$id = intval($_GET['id'] ?? 0);
		$sql = "SELECT * FROM {$db_sp}.contact WHERE id = {$id}";
		$rs = $sp->getRow($sql);

		$smarty->assign('edit', $rs);
		$template = 'contact/edit.tpl';
		break;

	// ==========================
	// DELETE MULTIPLE CONTACTS
	// ==========================
	case 'dellist':


		$ids = $_POST['iddel'] ?? [];
		if (!empty($ids)) {
			foreach ($ids as $id) {
				$id = intval($id);
				$sql = "DELETE FROM {$db_sp}.contact WHERE id = {$id}";
				$sp->execute($sql);
			}
		}

		$url = "index.php?do=contact&cid=" . ($_GET['cid'] ?? 0) . "&p=" . ($page ?? 1);
		page_transfer2($url);
		break;

	// ==========================
	// DEFAULT: LIST CONTACTS
	// ==========================
	default:
		$sql = "SELECT * FROM {$db_sp}.contact ORDER BY id DESC";
		$allContacts = $sp->getAll($sql);
		$total = count($allContacts);

		$num_rows_page = $numPageAll ?? 20;
		$num_page = max(1, ceil($total / $num_rows_page));
		$begin = max(0, ($page - 1) * $num_rows_page);

		$url = 'index.php?do=contact';
		$iSEGSIZE = 50;
		$link_url = ($num_page > 1) ? paginator($num_page, $page, $iSEGSIZE, $url) : '';

		// Lấy dữ liệu phân trang
		$sql .= " LIMIT {$begin}, {$num_rows_page}";
		$rs = $sp->getAll($sql);

		// $smarty->assign([
		// 	'link_url' => $link_url,
		// 	'view' => $rs,
		// 	'checkPer1' => checkPermision($idpem, 1) ? 'true' : 'false',
		// 	'checkPer2' => checkPermision($idpem, 2) ? 'true' : 'false',
		// 	'checkPer3' => checkPermision($idpem, 3) ? 'true' : 'false',
		// ]);

		$template = 'contact/list.tpl';
		break;
}

// ==========================
// Render Smarty
// ==========================
$smarty->assign('tabmenu', 3);
$smarty->display('header.tpl');
$smarty->display($template);
$smarty->display('footer.tpl');
