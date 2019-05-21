<?php 
global $db;
if($_GET){
    $id = $_GET["id"];
    $db->delete('categories',$id);
    header("Location:?m=product&a=list");
}
