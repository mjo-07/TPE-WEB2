<?php

require_once 'app/models/ModelAdmin.php';
require_once 'app/views/ViewAdmin.php';
require_once 'app/models/ModelEditor.php';
require_once 'app/models/ModelGame.php';

class ControllerAdmin
{

    private $model;
    private $view;

    function __construct()
    {

        $this->model = new ModelAdmin();
        $this->view = new ViewAdmin();
    }

    private function checkLoggedIn() {
    if (!isset($_SESSION['admin'])) {
        header("Location: " . BASE_URL . "administrar");
        exit();
    }
}

    function showFormLogin()
    {
        
        $this->view->renderFormLogin();
    }

    function autenticar()
    {
        if(empty($_REQUEST['email']) || empty($_REQUEST['password'])){
            $_SESSION['mensaje'] = "Se debe ingresar usuario y contraseña!";
            header("Location: " . BASE_URL . "administrar");
            exit();
        }

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $admin = $this->model->getAdminByEmail($email);

        if ($admin) {
            if (password_verify($password, $admin->password)) {

                $_SESSION['admin'] = $admin;
                $_SESSION['last_login'] = date('d/m/Y H:i');
                header("Location: " . BASE_URL . "adminview");
                exit();
            } else {
                $_SESSION['mensaje'] = "Contraseña incorrecta!";
                header("Location: " . BASE_URL . "administrar");
                exit();
            }
        } else {
            $_SESSION['mensaje'] = "Usuario no encontrado!";
            header("Location: " . BASE_URL . "administrar");
            exit();
        }
    }

    function logout()
    {
        session_destroy();
        header("Location: " . BASE_URL);
        exit();
    }

    function showAdminControl()
    {
        $this->checkLoggedIn();

        $admin = $_SESSION['admin'];
        $this->view->renderAdminControl($admin);
    }

    function showEditsEditors()
    {
        $this->checkLoggedIn();

        $admin = $_SESSION['admin'];
        $modelEditores = new ModelEditor();
        $editores = $modelEditores->getAllEditors();
        $this->view->renderEditsEditors($admin, $editores);
    }

    function showEditsGames()
    {
        $this->checkLoggedIn();

        $admin = $_SESSION['admin'];
        $modelGames = new ModelGame();
        $games = $modelGames->getGames();
        $this->view->renderEditGames($admin, $games);
    }

    function deleteEditor($id)
    {
        $this->checkLoggedIn();
        $modelEditores = new ModelEditor();
        $resultado = $modelEditores->deleteOneEditor($id);

        if ($resultado === "success") {
            $_SESSION['mensaje'] = "Se borró correctamente el editor";
            $_SESSION['alert_type'] = "success";
        } elseif ($resultado === "restricted") {
            $_SESSION['mensaje'] = "No se puede eliminar un editor que tenga juegos asociados!";
            $_SESSION['alert_type'] = "danger";
        } else {
            $_SESSION['mensaje'] = "Ocurrió un error inesperado en la base de datos.";
            $_SESSION['alert_type'] = "warning";
        }
        header("Location: " . BASE_URL . "/editEditores");
        exit();
    }

    function deleteGame($id)
    {
        $this->checkLoggedIn();

        $modelGames = new ModelGame();
        $resultado = $modelGames->deleteOneGame($id);

        if ($resultado) {
            $_SESSION['mensaje'] = "El juego se eliminó correctamente.";
            $_SESSION['alert_type'] = "success";
        } else {
            $_SESSION['mensaje'] = "No se pudo eliminar el juego debido a un error en el servidor.";
            $_SESSION['alert_type'] = "danger";
        }
        header("Location: " . BASE_URL . "/editGames");
        exit();
    }

    function showFormEditores()
    {
        $this->checkLoggedIn();

        $this->view->renderFormEditor();
    }

    function showFormGames()
    {
        $this->checkLoggedIn();

        $modelEditores = new ModelEditor();
        $editores = $modelEditores->getAllEditors();
        $this->view->renderFormGame($editores);
    }

