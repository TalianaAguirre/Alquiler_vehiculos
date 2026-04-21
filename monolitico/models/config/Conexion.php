<?php
namespace monolitico\models\config;

use mysqli;

class Conexion {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli(
            'localhost',
            'root',
            '',
            'alquiler_vehiculos_db'
        );

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8");
    }

    // Para consultas SELECT
    public function execute($sql) {
        return $this->conn->query($sql);
    }

    // Para INSERT, UPDATE, DELETE con parámetros
    public function executeUpdateData($sql, $params) {
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param($params['type'], ...$params['datos']);
        $stmt->execute();
        return $stmt;
    }

    // Cierra la conexión
    public function close() {
        $this->conn->close();
    }
}
/*class Database {
    private static $instance = null;
    private $conn;

    private $host     = 'localhost';
    private $usuario  = 'root';
    private $password = '';
    private $nombre   = 'alquiler_vehiculos_db';

    // El constructor hace la conexión
    private function __construct() {
        $this->conn = new mysqli(
            $this->host,
            $this->usuario,
            $this->password,
            $this->nombre
        );

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8");
    }

    // Este método devuelve siempre la misma conexión
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Este método entrega la conexión para usarla
    public function getConnection() {
        return $this->conn;
    }
}*/