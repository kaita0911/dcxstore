<?php
//$linkTitle = getLinkTitle($cat['id'],1);
if($_POST){
	$arr['name'] = striptags($_POST['name']);
	$arr['phone'] = striptags($_POST['phone']);
	$arr['email'] = trim($_POST['email']);
	//$arr['title'] = trim($_POST['title']);
	$arr['message'] = striptags($_POST['message']);
	
	$template .= 'Liên hệ <br/> <br/>';
	$template .= 'Họ và tên :' . $arr['name'] . '<br/>';
	$template .= 'Email :' . $arr['email'] . '<br/>';
	$template .= 'Số điện thoại :' . $arr['phone'] . '<br/>';
	//$template .= 'Tiêu đề :' . trim($_POST['title']) . '<br/>';
	$template .= 'Yêu cầu :' . $arr['message'] . '<br/>';
	///////load email lien he 
	$sql = "select plain_text_vn from $GLOBALS[db_sp].infos where id=6 " ;
	$mail_to = strip_tags($GLOBALS['sp']->getOne($sql));
	$mailreply = trim($_POST['email']);
	$mail_subject = trim($_POST['name']);
	$msg = $template;
	$subject = $mail_subject;
	$mail_fromname = "Liên hê";
	$mailsend = sendmail('Liên hệ',$mail_fromname,$mail_to,$subject,$msg,$mailreply,$mailcc,$mailcc1);
	if($mailsend){
		$smarty->display("contact/finish.tpl");
	}
	else die("mail not sent");
	
	$arrDay = getdate();
	$arr['dated'] = $arrDay['year'].'-'.$arrDay['mon'].'-'.$arrDay['mday'];
	vaInsert('contact',$arr);
	$smarty->display("contact/finish.tpl");
}
$sql = "select * from $GLOBALS[db_sp].infos where id=3";
$rs = $GLOBALS["sp"]->getRow($sql);
$smarty->assign("addressContact",$rs);


$template = "contact/view.tpl";
$smarty->assign("seo",$cat1);
$smarty->assign("checkcontact",1);
$smarty->display("./header.tpl");
$smarty->display($template);
$smarty->display("./footer.tpl");

?>