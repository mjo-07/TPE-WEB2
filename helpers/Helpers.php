<?php

class Helpers{

     static public function isLogged() {
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['IS_LOGGED'])) {
            $rol = $_SESSION['ROL'];
            return $rol;
        }
        return false;         
    }

        //Barrera de acceso para usuarios logueados
    static public function checkLogged() {      
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        if (!isset($_SESSION['ID_USER'])) {
            header('Location: ' . BASE_URL . "login");
            die();            
        } else {
            return true;
        }
    }












}