<?php
require_once 'Model.php';

class ModelEditor extends Model
{

    function getEditoresDestacados($valoracion)
    {
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT nombre_empresa AS nombre, imagen, id_editor AS id FROM editor WHERE valoracion = ? LIMIT 3");
        $query->execute([$valoracion]);
        $destacados = $query->fetchAll(PDO::FETCH_OBJ);
        return $destacados;
    }

    function getEditors()
    {
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT nombre_empresa AS nombre, imagen, id_editor AS id FROM editor");
        $query->execute();
        $editores = $query->fetchAll(PDO::FETCH_OBJ);
        return $editores;
    }

    function getEditor($id)
    {
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT * FROM editor WHERE id_editor = ?");
        $query->execute([$id]);
        $editor = $query->fetch(PDO::FETCH_OBJ);
        return $editor;
    }

    function getAllEditors()
    {
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT * FROM editor");
        $query->execute();
        $editores = $query->fetchAll(PDO::FETCH_OBJ);
        return $editores;
    }



    function deleteOneEditor($id)
    {
        try {
            $pdo = $this->crearConexion();
            $query = $pdo->prepare("DELETE FROM editor WHERE id_editor = ?");
            $query->execute([$id]);

            return "success";
        } catch (PDOException $e) {
            if (isset($e->errorInfo[1]) && $e->errorInfo[1] == 1451) {
                return "restricted";
            }

            return "error";
        }
    }

    function insetNewEditor($nombreEmpresa, $pais, $sitioWeb, $valoracion, $descripcion, $nombreImagenGuardar)
    {

        try {
            $pdo = $this->crearConexion();
            $query = $pdo->prepare("INSERT INTO editor (nombre_empresa, pais, sitio_web, valoracion, descripcion, imagen) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute([$nombreEmpresa, $pais, $sitioWeb, $valoracion, $descripcion, $nombreImagenGuardar]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function updateEditor($id, $nombreEmpresa, $pais, $sitioWeb, $valoracion, $descripcion, $nombreImagenGuardar)
    {
        try {
            $pdo = $this->crearConexion();
            $query = $pdo->prepare("UPDATE editor SET nombre_empresa = ?, pais = ?, sitio_web = ?, valoracion = ?, descripcion = ?, imagen = ? WHERE id_editor = ?");
            $query->execute([$nombreEmpresa, $pais, $sitioWeb, $valoracion, $descripcion, $nombreImagenGuardar, $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
