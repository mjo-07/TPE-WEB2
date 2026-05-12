<?php
require_once 'Model.php';

class ModelGame extends Model{

    function getGames(){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT * FROM video_juego");
        $query->execute();
        $games = $query->fetchAll(PDO::FETCH_OBJ);
        return $games;
    }

    function getGame($id){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT * FROM video_juego WHERE id = ?");
        $query->execute([$id]);
        $game = $query->fetch(PDO::FETCH_OBJ);
        return $game;
    }

    function getGamesDestacados($valoracion){
        $pdo = $this->crearConexion();
        $query = $pdo->prepare("SELECT titulo AS nombre, imagen FROM video_juego WHERE valoracion = ? LIMIT 3");
        $query->execute([$valoracion]);
        $destacados = $query->fetchAll(PDO::FETCH_OBJ);
        return $destacados;
    }
}

