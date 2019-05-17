<?php
    class Model extends PDO{
        protected $_db;
        public function __construct($usr,$pwd,$dsn){
            try{
                $this->_db =  new PDO($dsn,$usr,$pwd);
                
            }catch(PDOException $er){
                echo "Not connect to database";
            }
           // var_dump($this->_db);
        }
        public function execSQL($sql){
            $stmt = $this->_db->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function getAll($tbl,$where){
            $rs = array();
            $sql = "SELECT * FROM {$tbl} WHERE {$where}";
            $stmt = $this->execSQL($sql);
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //print_r($rs);
            return $rs;

        }
        public function fetchAlls($sql){
            return  $this->_db->query($sql);

        }
        public function insert($tbl,$ar=array()){
            $arkey = array_keys($ar);
            $lskey = implode(',',$arkey);
            $arvalue = array_values($ar);
            $lsvalue = implode(',' , $arvalue);
            $sql = "INSERT INTO {$tbl} ({$lskey}) VALUES ({$lsvalue})";
            $stmt = $this->execSQL($sql);                   
        }
        public function delete($tbl,$id){
            $sql = "DELETE FROM {$tbl} WHERE id={$id}";
            $stmt = $this->execSQL($sql);
        }
        public function updates($tbl,$condition,$ar=array()){
            foreach($ar as $k => $v){
                $arset[]=" {$k} = '{$v}'";
            }
            $strSET=implode(',', $arset);
            echo $sql=" UPDATE {$tbl} SET {$strSET} WHERE {$condition} ";
            $stmt=$this->execSQL($sql);

        }

    }

   