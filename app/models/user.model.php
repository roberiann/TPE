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

    function GetUser($user)
    {
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function InsertUser($name, $user, $hash)
    {
        $sentencia = $this->db->prepare("INSERT INTO usuario (nombre, email, password) VALUES (?, ?, ?)");
        $sentencia->execute(array($name, $user, $hash));
    }

    function GetUsers()
    {
        $query = $this->db->prepare("SELECT `u`.`id` as `id_usuario`, `u`.`nombre` as `nombre_usuario`, `u`.`email` as `email`, `u`.`admin` as `admin` FROM usuario u");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function GetUserById($id_usuario)
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
