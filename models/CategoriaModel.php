<?php

require_once './helpers/db.helper.php';

class CategoriaModel
{

    private $db;
    private $dbHelper;

    function __construct()
    {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    function GetCategories()
    {
        $sentencia = $this->db->prepare("SELECT * FROM categoria ORDER BY nombre");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetCategory($id_categoria)
    {
        $sentencia = $this->db->prepare("SELECT `c`.`id` as `id_categoria`, `c`.`nombre` as `nombre_categoria`, `c`.`descripcion` as `desc_categoria` FROM categoria c WHERE `c`.`id`=?");
        $sentencia->execute(array($id_categoria));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function InsertCategory($categoria, $description)
    {
        $sentencia = $this->db->prepare("INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES (NULL,?,?);");
        $sentencia->execute(array($categoria, $description));
    }

    function DeleteCategory($id_categoria)
    {
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
        return $sentencia->execute(array($id_categoria));
    }

    function EditCategory($id_categoria, $categoria, $description)
    {
        $sentencia = $this->db->prepare("UPDATE `categoria` SET `nombre`=?, `descripcion`=? WHERE `categoria`.`id` =?");
        $sentencia->execute(array($categoria, $description, $id_categoria));
    }
}
