<?php
require_once 'models/ProductoModel.php';
require_once 'models/CategoriaModel.php';
require_once 'views/ProductoView.php';
require_once 'AuthHelper.php';

class ProductoController {

    private $productoModel;
    private $categoriaModel;
    private $view;
    private $auth;

    public function __construct() {
        $this->productoModel = new ProductoModel();
        $this->categoriaModel = new CategoriaModel();
        $this->view = new ProductoView();
        $this->auth = new AuthHelper();
    }


    public function listarProductos() {
        $productos = $this->productoModel->obtenerTodos();
        $this->view->mostrarListaProductos($productos);
    }

    public function detalleProducto($id) {
        $producto = $this->productoModel->obtenerPorId($id);

        if (!$producto) {
            $this->view->mostrarError("El producto no existe o fue eliminado.");
            return;
        }

        $categoria = $this->categoriaModel->getCategoriaById($producto->id_categoria);

        $this->view->mostrarDetalle($producto, $categoria);
    }

    public function mostrarFormAgregar() {
        $this->auth->checkAdmin();

        $categorias = $this->categoriaModel->getCategorias();
        $this->view->mostrarFormularioAgregar($categorias);
    }

    public function agregarProducto() {
        $this->auth->checkAdmin();

        if (!isset($_POST['nombre']) || !isset($_POST['precio'])) {
            $this->view->mostrarError("Faltan datos obligatorios.");
            return;
        }

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'] ?? "";
        $id_categoria = $_POST['id_categoria'] ?? null;

        if (empty($nombre) || empty($precio)) {
            $this->view->mostrarError("Nombre y precio son obligatorios.");
            return;
        }

        $this->productoModel->insert($nombre, $precio, $descripcion, $id_categoria);

        header("Location: " . BASE_URL . "producto");
        exit;
    }

    public function mostrarFormEditar($id) {
        $this->auth->checkAdmin();

        $producto = $this->productoModel->getProductoById($id);
        $categorias = $this->categoriaModel->getCategorias();

        if (!$producto) {
            $this->view->mostrarError("Producto no encontrado.");
            return;
        }

        $this->view->mostrarFormularioEditar($producto, $categorias);
    }

    public function editarProducto($id) {
        $this->auth->checkAdmin();

        if (!isset($_POST['nombre']) || !isset($_POST['precio'])) {
            $this->view->mostrarError("Faltan datos obligatorios.");
            return;
        }

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'] ?? "";
        $id_categoria = $_POST['id_categoria'] ?? null;

        $this->productoModel->update($id, $nombre, $precio, $descripcion, $id_categoria);

        header("Location: " . BASE_URL . "producto");
        exit;
    }


    public function eliminarProducto($id) {
        $this->auth->checkAdmin();

        $this->productoModel->eliminarProducto($id);

        header("Location: " . BASE_URL . "producto");
        exit;
    }
}
?>
