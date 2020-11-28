<?php

require_once 'app/helpers/db.helper.php';

class ProductModel
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
        $query = $this->db->prepare("SELECT p.id as id_producto, p.nombre as nombre_producto, p.descripcion as desc_producto, p.precio as precio, p.stock as stock, p.imagen as imagen, c.id as id_categoria, c.nombre as nombre_categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id WHERE p.id=?");
        $query->execute(array($id_product));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function GetProductsByCategory($id_categoria)
    {
        $query = $this->db->prepare("SELECT `p`.`nombre` as `nombre_producto`,`p`.`id` as `id_producto`, `p`.`descripcion` as `desc_producto`, `c`.`nombre` as `nombre_categoria` FROM producto p INNER JOIN categoria c ON `p`.`id_categoria`=`c`.`id` AND `c`.`id`=?");
        $query->execute(array($id_categoria));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function Delete($id_producto)
    {
        $query = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $query->execute(array($id_producto));
    }
    function DeleteImage($id_producto)
    {
        $query = $this->db->prepare("UPDATE producto SET IMAGEN = NULL WHERE `producto`.`id` = ?");
        $query->execute(array($id_producto));
    }

    function insert($producto, $description, $precio, $stock, $categoria, $imagen = null)
    {
        $query = $this->db->prepare("INSERT INTO producto (id, nombre, descripcion, precio, stock, id_categoria, imagen) VALUES (NULL, ?, ?, ?, ?, ?, ?)");
        $query->execute(array($producto, $description, $precio, $stock, $categoria, $imagen));
        return $this->db->lastInsertId();
    }

    function EditProduct($id_producto, $producto, $description, $precio, $stock, $categoria)
    {
        $query = $this->db->prepare("UPDATE `producto` SET `nombre`=?, `descripcion`=?, `precio`=?, `stock`=?, `id_categoria`=? WHERE `producto`.`id`=?");
        $query->execute(array($producto, $description, $precio, $stock, $categoria, $id_producto));
    }

    function GetUsers()
    {
        $query = $this->db->prepare("SELECT `u`.`id` as `id_usuario`, `u`.`nombre` as `nombre_usuario`, `u`.`email` as `email`, `u`.`admin` as `admin` FROM usuario u");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function GetUser($id_usuario)
    {
        $query = $this->db->prepare("SELECT `u`.`id` as `id_usuario`, `u`.`nombre` as `nombre_usuario`, `u`.`email` as `email`, `u`.`admin` as `admin` FROM usuario u WHERE `u`.`id`=?");
        $query->execute(array($id_usuario));
        return $query->fetch(PDO::FETCH_OBJ);
    }


    function QuitAdmin($id_user)
    {
        $query = $this->db->prepare("UPDATE usuario SET admin= 'N' WHERE id=?");
        $query->execute(array($id_user));
    }

    function GiveAdmin($id_user)
    {
        $query = $this->db->prepare("UPDATE usuario SET admin= 'Y' WHERE id=?");
        $query->execute(array($id_user));       
    }

    function DeleteUser($id_user)
    {
        $query = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $query->execute(array($id_user));
    }
}