<?php
include("../#include/config.php");
include("../functions/function.php");

$city_id = $_POST['city_id'];


$sql = "SELECT * FROM $GLOBALS[db_sp].quanhuyen where matp=$city_id and active=1 order by name";
$rs = $GLOBALS["sp"]->GetAll($sql);
foreach($rs as $item)
{
	
		$center .= '<option  value="'.$item['maqh'].'" >'.$item['name'].'</option>';;
}
echo json_encode($center);
?>