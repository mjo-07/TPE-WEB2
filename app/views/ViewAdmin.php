<?php

class ViewAdmin extends View
{
    public $ref = 'admin';

    function renderFormLogin()
    {
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/formLogin.phtml';
    }

    function renderAdminControl($admin){
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        require_once 'app/templates/foot.phtml';
    }


}
