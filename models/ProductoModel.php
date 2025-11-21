<?php

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

    public function obtenerTodos() {
        $query = $this->db->prepare("SELECT * FROM producto");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPorId($id) {
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_producto = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertarProducto($nombre, $precio, $descripcion, $id_categoria) {
        $query = $this->db->prepare(
            "INSERT INTO producto (nombre, precio, descripcion, id_categoria) VALUES (?, ?, ?, ?)"
        );
        $query->execute([$nombre, $precio, $descripcion, $id_categoria]);
        return $this->db->lastInsertId();
    }

    public function actualizarProducto($id, $nombre, $precio, $descripcion, $id_categoria) {
        $query = $this->db->prepare(
            "UPDATE producto 
            SET nombre = ?, precio = ?, descripcion = ?, id_categoria = ?
            WHERE id_producto = ?"
        );

        return $query->execute([$nombre, $precio, $descripcion, $id_categoria, $id]);
    }



    public function eliminarProducto($id) {
        $query = $this->db->prepare("DELETE FROM producto WHERE id_producto = ?");
        return $query->execute([$id]);
    }
}
