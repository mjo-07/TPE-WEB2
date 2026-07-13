<?php

class ViewAdmin
{
    public $ref = 'admin';

    function renderFormLogin()
    {
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/formLogin.phtml';
        require_once 'app/templates/mensaje.phtml';
    }

    function renderAdminControl($admin){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        require_once 'app/templates/homeAdmin.phtml';
        require_once 'app/templates/foot.phtml';
    }

    function renderEditsEditors($admin, $editores){
        
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        require_once 'app/templates/editEditors.phtml';
        require_once 'app/templates/foot.phtml';
    }

    function renderEditGames($admin, $games){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        require_once 'app/templates/editGame.phtml';
        require_once 'app/templates/foot.phtml';
    }

    function renderFormEditor($editor = null){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/formEditor.phtml';
        require_once 'app/templates/foot.phtml';

    }

    function renderFormGame($editores, $game = null){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/formGame.phtml';
        require_once 'app/templates/foot.phtml';
    }

}
