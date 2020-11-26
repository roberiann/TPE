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

    function get($id) {
        $query = $this->db->prepare('SELECT descripcion, calificacion, id_producto, nombre FROM comentario c INNER JOIN usuario u ON c.id_usuario = u.id WHERE c.id = ?');
        $query->execute([$id]);
        $msj = $query->fetch(PDO::FETCH_OBJ);
        return $msj;
    }

    function getAll($id_product)
    {
        $sentencia = $this->db->prepare("SELECT c.descripcion as descripcion, c.calificacion as calificacion, u.nombre as nombre FROM producto p INNER JOIN comentario c ON c.id_producto = p.id INNER JOIN usuario u ON c.id_usuario = u.id WHERE p.id=?");
        $sentencia->execute(array($id_product));
        $msjs = $sentencia->fetchAll(PDO::FETCH_OBJ); 
        return $msjs;
    }

    function remove($id) {  
        $query = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }

    function insert($descripcion, $calificacion, $id_producto, $id_usuario) {
        $sentencia = $this->db->prepare("INSERT INTO comentario (descripcion, calificacion, id_producto, id_usuario) VALUES (?,?,?,?)");
        $sentencia->execute(array($descripcion, $calificacion, $id_producto, $id_usuario));
        return $this->db->lastInsertId();
    }

}
