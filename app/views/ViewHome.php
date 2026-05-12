<?php
//require_once 'app/templates/destacadosHome.phtml';

class ViewHome{
    
    function renderHome($gamesDestacados, $editoresDestacados ){

        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        $this->mostrarDestacados($gamesDestacados);
        $this->mostrarDestacados($editoresDestacados);
        require_once 'app/templates/foot.phtml';
        
    } 
    
    function mostrarDestacados($elementos)
    {
        require 'app/templates/destacadosHome.phtml';
    }

    
}
