<?php
require_once 'models/UserModel.php';
require_once './views/AuthView.php';

class AuthController {
    private $userModel;
    private $view;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->view = new AuthView();
    }

    public function verificarLogin() {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $this->userModel->getUsuarioPorNombre($_POST['username']);
            if ($user && password_verify($_POST['password'], $user->password)) {
                $_SESSION['USER_ID'] = $user->id_usuario;
                $_SESSION['USERNAME'] = $user->username;
                $_SESSION['ROL'] = $user->rol;
                header('Location: home');
            } else {
                echo "Usuario o contraseña incorrectos.";
            }
        }
    }

    
    public function mostrarLogin() {
        $this->view->mostrarLogin();
    }

    public function mostrarRegister() {
        $this->view->mostrarRegister();
    }

    public function register() {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $this->userModel->crearUsuario($_POST['username'], $_POST['password']);
            echo "Usuario registrado con éxito. <a href='login'>Iniciar sesión</a>";
        } else {
            echo "Por favor complete todos los campos.";
        }
    }

    // Procesa el login
    public function login() {}

    // Cierra la sesión del usuario
    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}
?>
