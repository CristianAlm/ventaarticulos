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
    //public function getAll();// devuelve todos los productos
    //public function getById($id); // devuelve un producto por su ID

    public function getProductosByCategoria($idCategoria){
        $query = $this->db->prepare('SELECT * FROM producto WHERE id_categoria = ?');
        $query->execute([$idCategoria]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }   // devuelve los productos de una categoría

    public function getProductoById($id_producto){
        $query = $this->db->prepare('SELECT * FROM producto WHERE id_producto = ?');
        $query->execute([$id_producto]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductos() {
        $sql = "SELECT * FROM producto";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductosPorCategoria($id_categoria){
        $query = $this->db->prepare('SELECT * FROM producto WHERE id_categoria = ?');
        $query->execute([$id_categoria]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    //public function add($nombre, $precio, $descripcion, $idCategoria, $imagen = null); // agrega un producto
    //public function update($id, $nombre, $precio, $descripcion, $idCategoria, $imagen = null); // edita un producto
    //public function delete($id);// elimina un producto
}
