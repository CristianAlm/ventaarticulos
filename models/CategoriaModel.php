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

    
    public function getAll(){
         $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCategorias() {
        $query = $this->db->prepare("SELECT * FROM categoria");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


    public function getCategoriaById($id) {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id_categoria = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ); 
    }
}

