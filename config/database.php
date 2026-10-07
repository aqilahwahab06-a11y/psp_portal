<?php
// config/database.php

class Database {
    private $host = "localhost";
    private $db_name = "psp_portal";
    private $username = "root";
    private $password = ""; // Kosongkan jika guna XAMPP laluan asal (default)
    public $conn;

    // Fungsi untuk membuat sambungan ke database
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password
            );
            
            // Tetapan error mode ke Exception & default fetch mode ke associative array
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $exception) {
            echo "Sambungan Database Gagal: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>