<?php

class Appointment {
    private $conn;
    private $table = "appointments";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (name, service, date) 
                  VALUES (:name, :service, :date)";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ":name" => $data->name,
            ":service" => $data->service,
            ":date" => $data->date
        ]);
    }

    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " 
                  SET status = :status 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        return $stmt->execute([
            ":status" => $data->status,
            ":id" => $id
        ]);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([":id" => $id]);
    }
}