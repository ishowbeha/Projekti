<?php
class Order {
    private $userId;
    private $name;
    private $surname;
    private $productName;
    private $price;

    public function __construct($userId, $name, $surname, $productName, $price) {
        $this->userId = $userId;
        $this->name = $name;
        $this->surname = $surname;
        $this->productName = $productName;
        $this->price = $price;
    }

    public function getUserId() { 
        return $this->userId; 
    }

    public function getName() { 
        return $this->name; 
    }

    public function getSurname() { 
        return $this->surname; 
    }

    public function getProductName() { 
        return $this->productName; 
    }

    public function getPrice() { 
        return $this->price; 
    }
}
?>

