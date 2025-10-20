<?php
require_once 'models/ProductoModel.php';
require_once 'models/CategoriaModel.php';

class HomeController {
    private $productoModel;
    private $categoriaModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();
        $this->categoriaModel = new CategoriaModel();
    }

    // Muestra la página principal del sitio (productos por categoría)
    public function index() {}

    // Muestra el panel de administración (dashboard)
    public function adminPanel() {}

    // Muestra detalles de un producto específico
    public function detalleProducto($id) {}
}
?>
