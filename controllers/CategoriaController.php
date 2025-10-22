<?php

require_once 'models/CategoriaModel.php';
require_once 'models/ProductoModel.php';
require_once 'views/CategoriaView.php';
require_once 'views/ProductoView.php';

class CategoriaController {

    private $categoriaModel;
    private $productoModel;
    private $categoriaView;
    private $productoView;

    public function __construct() {
        $this->categoriaModel = new CategoriaModel();
        $this->productoModel = new ProductoModel();
        $this->categoriaView  = new CategoriaView();
        $this->productoView   = new ProductoView();
    }

    public function listarCategorias() {
        $categorias = $this->categoriaModel->getCategorias();
        $this->categoriaView->mostrarCategorias($categorias);
    }

    public function listarProductosPorCategoria($id_categoria) {
        $categoria  = $this->categoriaModel->getCategoriaById($id_categoria);
        $productos  = $this->productoModel->getProductosPorCategoria($id_categoria);
        $this->categoriaView->mostrarProductosPorCategoria($categoria, $productos);
    }

    // Muestra el formulario para agregar una nueva categoría
    public function create() {}

    // Procesa la creación de una nueva categoría
    public function store() {}

    // Muestra el formulario para editar una categoría
    public function edit($id) {}

    // Procesa la actualización de una categoría existente
    public function update($id) {}

    // Elimina una categoría
    public function delete($id) {}
}
?>
