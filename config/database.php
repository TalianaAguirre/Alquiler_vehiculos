<?php
// Este archivo maneja la conexión a la base de datos
// Usamos el patrón Singleton: una sola conexión para toda la app

class Database {
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
}