<?php
require_once 'app/models/ModelEditor.php';
require_once 'app/views/ViewEditor.php';

class ControllerEditor {

    private $model;
    private $view;

    function __construct()
    {
        $this->model = new ModelEditor();
        $this->view = new ViewEditor();
    }

    function showEditors(){
        $editores = $this->model->getEditors();
        $this->view->renderEditors($editores);
    }

    function showEditor($id){
        $editor = $this->model->getEditor($id);
        $this->view->renderEditor($editor);
    }

}