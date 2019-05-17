<?php
    include("../libs/XTemplate.class.php");
    include("../libs/Model.class.php");
    $dsn = "mysql:host=localhost;port=3306;dbname=c1808l";
    $db = new Model('root','',$dsn);
    $xtp = new XTemplate("views/index.html");
    $m = $_GET['m'];
    $a = $_GET['a'];
    if(file_exists("controllers/{$m}/{$a}.php")){
        include("controllers/{$m}/{$a}.php");
        $xtp->assign("content",$aaa);
    }else{
        echo  "404 Not Found";
    }

    
    $xtp->parse("LAYOUT");
    $xtp->out("LAYOUT");




