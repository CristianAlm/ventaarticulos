<?php

require_once 'config.php';

class CategoriaModel {
    private $db;

    public function __construct() {
        // Inicializa conexión PDO usando las constantes definidas en config.php
        $this->db = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASS
        );
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // 🧠 FUNCIONES DEL MODELO
    public function getAll(){
         $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategorias() {
        $sql = "SELECT * FROM categoria";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ); // devuelve un array asociativo
    }

    public function getCategoriaById($id) {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id_categoria = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ); 
    }
    
    // devuelve todas las categorías
    //public function getById($id);         // devuelve una categoría por su ID
    //public function add($nombre, $descripcion, $imagen = null); // agrega una nueva categoría
    //public function update($id, $nombre, $descripcion, $imagen = null); // edita una categoría
    //public function delete($id);          // elimina una categoría
}

