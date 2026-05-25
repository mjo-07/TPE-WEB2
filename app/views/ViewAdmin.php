<?php

class ViewAdmin extends View
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

    function renderEditsEditors($resultado, $admin, $editores){
        
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

    function renderFormAltasEditor($editor = null){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/formEditor.phtml';
        require_once 'app/templates/foot.phtml';

    }

    function renderFormAltasGame($editores, $game = null){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/formGame.phtml';
        require_once 'app/templates/foot.phtml';
    }

    function renderModifyEditor($editor){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/formEditor.phtml';
        require_once 'app/templates/foot.phtml';

    }

    function renderModifyGame( $game,$editors){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/formGame.phtml';
        require_once 'app/templates/foot.phtml';

    }

}
