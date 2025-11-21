<?php

session_start();

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

    case 'login':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->verificarLogin();
        } else {
            $controller->mostrarLogin();
        }
    break;

    case 'verificarLogin':
        $controller = new AuthController();
        $controller->verificarLogin();
        break;

    case 'register':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
            $controller->register();
        else
            $controller->mostrarRegister();
        break;


    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'producto':
        $controller = new ProductoController();

        // Si no hay segundo parámetro → listar productos
        if (!isset($params[1])) {
            $controller->listarProductos();
            break;
        }

        switch ($params[1]) {

            case 'agregar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->agregarProducto();
                } else {
                    $controller->mostrarFormAgregar();
                }
                break;

            case 'editar':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->editarProducto($params[2]);
                } else {
                    $controller->mostrarFormEditar($params[2]);
                }
                break;

            case 'eliminar':
                $controller->eliminarProducto($params[2]);
                break;

            default:
                $controller->detalleProducto($params[1]);
                break;
        }
        break;


    default:
        echo "404 Page not found";
        break;
}
