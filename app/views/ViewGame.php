<?php

require_once 'View.php';

class ViewGame extends View{

    public $ref = 'game';

    
    function renderGames($elementos){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        require_once 'app/templates/juegos.phtml';
        require_once 'app/templates/foot.phtml';
    }
}