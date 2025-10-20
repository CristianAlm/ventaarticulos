<?php
require_once 'models/CategoriaModel.php';

class CategoriaController {
    private $categoriaModel;

    public function __construct() {
        $this->categoriaModel = new CategoriaModel();
    }

    // Lista todas las categorías
    public function index() {}

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
