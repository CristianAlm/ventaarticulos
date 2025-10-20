<?php
require_once 'models/UserModel.php'; // si no tenés UserModel, lo podemos crear simple después

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Muestra el formulario de login
    public function loginForm() {}

    // Procesa el login
    public function login() {}

    // Cierra la sesión del usuario
    public function logout() {}
}
?>
