<?php
require_once 'models/ProductoModel.php';
require_once 'views/ProductoView.php';


class ProductoController {

    private $productoModel;
    private $categoriaModel;
    private $view;

    public function __construct() {
        $this->productoModel = new ProductoModel();
        $this->categoriaModel = new CategoriaModel();
        $this->view = new ProductoView();
    }

    public function detalleProducto($id_producto){
        //pide al Modelo losdatos del producto y tambien
        //pide la categoria para mostrar el nombre
        //envia la informacion a una view

        $producto = $this->productoModel->getProductoById($id_producto);

        if (!$producto) {
            $this->view->mostrarError("El producto no existe o fue eliminado.");
            return;
        }

        $categoria = $this->categoriaModel->getCategoriaById($producto['id_categoria']);

        $this->view->mostrarDetalle($producto, $categoria);
    }

    private function verificarSesionAdmin() {
        if (!isset($_SESSION['user_id']) || $_SESSION['rol'] !== 'admin') {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }


    // Lista todos los productos
    public function index() {}

    // Muestra el formulario para agregar un nuevo producto
    public function create() {}

    // Procesa la creación de un nuevo producto
    public function store() {}

    // Muestra el formulario para editar un producto
    public function edit($id) {}

    // Procesa la actualización de un producto existente
    public function update($id) {}

    // Elimina un producto
    public function delete($id) {}
}
?>
