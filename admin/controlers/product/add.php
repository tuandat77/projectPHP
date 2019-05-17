<?php 
global $db;
$xtpl =  new XTemplate("views/product/add.html");
if($_POST){
	$name = $_POST["txtName"];
	$id = $_POST["txtID"];
	if(strlen($name)>0){
		$ar["name"]="'$name'";
		$ar["id"]="'$id'";
		$db->insert('categories',$ar);
	}
}

$xtpl->parse("ADD");
$aaa = $xtpl->text("ADD");