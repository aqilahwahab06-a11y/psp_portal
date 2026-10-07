<?php
// models/Student.php

class Student {
    private $conn;
    private $table_name = "students";

    public function __construct($db) {
        $this->conn = $db;
    }

    // 1. Cari pelajar mengikut NRIC (Untuk Login)
    public function getByNric($nric) {
        $query = "SELECT id, nric, name, program, password, marks, profile_image FROM " . $this->table_name . " WHERE nric = :nric";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nric', $nric);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 2. Cari pelajar mengikut ID (Sertakan password & profile_image sekali)
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. Kemaskini kata laluan (Tukar Password dengan Hashing)
    public function updatePassword($id, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $query = "UPDATE " . $this->table_name . " SET password = :password WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // 4. Kemaskini gambar profil pelajar (Ditambah untuk Mini Project 2)
    public function updateProfileImage($id, $image_name) {
        $query = "UPDATE " . $this->table_name . " SET profile_image = :profile_image WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":profile_image", $image_name);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // --- CRUD OPERATIONS ---

    // READ: Dapatkan semua pelajar
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // CREATE: Tambah pelajar baru
    public function create($nric, $name, $program, $password, $marks) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO " . $this->table_name . " (nric, name, program, password, marks) 
                  VALUES (:nric, :name, :program, :password, :marks)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nric", $nric);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":program", $program);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(":marks", $marks);

        return $stmt->execute();
    }

    // UPDATE: Kemaskini profil/markah pelajar
    public function update($id, $name, $program, $marks) {
        $query = "UPDATE " . $this->table_name . " 
                  SET name = :name, program = :program, marks = :marks 
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":program", $program);
        $stmt->bindParam(":marks", $marks);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    // DELETE: Padam pelajar
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>