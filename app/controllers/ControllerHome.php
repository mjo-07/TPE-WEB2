<?php
require_once 'app/views/ViewHome.php';
require_once 'app/models/ModelEditor.php';
require_once 'app/models/ModelGame.php';

class ControllerHome{

    private $view;
    private $destacado = 5;

    function __construct()
    {
        $this->view = new ViewHome();
    }

    function showHome(){
        $modelEditor = new ModelEditor();
        $modelGame = new ModelGame();
        $editoresDestacados =  $modelEditor->getEditoresDestacados($this->destacado);
        $gamesDescatacdos =  $modelGame->getGamesDestacados($this->destacado);
        $this->view->renderHome($gamesDescatacdos,$editoresDestacados);
    }

    function showAbout(){
        $this->view->renderAbout();
    }

}