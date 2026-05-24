<?php

class View{

    public $nombre;

    function __construct(){
        $this->nombre = $this->getNombre();

    }

    function getNombre(){
        return "LF GAMES";
    }
}