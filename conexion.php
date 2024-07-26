<?php
class Conexion {
    private $host = 'sql300.infinityfree.com';
    private $dbname = 'if0_36968949_dblibreria';
    private $user = 'if0_36968949';
    private $pass = 'peapea1717';
    private $pdo;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}
?>
