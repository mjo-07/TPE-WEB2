<?php

require_once('config/config.php');

class Model
{
    
    function crearConexion()
    {
        global $configuracion;

        $user = $configuracion['usuario'];
        $password = $configuracion['password'];
        $database = $configuracion['basenombre'];
        $host = $configuracion['host'];

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
        } catch (\Throwable $th) {
            die($th);
        }

        return $pdo;
    }
}