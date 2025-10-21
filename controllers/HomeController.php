<?php
require_once 'models/ProductoModel.php';
require_once 'models/CategoriaModel.php';
require_once 'views/HomeView.php';

class HomeController {
    private $productoModel;
    private $categoriaModel;
    private $view;

    public function __construct() {
        $this->productoModel = new ProductoModel();
        $this->categoriaModel = new CategoriaModel();
        $this->view = new HomeView();
    }

    // Muestra la página principal del sitio (productos por categoría)
    public function index() {
        $categorias = $this->categoriaModel->getCategorias(); // array de categorías
        $productos = $this->productoModel->getProductos();    // array de productos

        $this->view->mostrarInicio($categorias, $productos);
    }

    // Muestra el panel de administración (dashboard)
    public function adminPanel() {}

    // Muestra detalles de un producto específico
    public function detalleProducto($id) {}
}
?>
