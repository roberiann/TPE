<?php

class CategoriaModel {

    private $db;
    
    function __construct(){
        $this->db = $this->Connect();
    }

    private function Connect(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_almacen;charset=utf8', 'root', '');
        return $db;
    }

        function GetCategories(){
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }    

}

?>