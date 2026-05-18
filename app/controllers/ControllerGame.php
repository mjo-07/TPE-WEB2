<?php
require_once 'app/models/ModelGame.php';
require_once 'app/views/ViewGame.php';

class ControllerGame{

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new ModelGame();
        $this->view = new ViewGame();
    }

    function showGames(){
        $juegos = $this->model->getGames();
        $this->view->renderGames($juegos);

    }

    


}