<?php

class ProductoModel {

    private $db;
    
    function __construct(){
        $this->db = $this->Connect();
    }

    private function Connect(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_almacen;charset=utf8', 'root', '');
        return $db;
    }

    function GetProducts(){
        $query = $this->db->prepare("SELECT `p`.`id` as `id_producto`, `p`.`nombre` as `nombre_producto`, `p`.`descripcion` as `desc_producto`, `p`.`precio` as `precio`, `p`.`stock` as `stock`, `c`.`id` as `id_categoria`, `c`.`nombre` as `nombre_categoria` FROM producto p INNER JOIN categoria c ON `p`.`id_categoria`=`c`.`id` ORDER BY  `p`.`nombre`");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    function GetProduct($id_product){
        $sentencia = $this->db->prepare("SELECT `p`.`id` as `id_producto`, `p`.`nombre` as `nombre_producto`, `p`.`descripcion` as `desc_producto`, `p`.`precio` as `precio`, `p`.`stock` as `stock`, `c`.`id` as `id_categoria`,`c`.`nombre` as `nombre_categoria` FROM producto p INNER JOIN categoria c ON `p`.`id_categoria`=`c`.`id` WHERE `p`.`id`=?");
        $sentencia->execute(array($id_product));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetProductsByCategory($id_categoria){
        $sentencia = $this->db->prepare("SELECT `p`.`nombre` as `nombre_producto`,`p`.`id` as `id_producto`, `p`.`descripcion` as `desc_producto`, `c`.`nombre` as `nombre_categoria` FROM producto p INNER JOIN categoria c ON `p`.`id_categoria`=`c`.`id` AND `c`.`id`=?");
        $sentencia->execute(array($id_categoria));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function Delete($id_producto){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $sentencia->execute(array($id_producto));
    }

    function InsertProduct($producto,$description,$precio,$stock,$categoria){
        $sentencia = $this->db->prepare("INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `id_categoria`) VALUES (NULL, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($producto,$description,$precio,$stock,$categoria));
    }
   
    function EditProduct($id_producto,$producto,$description,$precio,$stock,$categoria){
        $sentencia = $this->db->prepare("UPDATE `producto` SET `nombre`=?, `descripcion`=?, `precio`=?, `stock`=?, `id_categoria`=? WHERE `producto`.`id`=?");
        $sentencia->execute(array($producto, $description, $precio, $stock, $categoria, $id_producto));    
    }
}

?>