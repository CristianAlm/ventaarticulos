<?php
class AuthHelper {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function checkLoggedIn() {
        if (!isset($_SESSION['id_usuario'])) {
            header('Location: login');
            exit;
        }
    }

    public function checkAdmin() {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
            header('Location: home');
            exit;
        }
    }

    public function isLoggedIn() {
        return isset($_SESSION['id_usuario']);
    }

    public function getUserRole() {
        return $_SESSION['rol'] ?? null;
    }

    public function getUserName() {
        return $_SESSION['username'] ?? null;
    }
}
