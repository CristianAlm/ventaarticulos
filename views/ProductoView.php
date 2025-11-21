<?php

class ProductoView {

    private $baseURL;

    public function __construct() {
        $this->baseURL = BASE_URL;
    }

    public function mostrarListaProductos($productos) {
        require 'templates/productoList.phtml';
    }

    public function mostrarFormularioAgregar() {
        require 'templates/agregarProducto.phtml';
    }

    public function mostrarFormularioEditar($producto) {
        require 'templates/editarProducto.phtml';
    }

    public function mostrarDetalle($producto, $categoria) {
        require 'templates/productoDetalle.phtml';
    }

    public function mostrarError($mensaje) {
        require 'templates/error.phtml';
    }
}
