<?php
require_once "databaseConnection.php";

class Contact {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->startConnection();
    }

    public function saveMessage($name, $email, $message) {
        $query = "INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":message", $message);
        return $stmt->execute();
    }
    public function getAllMessages() {
        $query = "SELECT * FROM contact_messages";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
