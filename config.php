<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');   // Servidor (normalmente 'localhost')
define('DB_USER', 'root');        // Usuario de MySQL
define('DB_PASS', '1234');            // Contraseña (vacía por defecto en XAMPP)
define('DB_NAME', 'tienda');      // Nombre de la base de datos
define('DB_PORT', '3306');        // Puerto de MySQL

// (Opcional) Configuración general del sitio
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
