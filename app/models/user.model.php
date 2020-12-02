<?php

require_once 'app/helpers/db.helper.php';

class UserModel
{

    private $db;
    private $dbHelper;

    function __construct()
    {
        $this->dbHelper = new DBHelper();
        $this->db = $this->dbHelper->connect();
    }

    function getUser($user)
    {
        $query = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
        $query->execute(array($user));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function insertUser($name, $user, $hash)
    {
        $query = $this->db->prepare("INSERT INTO usuario (nombre, email, password) VALUES (?, ?, ?)");
        $query->execute(array($name, $user, $hash));
        return $this->db->lastInsertId();
    }

    function getUsers($id_user)
    {
        $query = $this->db->prepare("SELECT u.id as id_usuario, u.nombre as nombre_usuario, u.email as email, u.admin as admin FROM usuario u WHERE ? <> u.id");
        $query->execute(array($id_user));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getUserById($id_usuario)
    {
        $query = $this->db->prepare("SELECT `u`.`id` as `id_usuario`, `u`.`nombre` as `nombre_usuario`, `u`.`email` as `email`, `u`.`admin` as `admin` FROM usuario u WHERE `u`.`id`=?");
        $query->execute(array($id_usuario));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function setAdmin($id_user, $admin)
    {
        $query = $this->db->prepare("UPDATE usuario SET admin=? WHERE id=?");
        $query->execute(array($admin, $id_user));
    }

    function deleteUser($id_user)
    {
        $query = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $query->execute(array($id_user));
    }

}
