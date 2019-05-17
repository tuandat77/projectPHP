<?php
global $db;
$xtpl =  new XTemplate("views/user/list.html");
$ar = $db->getAll('tbluser',' 1=1  ORDER BY ID DESC');
foreach($ar as $r){
        $xtpl->insert_loop("REGISTRATION.LOOP", array("LOOP"=>$r));
    }

$xtpl->parse("REGISTRATION");
$aaa = $xtpl->text("REGISTRATION");