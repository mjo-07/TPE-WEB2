<?php
require_once 'app/models/Model.php';

class ModelAdmin extends Model{

    function getAdminByEmail($email)
    {
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT * FROM `admin` WHERE e_mail = ?");
        $query->execute([$email]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}