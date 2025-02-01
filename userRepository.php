<?php

include_once 'databaseConnection.php';


class UserRepository {
    private $connection; 

   
    function __construct() {
        $conn = new DatabaseConnection();
        $this->connection = $conn->startConnection(); 
    }


    function insertUser($user) {
        $conn = $this->connection;

   
        $id = $user->getId();
        $name = $user->getName();
        $surname = $user->getSurname();
        $email = $user->getEmail();
        $gender = $user->getGender();
        $day = $user->getDay();
        $month = $user->getMonth();
        $year = $user->getYear();
        $password = $user->getPassword();
        $role = $user->getRole();

        $sql = "INSERT INTO users (name, surname, email, gender, day, month, year, password, role) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);

      
        $statement->execute([$name, $surname, $email, $gender, $day, $month, $year, $password, $role]);
        echo "<script> alert('User has been inserted successfully!'); </script>";
    }
    function getAllUsers() {
        $conn = $this->connection;

        $sql = "SELECT * FROM users";

        $statement = $conn->query($sql); 
        $users = $statement->fetchAll(); 

        return $users; 
    }

    function getUserByEmail($email) {
        $conn = $this->connection;
        $sql = "SELECT * FROM users WHERE email = ?";
        $statement = $conn->prepare(query: $sql);
        $statement->execute([$email]);
        return $statement->fetch(PDO::FETCH_ASSOC); // Kthen associative array
    }
    
    function getUserById($id) {
        $conn = $this->connection;

     
        $sql = "SELECT * FROM users WHERE id='$id'";

        $statement = $conn->query($sql); 
        $user = $statement->fetch(); 

        return $user;
    }

    
    function updateUser($id, $name, $surname, $email, $password, $role) {
        $conn = $this->connection;
    
        // Nëse passwordi është bosh, ruaj passwordin ekzistues
        if (empty($password)) {
            $sql = "UPDATE users SET name=?, surname=?, email=?, role=? WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$name, $surname, $email, $role, $id]);
        } else {
            $sql = "UPDATE users SET name=?, surname=?, email=?, password=?, role=? WHERE id=?";
            $statement = $conn->prepare($sql);
            $statement->execute([$name, $surname, $email, $password, $role, $id]);
        }
    
        echo "<script>alert('Update was successful');</script>";
    }

    
    function deleteUser($id) {
        $conn = $this->connection;

      
        $sql = "DELETE FROM users WHERE id=?";

        $statement = $conn->prepare($sql); 

       
        $statement->execute([$id]);

       
        echo "<script>alert('Delete was successful');</script>";
    }
}


?>