    function saveGame()
    {
        $this->checkLoggedIn();

        if (empty($_POST['nombre_juego']) || empty($_POST['precio']) || empty($_POST['fecha_lanzamiento']) || empty($_POST['id_editor'])) {
            $_SESSION['mensaje'] = "Falntan campos obligatorios para poder guardar el juego.";
            $_SESSION['alert_type'] = "danger";
            header("Location: " . BASE_URL . "editGames");
            exit();
        }

        $nombre      = $_POST['nombre_juego'];
        $precio      = $_POST['precio'];
        $lanzamiento = $_POST['fecha_lanzamiento'];
        $id_editor   = $_POST['id_editor'];

        $valoracion  = $_POST['valoracion'] ?? null;
        $descripcion = $_POST['descripcion'] ?? null;
        $resenia     = $_POST['resenia'] ?? null;

        $nombreImagenGuardar = null;

        if (isset($_FILES['imagen_juego']) && $_FILES['imagen_juego']['error'] === UPLOAD_ERR_OK) {

            $fileTmpPath = $_FILES['imagen_juego']['tmp_name'];
            $fileName    = $_FILES['imagen_juego']['name'];

            $nombreImagenGuardar = time() . "_" . $fileName;

            $uploadFileDir = './imagenes/';
            $dest_path = $uploadFileDir . $nombreImagenGuardar;

            if (!move_uploaded_file($fileTmpPath, $dest_path)) {

                $_SESSION['mensaje'] = "Error al guardar la imagen físicamente en el servidor.";
                $_SESSION['alert_type'] = "warning";
                header("Location: " . BASE_URL . "editGames");
                exit();
            }
        }

        $modelGames = new ModelGame();

        $resultado = $modelGames->insertNewGame($nombre, $precio, $lanzamiento, $valoracion, $id_editor, $descripcion, $resenia, $nombreImagenGuardar);

        if ($resultado) {
            $_SESSION['mensaje'] = "¡El videojuego se guardó correctamente!";
            $_SESSION['alert_type'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al insertar el juego en la base de datos.";
            $_SESSION['alert_type'] = "danger";
        }

        header("Location: " . BASE_URL . "editGames");
        exit();
    }

    function saveEditor()
    {
        $this->checkLoggedIn();

        if (empty($_POST['nombre_empresa']) || empty($_POST['pais']) || empty($_POST['sitio_web'])) {
            $_SESSION['mensaje'] = "Faltan campos obligatorios para guardar el editor.";
            $_SESSION['alert_type'] = "danger";
            header("Location: " . BASE_URL . "editGames");
            exit();
        }

        $nombreEmpresa = $_POST['nombre_empresa'];
        $pais = $_POST['pais'];
        $sitioWeb = $_POST['sitio_web'];

        $valoracion = $_POST['valoracion'] ?? null;
        $descripcion = $_POST['descripcion'] ?? null;

        

        $nombreImagenGuardar = null;

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {

            $fileTmpPath = $_FILES['imagen']['tmp_name'];
            $fileName    = $_FILES['imagen']['name'];


            $nombreImagenGuardar = time() . "_" . $fileName;


            $uploadFileDir = './imagenes/';
            $dest_path = $uploadFileDir . $nombreImagenGuardar;


            if (!move_uploaded_file($fileTmpPath, $dest_path)) {

                $_SESSION['mensaje'] = "Error al guardar la imagen físicamente en el servidor.";
                $_SESSION['alert_type'] = "warning";
                header("Location: " . BASE_URL . "editEditores");
                exit();
            }
        }

        $modelEditor = new ModelEditor();

        $resultado = $modelEditor->insetNewEditor($nombreEmpresa, $pais, $sitioWeb, $valoracion, $descripcion, $nombreImagenGuardar);

        if ($resultado) {
            $_SESSION['mensaje'] = "¡El videojuego se guardó correctamente!";
            $_SESSION['alert_type'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al insertar el editor en la base de datos.";
            $_SESSION['alert_type'] = "danger";
        }
        header("Location: " . BASE_URL . "editEditores");
        exit();
    }

    function modifyEditor($id)
    {
        $this->checkLoggedIn();

        $modelEditor = new ModelEditor();
        $editor = $modelEditor->getEditor($id);
        $this->view->renderFormEditor($editor);
    }

    function addModifyEditor($id)
    {
        $this->checkLoggedIn();

        if (empty($_POST['nombre_empresa']) || empty($_POST['pais']) || empty($_POST['sitio_web'])) {
            $_SESSION['mensaje'] = "Faltan campos obligatorios para actializar el editor.";
            $_SESSION['alert_type'] = "danger";
            header("Location: " . BASE_URL . "editGames");
            exit();
        }

        $nombreEmpresa = $_POST['nombre_empresa'];
        $pais = $_POST['pais'];
        $sitioWeb = $_POST['sitio_web'];

        $valoracion = $_POST['valoracion'] ?? null;
        $descripcion = $_POST['descripcion'] ?? null;

        $nombreImagenGuardar = $_POST['imagen_actual'];

        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {

            $fileTmpPath = $_FILES['imagen']['tmp_name'];
            $fileName    = $_FILES['imagen']['name'];


            $nombreImagenGuardar = time() . "_" . $fileName;


            $uploadFileDir = './imagenes/';
            $dest_path = $uploadFileDir . $nombreImagenGuardar;


            if (!move_uploaded_file($fileTmpPath, $dest_path)) {

                $_SESSION['mensaje'] = "Error al guardar la imagen físicamente en el servidor.";
                $_SESSION['alert_type'] = "warning";
                header("Location: " . BASE_URL . "editEditores");
                exit();
            }
        }

        $modelEditor = new ModelEditor();

        $resultado = $modelEditor->updateEditor($id,$nombreEmpresa, $pais, $sitioWeb, $valoracion, $descripcion, $nombreImagenGuardar);

        if ($resultado) {
            $_SESSION['mensaje'] = "¡La modificación del editor se guardó correctamente!";
            $_SESSION['alert_type'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al insertar la modificación del editor en la base de datos.";
            $_SESSION['alert_type'] = "danger";
        }
        header("Location: " . BASE_URL . "editEditores");
        exit();
    }

    function modifyGame($id)
    {
        $this->checkLoggedIn();

        $modelEditor = new ModelEditor();
        $editors = $modelEditor->getAllEditors($id);
        $modelGame = new ModelGame();
        $game = $modelGame->getGame($id);
        $this->view->renderFormGame($editors, $game);
    }

    function addModifyGame($id){
        $this->checkLoggedIn();

        if (empty($_POST['nombre_juego']) || empty($_POST['precio']) || empty($_POST['fecha_lanzamiento']) || empty($_POST['id_editor'])) {
            $_SESSION['mensaje'] = "Falntan campos obligatorios para poder actualizar el juego.";
            $_SESSION['alert_type'] = "danger";
            header("Location: " . BASE_URL . "editGames");
            exit();
        }

        $nombre      = $_POST['nombre_juego'];
        $precio      = $_POST['precio'];
        $lanzamiento = $_POST['fecha_lanzamiento'];
        $id_editor   = $_POST['id_editor'];

        $valoracion  = $_POST['valoracion'] ?? null;
        $descripcion = $_POST['descripcion'] ?? null;
        $resenia     = $_POST['resenia'] ?? null;


        $nombreImagenGuardar = $_POST['imagen_actual'];


        if (isset($_FILES['imagen_juego']) && $_FILES['imagen_juego']['error'] === UPLOAD_ERR_OK) {

            $fileTmpPath = $_FILES['imagen_juego']['tmp_name'];
            $fileName    = $_FILES['imagen_juego']['name'];


            $nombreImagenGuardar = time() . "_" . $fileName;


            $uploadFileDir = './imagenes/';
            $dest_path = $uploadFileDir . $nombreImagenGuardar;


            if (!move_uploaded_file($fileTmpPath, $dest_path)) {

                $_SESSION['mensaje'] = "Error al guardar la imagen físicamente en el servidor.";
                $_SESSION['alert_type'] = "warning";
                header("Location: " . BASE_URL . "editGames");
                exit();
            }
        }

        $modelGame = new ModelGame();

        $resultado = $modelGame->updateGame($id,$nombre, $precio, $lanzamiento, $valoracion, $id_editor, $descripcion, $resenia, $nombreImagenGuardar);

        if ($resultado) {
            $_SESSION['mensaje'] = "¡La modificación del juego se guardó correctamente!";
            $_SESSION['alert_type'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al insertar la modificación del juego en la base de datos.";
            $_SESSION['alert_type'] = "danger";
        }
        header("Location: " . BASE_URL . "editGames");
        exit();
    }
    
}
