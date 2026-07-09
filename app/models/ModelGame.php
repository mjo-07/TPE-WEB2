<?php
require_once 'Model.php';

class ModelGame extends Model
{

    function getGames(){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT v.*, e.nombre_empresa  FROM video_juego v JOIN editor e USING(id_editor)");
        $query->execute();
        $games = $query->fetchAll(PDO::FETCH_OBJ);
        return $games;
    }

    function getGame($id){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT v.*, e.nombre_empresa FROM video_juego v JOIN editor e USING (id_editor) WHERE id_juego = ?");
        $query->execute([$id]);
        $game = $query->fetch(PDO::FETCH_OBJ);
        return $game;
    }

    function getGamesDestacados($valoracion){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT titulo AS nombre, imagen, id_juego AS id FROM video_juego WHERE valoracion = ? LIMIT 3");
        $query->execute([$valoracion]);
        $destacados = $query->fetchAll(PDO::FETCH_OBJ);
        return $destacados;
    }

    function getGamesByEditor($idEditor){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT * FROM video_juego WHERE id_editor = ?");
        $query->execute([$idEditor]);
        $games = $query->fetchAll(PDO::FETCH_OBJ);
        return $games;
    }

    function deleteOneGame($id){
        try {
            $pdo = $this->crearConexion();
            $query = $pdo->prepare("DELETE FROM video_juego WHERE id_juego = ?");
            $query->execute([$id]);

            return true; 

        } catch (PDOException $e) {
            return false; 
        }
    }

    function insertNewGame($nombre, $precio, $lanzamiento, $valoracion, $id_editor, $descripcion, $resenia, $imagen){
        try {
            $pdo = $this->crearConexion();
            $query = $pdo->prepare("INSERT INTO video_juego (titulo, precio, fecha_lanzamiento, valoracion, id_editor, descripcion, resenia, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            return $query->execute([$nombre, $precio, $lanzamiento, $valoracion, $id_editor, $descripcion, $resenia, $imagen]);
        } catch (PDOException $e) {
            return false;
        }
    }

    function updateGame($id,$nombre, $precio, $lanzamiento, $valoracion, $id_editor, $descripcion, $resenia, $imagen){
        try {
            $pdo = $this->crearConexion();
            $query = $pdo->prepare("UPDATE video_juego SET titulo = ?, precio = ?, fecha_lanzamiento = ?, valoracion = ?, id_editor = ?, descripcion = ?, resenia = ?, imagen = ? WHERE id_juego = ?");
            return $query->execute([$nombre, $precio, $lanzamiento, $valoracion, $id_editor, $descripcion, $resenia, $imagen, $id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
