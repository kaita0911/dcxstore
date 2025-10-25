<?php
/////////load danh mục sản phẩm
$sqldmsp = "select * from $GLOBALS[db_sp].categories where pid=5 order by num asc, id desc";
$rsdmsp = $GLOBALS["sp"]->getAll($sqldmsp);
$smarty->assign("menudmsp",$rsdmsp);

/////////load sản phẩm mới
$sqlprn = "select * from $GLOBALS[db_sp].products where active=1 order by num asc, id desc limit 6";
$rsdprn = $GLOBALS["sp"]->getAll($sqlprn);
$smarty->assign("leftPrnew",$rsdprn);

/////////load sản phẩm mới
$sqlview = " select * from $GLOBALS[db_sp].articles where active=1 order by view desc limit 6";
$rsview = $GLOBALS["sp"]->getAll($sqlview);
$smarty->assign("leftNew",$rsview);

/////////load video
$sql = "select * from $GLOBALS[db_sp].infos where id=3";
$rs = $GLOBALS["sp"]->getRow($sql);
$smarty->assign("leftVideo",$rs);
?>