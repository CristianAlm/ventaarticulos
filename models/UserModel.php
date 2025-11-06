<?php
require_once 'config.php'; // Aquí estará la conexión a la base de datos

class UserModel {
    // Atributos
    private $db; // conexión a la base de datos

    // Constructor
    public function __construct() {
        $this->db = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASS
        );
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getUsuarioPorNombre($username) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE username = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function crearUsuario($username, $password, $rol = 'user') {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->db->prepare('INSERT INTO usuario (username, password, rol) VALUES (?, ?, ?)');
        $query->execute([$username, $hash, $rol]);
    }



    // Funciones (solo nombres, todavía no definidas)
    //public function login($username, $password); // Valida usuario y contraseña
    //public function logout(); // Cierra la sesión
    //public function isLoggedIn(); // Devuelve true/false si hay usuario logueado
    //public function getUserById($id); // Obtiene información de un usuario por su ID
    //public function createUser($username, $password, $role); // Crea un nuevo usuario
    //public function deleteUser($id); // Elimina un usuario
    //public function updateUser($id, $username, $password, $role); // Modifica datos de un usuario
}
