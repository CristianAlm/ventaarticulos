<?php

require_once 'config.php';

require_once 'autodeploy.php';
$deploy = new AutoDeploy();
$deploy->run();

require_once 'controllers/HomeController.php';
require_once 'controllers/CategoriaController.php';
require_once 'controllers/ProductoController.php';
require_once 'controllers/AuthController.php';

// Acción por defecto
$action = $_GET['action'] ?? 'home';

// Parseamos la acción: ej. "producto/3" -> ["producto", "3"]
$params = explode('/', $action);

// Determinamos la ruta según la acción
switch ($params[0]) {
    case 'home':
        $controller = new HomeController();
        $controller->index(); // mostrar página principal con productos por categoría
        break;

    case 'categoria':
        $controller = new CategoriaController();
        if (isset($params[1])) {
            $controller->listarProductosPorCategoria($params[1]);
        } else {
            $controller->listarCategorias();
        }
        break;

    case 'producto':
        $controller = new ProductoController();
        if (isset($params[1])) {
            $controller->detalleProducto($params[1]);
        } else {
            echo "Producto no especificado";
        }
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login(); 
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    default:
        echo "404 Page not found";
        break;
}
