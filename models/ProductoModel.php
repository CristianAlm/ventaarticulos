<?php
require_once 'config.php';

class ProductoModel {
    private $db;

    public function __construct() {
        $this->db = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
            DB_USER,
            DB_PASS
        );
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // 🧠 FUNCIONES DEL MODELO
    public function getAll();                       // devuelve todos los productos
    public function getById($id);                   // devuelve un producto por su ID
    public function getByCategoria($idCategoria);   // devuelve los productos de una categoría
    public function add($nombre, $precio, $descripcion, $idCategoria, $imagen = null); // agrega un producto
    public function update($id, $nombre, $precio, $descripcion, $idCategoria, $imagen = null); // edita un producto
    public function delete($id);                    // elimina un producto
}
