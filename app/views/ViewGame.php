<?php

class ViewGame{
    
    function renderGames($elementos){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        require_once 'app/templates/juegos.phtml';
        require_once 'app/templates/foot.phtml';
    }
}