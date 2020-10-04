<?php

class AlmacenModel {

    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_almacen;charset=utf8', 'root', '');
    }
            
    function GetProducts(){
        $sentencia = $this->db->prepare("SELECT * FROM producto");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function GetProduct($id_product){
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id=?");
        $sentencia->execute(array($id_product));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetCategories(){
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }    

    function GetProductsByCategory($id_categoria){
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id_categoria=?");
        $sentencia->execute(array($id_categoria));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}

?>