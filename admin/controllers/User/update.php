<?php
global $db;
$xtpl =  new XTemplate("views/user/update.html");
$id = $_GET['id'];
if($id){
	$ar = $db->getAll('tbluser',"id={$id}");
	$r = $ar[0];
	$xtpl->assign('UPDATES_USER',$r);
}
if($_POST){
    $user    = $_POST['user'];
    $email   = $_POST['email'];
    $f_name  = $_POST['f_name'];
    $l_name  = $_POST['l_name'];
    $gender  = $_POST['gender'];
    $f=1;
$arCat = array('user'=>$user
		,'email'=>$email
		,'f_name'=>$f_name
		,'l_name'=>$l_name
		,'gender'=>$gender);

    if(strlen($user)==0 ) {                        
        $error_user_mess= "<font color='red'>User field is empty.</font><br/>"; 
        $f=0; 
        $xtpl->assign('error_user',$error_user_mess);     
	}
    if(strlen($email)==0 ) {                        
       	$error_email_mess= "<font color='red'>Email field is empty.</font><br/>"; 
       	$f=0; 
      	$xtpl->assign('error_email',$error_email_mess);         
    }
    if(strlen($f_name)==0 ) {                        
      	$error_fname_mess= "<font color='red'>First Name field is empty.</font><br/>"; 
       	$f=0; 
       	$xtpl->assign('error_f_name',$error_fname_mess);      
    }
    if(empty($l_name) ) {                        
        $error_lname_mess= "<font color='red'>Last Name field is empty.</font><br/>"; 
       	$f=0; 
       	$xtpl->assign('error_f_name',$error_lname_mess);      
    }
    if(empty($gender) ) {                        
        $error_gender_mess= "<font color='red'>Gender field is empty.</font><br/>"; 
       	$f=0; 
       	$xtpl->assign('error_gender',$error_gender_mess);
    }   	
    if($f==1){   	
        $isInsert = $db->updates('tbluser'," id={$id} ",$arCat);
       	header("Location:?m=user&a=list");
    }
$xtpl->assign('UPDATES_USER',$arCat);
}

$xtpl->parse("UPDATES_USER");
$aaa = $xtpl->text("UPDATES_USER");
?>