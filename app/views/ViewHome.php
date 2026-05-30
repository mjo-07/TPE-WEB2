<?php
require_once 'View.php';


class ViewHome extends View{
    
    public $ref;
    
    function renderHome($gamesDestacados, $editoresDestacados ){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        $this->mostrarDestacados($gamesDestacados,'game');
        $this->mostrarDestacados($editoresDestacados, 'editor');
        require_once 'app/templates/foot.phtml';
        
    } 
    
    function mostrarDestacados($elementos, $ref)
    {
        $this->ref = $ref;
        require 'app/templates/destacadosHome.phtml';
    }

    function renderAbout(){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        require_once 'app/templates/about.phtml';
        require_once 'app/templates/foot.phtml';
    }

    function renderError($action){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/error404.phtml';
    }

    
}
