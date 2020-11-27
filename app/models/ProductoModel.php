<?php

require_once 'app/helpers/db.helper.php';

class ProductoModel
{

    private $db;
    private $dbHelper;

    function __construct()
    {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    function GetProducts()
    {
        $query = $this->db->prepare("SELECT p.id as id_producto, p.nombre as nombre_producto, p.descripcion as desc_producto, p.precio as precio, p.stock as stock, p.imagen as imagen, c.id as id_categoria, c.nombre as nombre_categoria FROM producto p INNER JOIN categoria c ON p.id_categoria=c.id ORDER BY p.nombre");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function GetProduct($id_product)
    {
        $sentencia = $this->db->prepare("SELECT p.id as id_producto, p.nombre as nombre_producto, p.descripcion as desc_producto, p.precio as precio, p.stock as stock, p.imagen as imagen, c.id as id_categoria, c.nombre as nombre_categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id WHERE p.id=?");
        $sentencia->execute(array($id_product));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function GetProductsByCategory($id_categoria)
    {
        $sentencia = $this->db->prepare("SELECT `p`.`nombre` as `nombre_producto`,`p`.`id` as `id_producto`, `p`.`descripcion` as `desc_producto`, `c`.`nombre` as `nombre_categoria` FROM producto p INNER JOIN categoria c ON `p`.`id_categoria`=`c`.`id` AND `c`.`id`=?");
        $sentencia->execute(array($id_categoria));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function Delete($id_producto)
    {
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $sentencia->execute(array($id_producto));
    }
    function DeleteImage($id_producto)
    {
        $sentencia = $this->db->prepare("UPDATE producto SET IMAGEN = NULL WHERE `producto`.`id` = ?");
        $sentencia->execute(array($id_producto));
    }

    function insert($producto, $description, $precio, $stock, $categoria, $imagen = null)
    {
        $sentencia = $this->db->prepare("INSERT INTO producto (id, nombre, descripcion, precio, stock, id_categoria, imagen) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
        $sentencia->execute(array($producto, $description, $precio, $stock, $categoria, $imagen));
        return $this->db->lastInsertId();
    }

    function EditProduct($id_producto, $producto, $description, $precio, $stock, $categoria)
    {
        $sentencia = $this->db->prepare("UPDATE `producto` SET `nombre`=?, `descripcion`=?, `precio`=?, `stock`=?, `id_categoria`=? WHERE `producto`.`id`=?");
        $sentencia->execute(array($producto, $description, $precio, $stock, $categoria, $id_producto));
    }

    function GetUsers()
    {
        $query = $this->db->prepare("SELECT `u`.`id` as `id_usuario`, `u`.`nombre` as `nombre_usuario`, `u`.`email` as `email`, `u`.`admin` as `admin` FROM usuario u");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function GetUser($id_usuario)
    {
        $sentencia = $this->db->prepare("SELECT `u`.`id` as `id_usuario`, `u`.`nombre` as `nombre_usuario`, `u`.`email` as `email`, `u`.`admin` as `admin` FROM usuario u WHERE `u`.`id`=?");
        $sentencia->execute(array($id_usuario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }


    function QuitAdmin($id_usuario)
    {
        $sentencia = $this->db->prepare("UPDATE `usuario` SET  `admin`= 'N' WHERE `id`=?");
        $sentencia->execute(array($id_usuario));
    }

    function GiveAdmin($id_usuario)
    {
        $sentencia = $this->db->prepare("UPDATE `usuario` SET  `admin`= 'Y' WHERE `id`=?");
        $sentencia->execute(array($id_usuario));       
    }

    function DeleteUser($id_usuario)
    {
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $sentencia->execute(array($id_usuario));
    }
}