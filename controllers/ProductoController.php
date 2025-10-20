<?php
require_once 'models/ProductoModel.php';

class ProductoController {
    private $productoModel;

    public function __construct() {
        $this->productoModel = new ProductoModel();
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
