<?php
class User {
    private $conn;
    private $table_name = 'user';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $surname, $email, $gender, $dob_day, $dob_month, $dob_year, $password) {
        // Kontrollo nëse emaili ekziston
        $query = "SELECT id FROM {$this->table_name} WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return false; // Email already exists
        }
    
        $query = "INSERT INTO {$this->table_name} 
                  (name, surname, email, gender, dob_day, dob_month, dob_year, password) 
                  VALUES (:name, :surname, :email, :gender, :dob_day, :dob_month, :dob_year, :password)";
        $stmt = $this->conn->prepare($query);
    
        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':dob_day', $dob_day);
        $stmt->bindParam(':dob_month', $dob_month);
        $stmt->bindParam(':dob_year', $dob_year);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT)); // Hashing the password
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function login($email, $password) {
        $query = "SELECT id, name, surname, email, password FROM {$this->table_name} WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if a record exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                // Start the session and store user data
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                return true;
            }
        }
        return false;
    }
}
?>