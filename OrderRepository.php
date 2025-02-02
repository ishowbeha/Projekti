<?php
require_once 'databaseConnection.php';
require_once 'Order.php';


class OrderRepository {
    private $conn;

    public function __construct() {
        $database = new DatabaseConnection();
        $this->conn = $database->startConnection(); // Sigurohu që `getConnection()` ekziston dhe kthen një PDO object
    }

    public function addOrder(Order $order): bool {
        try {
            $stmt = $this->conn->prepare("INSERT INTO orders (user_id, name, surname, product_name, price) 
                                          VALUES (:user_id, :name, :surname, :product_name, :price)");
    
            // Ruajmë vlerat në variabla të ndashme
            $userId = $order->getUserId();
            $name = $order->getName();
            $surname = $order->getSurname();
            $productName = $order->getProductName();
            $price = $order->getPrice();
    
            // Lidhim parametrat me variabla
            $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":surname", $surname, PDO::PARAM_STR);
            $stmt->bindParam(":product_name", $productName, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR); // Nëse `price` është float, përdor `PDO::PARAM_STR`
    
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Gabim gjatë ruajtjes së porosisë: " . $e->getMessage());
            return false;
        }
    }
    
    public function getOrdersByUserId($userId) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM orders WHERE user_id = :user_id");
            $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Gabim gjatë marrjes së porosive: " . $e->getMessage());
            return [];
        }
    }
    public function getAllOrders() {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM orders");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Gabim gjatë marrjes së të gjitha porosive: " . $e->getMessage());
            return [];
        }
    }
    public function deleteOrder($orderId) {
        try {
            // Përgatitja e deklaratës për fshirjen e porosisë
            $stmt = $this->conn->prepare("DELETE FROM orders WHERE id = :id");

            // Lidheni parametrin ID
            $stmt->bindParam(":id", $orderId, PDO::PARAM_INT);

            // Ekzekutojmë kërkesën
            return $stmt->execute();
        } catch (PDOException $e) {
            // Gabim gjatë ekzekutimit të fshirjes
            error_log("Gabim gjatë fshirjes së porosisë: " . $e->getMessage());
            return false;
        }
    }
    public function getOrderById($orderId) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM orders WHERE id = :id");
            $stmt->bindParam(":id", $orderId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Gabim gjatë marrjes së porosisë: " . $e->getMessage());
            return null;
        }
    }
    
    public function updateOrderUserInfo($orderId, $name, $surname) {
        try {
            $stmt = $this->conn->prepare("UPDATE orders SET name = :name, surname = :surname WHERE id = :id");
            $stmt->bindParam(":id", $orderId, PDO::PARAM_INT);
            $stmt->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt->bindParam(":surname", $surname, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Gabim gjatë përditësimit të porosisë: " . $e->getMessage());
            return false;
        }
    }
    public function updateOrderProductInfo($orderId, $productName, $price) {
        try {
            $stmt = $this->conn->prepare("UPDATE orders SET product_name = :product_name, price = :price WHERE id = :id");
            $stmt->bindParam(":id", $orderId, PDO::PARAM_INT);
            $stmt->bindParam(":product_name", $productName, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Gabim gjatë përditësimit të produktit: " . $e->getMessage());
            return false;
        }
    }
    
    
}
?>

