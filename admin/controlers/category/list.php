<?php
    $xtpl =  new XTemplate("views/category/list.html");
   
    $ar =  array(
            array('cat_name'=>"PHP")
            ,array('cat_name'=>"Java")
            ,array('cat_name'=>"Python")
    );
    $nbr = 1;
    foreach($ar as $r){
        $r['i'] = $nbr++;
        $xtpl->insert_loop("LIST.LOOP", array("LOOP"=>$r));
    }
    $xtpl->parse("LIST");
    $aaa = $xtpl->text("LIST");