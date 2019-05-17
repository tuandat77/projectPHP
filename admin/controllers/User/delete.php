<?php 
global $db;
if($_GET){
    $id = $_GET["id"];
    $db->delete('tbluser',$id);
    header("Location:?m=user&a=list");
}