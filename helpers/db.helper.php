<?php

class DBHelper
{
    public function __construct()
    {
    }

    public function connect()
    {
        $db = new PDO('mysql:host=localhost;' . 'dbname=db_almacen;charset=utf8', 'root', '');
        return $db;
    }
}
