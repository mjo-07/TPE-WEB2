<?php
require_once 'Model.php';

class ModelEditor extends Model{

    function getEditoresDestacados($valoracion){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT nombre_empresa AS nombre, imagen FROM editor WHERE valoracion = ? LIMIT 3");
        $query->execute([$valoracion]);
        $destacados = $query->fetchAll(PDO::FETCH_OBJ);
        return $destacados;
    }

}