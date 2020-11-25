<?php

require_once 'app/helpers/db.helper.php';

class CommentModel
{

    private $db;
    private $dbHelper;

    function __construct()
    {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    function get($id_product)
    {
        $sentencia = $this->db->prepare("SELECT c.descripcion as desc_comentario, c.calificacion as calificacion FROM producto p INNER JOIN comentario c ON c.id_producto = p.id WHERE p.id=?");
        $sentencia->execute(array($id_product));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function remove($id) {  
        $query = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }

    function insert($descripcion, $calificacion, $id_producto) {
        $sentencia = $this->db->prepare("INSERT INTO comentario (descripcion, calificacion, id_producto) VALUES (?,?,?)");
        $sentencia->execute(array($descripcion, $calificacion, $id_producto));
        return $this->db->lastInsertId();
    }

}
