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
        $query = $this->db->prepare('SELECT c.id, descripcion, calificacion, id_producto, nombre FROM comentario c INNER JOIN usuario u ON c.id_usuario = u.id WHERE c.id = ?');
        $query->execute([$id]);
        $msj = $query->fetch(PDO::FETCH_OBJ);
        return $msj;
    }

    function getAll($id_product)
    {
        $query = $this->db->prepare("SELECT c.id, c.descripcion as descripcion, c.calificacion as calificacion, u.nombre as nombre FROM producto p INNER JOIN comentario c ON c.id_producto = p.id INNER JOIN usuario u ON c.id_usuario = u.id WHERE p.id=?");
        $query->execute(array($id_product));
        $msjs = $query->fetchAll(PDO::FETCH_OBJ); 
        return $msjs;
    }

    function remove($id) {  
        $query = $this->db->prepare('DELETE FROM comentario WHERE id = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }

    function insert($description, $calification, $id_product, $id_user) {
        $query = $this->db->prepare("INSERT INTO comentario (descripcion, calificacion, id_producto, id_usuario) VALUES (?,?,?,?)");
        $query->execute(array($description, $calification, $id_product, $id_user));
        return $this->db->lastInsertId();
    }

        function ExistProduct($idproducto)
    {
        $sentencia = $this->db->prepare("SELECT * FROM `producto` WHERE `id`=?");
        $sentencia->execute(array($idproducto));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
}
