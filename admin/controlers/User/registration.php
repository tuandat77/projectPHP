<?php 
global $db;
$xtpl =  new XTemplate("views/user/registration.html");
if($_POST){
	$user = $_POST["txtuser"];
	$email = $_POST["txtemail"];
	$password = $_POST["txtPassword"];
	$f_name = $_POST["txtFirstname"];
	$l_name = $_POST["txtLastname"];
	$gender = $_POST["gender"];	
	$cfpassword = $_POST["txtCfpassword"];
	$f =1;
	if(strlen($user)==0  ){
		$f=0;
		$xtpl->assign("username_mess","Please enter your user name !");
	}
	if(strlen($email)==0  ){
		$f=0;
		$xtpl->assign("email_mess","Please enter your email !");
	}
	if(strlen($password)<8  ){
		$f=0;
		$xtpl->assign("pass_mess","Please enter your password !");
	}
	if(strlen($cfpassword)<8 || $cfpassword != $password ){
		$f=0;
		$xtpl->assign("confirm_mess","Please enter confirm password !");
	}
	if(strlen($f_name)==0  ){
		$f=0;
		$xtpl->assign("fname_mess","Please enter your first name !");
	}
	if(strlen($l_name)==0  ){
		$f=0;
		$xtpl->assign("lname_mess","Please enter your last name !");
	}
	if(strlen($gender)==0  ){
		$f=0;
		$xtpl->assign("gender_mess","Please enter your gender !");
	}

	if($f==1){
		$ar["user"]="'{$user}'";
		$ar["email"]="'{$email}'";
		$ar["password"]="'{$password}'";
		$ar["f_name"]="'{$f_name}'";
		$ar["l_name"]="'{$l_name}'";
		$ar["gender"]="'{$gender}'";
		

		$db->insert('tbluser',$ar);
		header("Location:?m=user&a=list");
	}
}


$xtpl->parse("REGISTRATION");
$aaa = $xtpl->text("REGISTRATION");