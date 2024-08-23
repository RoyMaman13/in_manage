<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'inmanage_db'; // Change to your actual database name
    private $username = 'root'; // Your MySQL username
    private $password = ''; // Set your MySQL password here
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            // Include the password in the PDO connection
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }
        return $this->conn;
    }

    // Perform a SELECT query
    public function select($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Perform an INSERT query
    public function insert($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    // Perform an UPDATE query
    public function update($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }

    // Perform a DELETE query
    public function delete($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    }
}
?>
