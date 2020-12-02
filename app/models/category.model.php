<?php

require_once 'app/helpers/db.helper.php';

class CategoryModel
{

    private $db;
    private $dbHelper;

    function __construct()
    {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    function getCategories()
    {
        $query = $this->db->prepare("SELECT * FROM categoria ORDER BY nombre");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategory($id_category)
    {
        $query = $this->db->prepare("SELECT c.id as id_categoria, c.nombre as nombre_categoria, c.descripcion as desc_categoria FROM categoria c WHERE id=?");
        $query->execute(array($id_category));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function insertCategory($category, $description)
    {
        $query = $this->db->prepare("INSERT INTO categoria (id, nombre, descripcion) VALUES (NULL,?,?);");
        $query->execute(array($category, $description));
    }

    function deleteCategory($id_category)
    {
        $query = $this->db->prepare("DELETE FROM categoria WHERE id=?");
        return $query->execute(array($id_category));
    }

    function editCategory($id_category, $category, $description)
    {
        $query = $this->db->prepare("UPDATE categoria SET nombre=?, descripcion=? WHERE categoria.id =?");
        $query->execute(array($category, $description, $id_category));
    }
}
