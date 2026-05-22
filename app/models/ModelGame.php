<?php
require_once 'Model.php';

class ModelGame extends Model
{

    function getGames()
    {
        $pdo = $this->crearConexion();
        //$query = $pdo->prepare("SELECT *, titulo AS nombre FROM video_juego");
        $query = $pdo->prepare("SELECT v.*, e.nombre_empresa, e.id_editor FROM video_juego v JOIN editor e USING(id_editor)");
        $query->execute();
        $games = $query->fetchAll(PDO::FETCH_OBJ);
        return $games;
    }

    function getGame($id)
    {
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT v.* e.nombre_empresa FROM video_juego v JOIN editor e USING (id_editor) WHERE id_juego = ?");
        $query->execute([$id]);
        $game = $query->fetch(PDO::FETCH_OBJ);
        return $game;
    }

    function getGamesDestacados($valoracion)
    {
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT titulo AS nombre, imagen, id_juego AS id FROM video_juego WHERE valoracion = ? LIMIT 3");
        $query->execute([$valoracion]);
        $destacados = $query->fetchAll(PDO::FETCH_OBJ);
        return $destacados;
    }
}
