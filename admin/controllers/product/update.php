<?php
global $db;
$xtpl =  new XTemplate("views/product/update.html");
$id = $_GET['id'];
if($id){
	$ar = $db->getAll('categories',"id={$id}");
	$r = $ar[0];
	$xtpl->assign('UPDATES',$r);
}

if($_POST){
    $name    = $_POST['name'];
    $f=1;
	$arCat = array('name'=>$name);
    if(empty($name) ) { 
     	$f=0;
        $error_name_mess= "<font color='red'>Name field is empty.</font><br/>"; 
        $xtpl->assign('error_name',$error_name_mess);    
    }
    if($f==1)
    {
        $isInsert = $db->updates('categories'," id={$id} ",$arCat);
       	header("Location:?m=product&a=list");

    }
    $xtpl->assign('UPDATES',$arCat);
}

$xtpl->parse("UPDATES");
$aaa = $xtpl->text("UPDATES");
?>