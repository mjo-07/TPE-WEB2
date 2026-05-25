<?php
require_once 'View.php';

class ViewEditor extends View
{

    public $ref = 'editor';

    function renderEditors($elementos)
    {
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        require_once 'app/templates/editores.phtml';
        require_once 'app/templates/foot.phtml';
    }

    function renderEditor($elementos, $editor)
    {
        //var_dump($elementos);
        //var_dump($editor);
        //die();
        require_once 'app/templates/head.phtml';
        require_once 'app/templates/header.phtml';
        require_once 'app/templates/editor.phtml';
        require_once 'app/templates/foot.phtml';
    }
}
