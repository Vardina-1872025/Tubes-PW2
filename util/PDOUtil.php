<!-- NAMA : Dinda Ayu Febriani -->
<!-- NRP : 1872043 -->
<?php

class PDOUtil{
    public static function createConnection(){
        $link = new PDO("mysql:host=localhost; dbname=tubespw2", "root", "");
        $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
        $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $link;
    }
    
    public static function closeConnection(PDO $link){
        if($link != null){
            $link = null;
        }
    }
}