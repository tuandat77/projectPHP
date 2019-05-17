<?php
global $db;
$xtpl =  new XTemplate("views/product/list.html");
//$sql = "SELECT * FROM categories WHERE 1=1";
$ar = $db->getAll('categories',' 1=1  ORDER BY ID DESC');
foreach($ar as $r){
    $xtpl->insert_loop("PRODUCT.LOOP", array("LOOP"=>$r));
}
$xtpl->parse("PRODUCT");
$aaa = $xtpl->text("PRODUCT");