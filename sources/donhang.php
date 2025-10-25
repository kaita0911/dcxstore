<?php
if($_POST){
	$keydonhang = trim(isset($_REQUEST['searchdonhang'])?$_REQUEST['searchdonhang']:"");
	session_register('searchdonhang');
	$_SESSION['searchdonhang'] = strSpace($keydonhang);
	
}
$smarty->assign("keydonhang",$keydonhang);
$sql = "select * from $GLOBALS[db_sp].orders where phone = '".$_SESSION['searchdonhang']."' or email = '".$_SESSION['searchdonhang']."'  ";
$seo = array(
    "name_vn" => 'Xem đơn hàng',
	"title" => 'Xem đơn hàng',
    "content_vn" => "",
);
$rs = $GLOBALS["sp"]->getAll($sql);
$smarty->assign("view",$rs);

if(ceil(count($rs))<=0){
	echo"<script type=\"text/javascript\">	
		alert('không tìm thấy đơn hàng');
		document.location.href= '".$path_url."'
	</script>";
}
$smarty->assign("checkSearchDonhang",ceil(count($rs)));
$template = "donhang/view.tpl";

$smarty->assign("seo",$seo);		
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");
?>