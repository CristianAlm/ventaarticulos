<?php
class ProductoView {
    public function mostrarDetalle($producto, $categoria) {
        require './templates/productoDetalle.phtml';
    }

    public function mostrarError($mensaje) {
        echo "<h2>Error</h2><p>$mensaje</p>";
    }
}
