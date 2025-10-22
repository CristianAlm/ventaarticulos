<?php

class CategoriaView {
    public function mostrarCategorias($categorias) {
        require_once __DIR__ . '/../templates/listadoCategorias.phtml';
    }

    public function mostrarProductosPorCategoria($categoria, $productos) {
        require_once __DIR__ . '/../templates/productosPorCategoria.phtml';
    }
}

