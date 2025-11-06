<?php
    class AuthView {
    public function mostrarLogin($error = '') {
        require './templates/login.phtml';
    }

    public function mostrarRegister($mensaje = null) {
        require './templates/register.phtml';
    }
}

