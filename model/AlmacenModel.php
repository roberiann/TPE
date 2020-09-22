<?php

class AlmacenModel {

    private $db;
    
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_almacen;charset=utf8', 'root', '');
    }
            
    function GetProducts(){
        $sentencia = $this->db->prepare("SELECT * FROM producto");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function InsertProduct($title,$description,$completed,$priority){
        $sentencia = $this->db->prepare("INSERT INTO task(title, description, completed, priority) VALUES(?,?,?,?)");
        $sentencia->execute(array($title,$description,$completed,$priority));
    }
    
    function DeleteTask($task_id){
        $sentencia = $this->db->prepare("DELETE FROM task WHERE id=?");
        $sentencia->execute(array($task_id));
    }
    
    function MarkAsCompletedTask($task_id){
    
        $sentencia = $this->db->prepare("UPDATE task SET completed=1 WHERE id=?");
        $sentencia->execute(array($task_id));
    
    }


    

}