<?php
require_once 'Model.php';

class ModelEditor extends Model{

    function getEditoresDestacados($valoracion){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT nombre_empresa AS nombre, imagen, id_editor AS id FROM editor WHERE valoracion = ? LIMIT 3");
        $query->execute([$valoracion]);
        $destacados = $query->fetchAll(PDO::FETCH_OBJ);
        return $destacados;
    }

    function getEditors(){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT nombre_empresa AS nombre, imagen, id_editor AS id FROM editor");
        $query->execute();
        $editores = $query->fetchAll(PDO::FETCH_OBJ);
        return $editores;
    }

    function getEditor($id){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT * FROM editor WHERE id = ?");
        $query->execute([$id]);
        $editor = $query->fetch(PDO::FETCH_OBJ);
        return $editor;
    }

}