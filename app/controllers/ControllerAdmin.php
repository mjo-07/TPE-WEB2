<?php

require_once 'app/models/ModelAdmin.php';
require_once 'app/views/ViewAdmin.php';

class ControllerAdmin
{

    private $model;
    private $view;

    function __construct() {

        $this->model = new ModelAdmin(); 
        $this->view = new ViewAdmin();

    }

    function showFormLogin(){
        $this->view->renderFormLogin();
    }

    function autenticar()
    {

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $admin = $this->model->getByEmail($email);

        if ($admin) {
            if (password_verify($password, $admin->password)) {

                $_SESSION['admin'] = $admin;

                header("Location: " . BASE_URL . "adminview");
                return;
            } else {
                $_SESSION['mensaje'] = "Contraseña incorrecta!";
                header("Location: " . BASE_URL . "administrar");
                return;
            }
        } else {
            $_SESSION['mensaje'] = "Usuario no encontrado!";
            header("Location: " . BASE_URL . "administrar");
            return;
        }
    }

    function logout()
    {
        session_destroy();
        header("Location: " . BASE_URL);
    }

    function showAdminControl(){
        $admin = $_SESSION['admin'];
        $this->view->renderAdminControl($admin);
    }
}
