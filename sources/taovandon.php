<?php
$act = isset($_REQUEST['act'])?$_REQUEST['act']:"";
$type = isset($_REQUEST['type'])?$_REQUEST['type']:0;
$city = isset($_REQUEST['city'])?$_REQUEST['city']:1;
$idpem = -1;
switch($act){
	case "edit":
		/*
		if(!checkPermision($idpem,2)){
			page_permision();
			$page = "index.php?do=taovandon&cid=".$_GET['cid']."&type=$type&city=$city";
			page_transfer2($page);
		}
		else{
		*/
			$id  = $_GET["id"];
			$sql = "select * from $GLOBALS[db_sp].taovandon where id=$id";
			$rs = $GLOBALS["sp"]->getRow($sql);
					
			$smarty->assign("edit",$rs);	
			$template = "taovandon/edit.tpl";
		//}
	break;

	case "dellist":
		if(!checkPermision($idpem,3)){
			page_permision();
			$page = "index.php?do=taovandon&cid=".$_GET['cid'];
			page_transfer2($page);
		}
		else{
			$id=$_POST["iddel"];
			for($i=0;$i<count($id);$i++){
				$sql="delete from $GLOBALS[db_sp].taovandon  where id=".$id[$i];
				$GLOBALS["sp"]->execute($sql);
			}
			
			$url = "index.php?do=taovandon&cid=".$_GET['cid']."&p=".$_REQUEST['p'];
			page_transfer2($url);
		}
	break;

	default:
		$sql="select * from $GLOBALS[db_sp].taovandon order by id desc ";
		$total = count($GLOBALS["sp"]->getAll($sql));
		$num_rows_page = $numPageAll;
		$num_page = ceil($total/$num_rows_page);
		
		$begin = ($page - 1)*$num_rows_page;
		$url = "index.php?do=taovandon"; //set url for paginator
		$iSEGSIZE=50;
		$link_url = "";
		
		if($num_page > 1 )
			$link_url = paginator($num_page,$page,$iSEGSIZE,$url);
		
		$sql = $sql." limit $begin,$num_rows_page";
		$rs = $GLOBALS["sp"]->getAll($sql);
		
		$smarty->assign("link_url",$link_url);
		$smarty->assign("view",$rs);
		
		$template = "taovandon/list.tpl";
		/////check Perm
		if(checkPermision($idpem,1))
			$smarty->assign("checkPer1","true");
		
		if(checkPermision($idpem,2))
			$smarty->assign("checkPer2","true");
		
		if(checkPermision($idpem,3))
			$smarty->assign("checkPer3","true");
		
	break;
}
$smarty->assign("tabmenu",5);

$smarty->display("header.tpl");
$smarty->display($template);
$smarty->display("footer.tpl");

?>