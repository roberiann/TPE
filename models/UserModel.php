<?php

require_once './helpers/db.helper.php';

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

}
