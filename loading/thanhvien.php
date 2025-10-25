<?php 

	include_once("../#include/config.php");

	include_once("../functions/function.php");

	$type = isset($_REQUEST["type"])?$_REQUEST["type"]:"";

	$error = '';

	switch($type)

	{	

		case 'register':

			//$arr['gioitinh'] = ceil($_POST['gioitinh']);

			$arr['name'] = striptags($_POST['name']);

			$arr['email'] = $email = striptags($_POST['email']);

			//$arr['phone'] = striptags($_POST['phone']);

			//$arr['address'] = striptags($_POST['address']);

			$password = $_POST['password'];

			$arr['password'] = md5($password);

			if(!empty($email)){

				$sql = "select * from $GLOBALS[db_sp].member where BINARY `email`='$email'";

				$count = ceil(count($GLOBALS["sp"]->getAll($sql)));

				if($count > 0)

					$error = "Địa chỉ email này đã tồn tại.";

			}

			if(!empty($error)){

				die(json_encode(array('status'=>'error','errors'=>$error)));

			} 

			else {

				$id = vaInsert('member',$arr);

				$sql = "select * from $GLOBALS[db_sp].member where id=$id";

				$rs = $GLOBALS["sp"]->getRow($sql);

				$_SESSION['GAUBONGCAOCAP_MEMBER_ID'] = $rs["id"];

				$_SESSION['GAUBONGCAOCAP_MEMBER_NAME'] = $rs["name"];

				$_SESSION['GAUBONGCAOCAP_MEMBER_EMAIL'] = $rs["email"];

				die(json_encode(array('status'=>'success','msg'=>'111')));

			}

		break;

		

		case 'login':

			$email = addslashes(trim($_POST['email']));

			$pw = $_POST['password'];

			if(!empty($email) && !empty($pw)){

				

				$password=md5($pw);

				$sql = "SELECT * FROM $GLOBALS[db_sp].member where email='$email' and password='$password' limit 1";

				$rs = $GLOBALS["sp"]->GetRow($sql);

				//die($rs["email"] . " pw: ". $rs["password"]);			

				//die($sql);

				if(!empty($rs["id"]) && !empty($rs["email"]) == $email && !empty($rs["password"]) == $password)

				{

					$_SESSION['GAUBONGCAOCAP_MEMBER_ID'] = $rs["id"];

					$_SESSION['GAUBONGCAOCAP_MEMBER_NAME'] = $rs["name"];

					$_SESSION['GAUBONGCAOCAP_MEMBER_EMAIL'] = $rs["email"];

				}

				else   $error = 'Địa chỉ email hoặc mật khẩu không đúng.';

			}

			

			//die($sql);

			if(!empty($error)){

				die(json_encode(array('status'=>'error','errors'=>$error)));

			} 

			else {

				die(json_encode(array('status'=>'success','msg'=>'111')));

			}

		break;



		case 'changepw':

			$oldpw = isset($_POST['passwordold'])?$_POST['passwordold']:"";

			$pw = isset($_POST['password'])?$_POST['password']:"";

			//die($oldpw);

			if(!empty($oldpw)){

				$oldpw = md5($oldpw);

				$sql = "SELECT * FROM $GLOBALS[db_sp].member where id=".$_SESSION['GAUBONGCAOCAP_MEMBER_ID']." and password='$oldpw' limit 1";

				$count = ceil(count($GLOBALS["sp"]->GetAll($sql)));

				if(!$count)

					$error =  "Mật khẩu cũ không đúng.";

			}

			

			if(empty($error)){

				$password = md5($pw);

				$sql =  " UPDATE $GLOBALS[db_sp].member SET

						  password='$password' WHERE

						  id = ".$_SESSION['GAUBONGCAOCAP_MEMBER_ID']."

				";

				$GLOBALS["sp"]->execute($sql);

				

			}

			if(!empty($error)){

				die(json_encode(array('status'=>'error','errors'=>$error)));

			} 

			else {

				die(json_encode(array('status'=>'success','msg'=>'111')));

			}

			

		break;

			case 'emailpromotion':

			$email = striptags(trim($_POST['email']));

			$checkEmail = validate_email($email);

			$arrDay = getdate();

			$arr['dated'] = $arrDay['year'].'-'.$arrDay['mon'].'-'.$arrDay['mday'];

			$arr['email'] = $email;

			if($checkEmail){

				$sql = "select * from $GLOBALS[db_sp].email where BINARY `email`='$email' limit 1";

				$rs = $GLOBALS["sp"]->getAll($sql);

				$count = ceil(count($rs));

				if($count > 0){

					$number = $rs[0]['number'] + 1;

					$sqls =  " UPDATE $GLOBALS[db_sp].email SET

						  		number='".$number."',

								dated='".$arr['dated']."'

						  		WHERE id = ".$rs[0]['id']."

					";

					$GLOBALS["sp"]->execute($sqls);		

				}

				else{

					$id = vaInsert('email',$arr);	

				}

			}

			else{

				$error = 'Địa chỉ email không đúng.';		

			}

			if(!empty($error)){

				die(json_encode(array('status'=>'error','errors'=>$error)));

			} 

			else {

				die(json_encode(array('status'=>'success','msg'=>'111')));

			}

		break;	

			

		case 'forgot':

			require_once('../libraries/phpmailer/class.phpmailer.php');

			$email = isset($_POST['email'])?$_POST['email']:"";

		

			if(!empty($email) && empty($error)){

				$sql = "SELECT * FROM $GLOBALS[db_sp].member where email='$email' limit 0,1";

				$count = ceil(count($GLOBALS["sp"]->GetAll($sql)));

			

				if(!empty($count))

				{

					$pw = rand (2,"123456789QWERTYUIOPASDFGHJKLZXCVBNM");

					$password = md5($pw);

					$fh = fopen("../EmailTemplate/forgot_password.html", 'r');

					$template = fread($fh, filesize("../EmailTemplate/forgot_password.html"));

					fclose($fh);

					

					$template = str_replace('[LINK]',$pw,$template);

					//die($template);

					///send mail

					$msg = $template;

					$subject = "Forgot Password";

					$mail_to = trim($email);

					$mailsend = sendmailAjax("Forgot Password",$mail_to,$subject,$msg);

					

					if(!$mailsend){

						$error = "mail not sent";

					}

					else{

						$sql = "UPDATE $GLOBALS[db_sp].member set password='$password' where email='$email' ";

						$GLOBALS["sp"]->execute($sql);

					}

				}

				else   $error = 'Địa chỉ email không tồn tại.';

			

			}

			

			if(!empty($error)){

				die(json_encode(array('status'=>'error','errors'=>$error)));

			} 

			else {

						

				die(json_encode(array('status'=>'success','errors'=>"111")));

			}

			

		break;

		

		case 'signout':

			unset($_SESSION['GAUBONGCAOCAP_MEMBER_ID']);

			unset($_SESSION['GAUBONGCAOCAP_MEMBER_NAME']);	

			unset($_SESSION['GAUBONGCAOCAP_MEMBER_EMAIL']);

			die(json_encode(array('status'=>'success')));

		break;

        case 'taovandon':

			$arr['name'] = trim($_POST['nametvd']);

			$arr['email'] = $email = trim($_POST['emailtvd']);

			$arr['phone'] = trim($_POST['phonetvd']);

			//$arr['address'] = trim($_POST['addresstvd']);

			$arr['content'] = trim($_POST['contenttvd']);

			

			$arrDay = getdate();

			$arr['dated'] = $arrDay['year'].'-'.$arrDay['mon'].'-'.$arrDay['mday'];

			vaInsert('taovandon',$arr);

			

			$template = 'Thời gian :' . $arr['dated'] . '<br/><br/>';

			

			$template .= '<ul style="border:1px solid #ccc; float:left; width:85%; color:#000">';

			$template .= '<li style="border-bottom:1px solid #ccc; padding:7px 0">Họ và Tên' . $arr['name'] . '</li>';

			$template .= '<li style="border-bottom:1px solid #ccc; padding:7px 0">Email :' .$arr['email'] . '</li>';

			$template .= '<li style="border-bottom:1px solid #ccc; padding:7px 0">Điện thoại :' . $arr['phone'] . '</li>';

			//$template .= '<li style="border-bottom:1px solid #ccc; padding:7px 0">Địa chỉ :' . $arr['address'] . '</li>';

			$template .= '<li style="padding:7px 0">Nội dung  :' . $arr['content'] . '</li>';

			$template .= '<ul>';



			$sql = "select * from $GLOBALS[db_sp].infos where id=6" ;

			$rsemail = $GLOBALS['sp']->getRow($sql);

			$mail_to = strip_tags($rsemail['plain_text_vn']);

			$mailcc = $email;

			$mailreply = $email;  

			$msg = $template;



			$sql = "select * from $GLOBALS[db_sp].infos where id=2 ";

            $rsdomain = $GLOBALS['sp']->getRow($sql);

            $domain = strip_tags($rsdomain['domain']);



			$subject = "Khách hàng đăng ký " . $domain;

			$MAIL_FROMNAME = "Khách hàng đăng ký " . $domain;

			$user = $domain;

			$mailsend = sendmailAjax($user,$mail_to,$subject,$msg,$mailreply,$mailcc,$mailcc1,$MAIL_FROMNAME);

			if(!$mailsend){

				$error = 'Lỗi trong khi gởi mail vui lòng liên hệ với hotline, để được tư vấn tốt hơn.';		

			}

			else

            

			die(json_encode(array('status'=>'success','msg'=>'111')));

		break;		

}

	



 

 ?>