<?php
class AutoDeploy {
    private $dbHost = 'localhost';
    private $dbName = 'tienda';
    private $dbUser = 'root';
    private $dbPass = '1234';

    public function run() {
        try {
            $pdo = new PDO("mysql:host={$this->dbHost}", $this->dbUser, $this->dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->dbName} CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");
            $pdo->exec("USE {$this->dbName};");

            $pdo->exec("
                CREATE TABLE IF NOT EXISTS categoria (
                    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
                    nombre VARCHAR(100) NOT NULL,
                    descripcion TEXT
                );

                CREATE TABLE IF NOT EXISTS producto (
                    id_producto INT AUTO_INCREMENT PRIMARY KEY,
                    nombre VARCHAR(150) NOT NULL,
                    precio DECIMAL(10,2) NOT NULL,
                    descripcion TEXT,
                    id_categoria INT NOT NULL,
                    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
                        ON DELETE CASCADE
                        ON UPDATE CASCADE
                );
            ");

            $stmt = $pdo->query("SELECT COUNT(*) FROM categoria");
            if ($stmt->fetchColumn() == 0) {
                $pdo->exec("
                    INSERT INTO categoria (nombre, descripcion) VALUES
                    ('Limpieza de hogar', 'Artículos para la limpieza doméstica'),
                    ('Cuidado personal', 'Productos de higiene y cuidado corporal'),
                    ('Cocina', 'Artículos de limpieza para cocina');

                    INSERT INTO producto (nombre, precio, descripcion, id_categoria) VALUES
                    ('Lavandina', 250.00, 'Desinfectante de superficies', 1),
                    ('Jabón líquido', 300.00, 'Para manos y cuerpo', 2),
                    ('Desengrasante', 350.00, 'Limpieza de cocina y hornos', 3);
                ");
            }

        } catch (PDOException $e) {
            echo "Error en autodeploy: " . $e->getMessage();
            die();
        }
    }
}
