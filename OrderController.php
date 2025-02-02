<?php
require_once 'OrderRepository.php';
require_once 'session.php';

class OrderController {
    private $orderRepository;

    public function __construct() {
        $this->orderRepository = new OrderRepository();
    }
    public function getAllOrders() {
        return $this->orderRepository->getAllOrders();
    }
    public function getOrderById($orderId) {
        return $this->orderRepository->getOrderById($orderId);
    }

    public function updateOrderUserInfo($orderId, $name, $surname) {
        return $this->orderRepository->updateOrderUserInfo($orderId, $name, $surname);
    }
    public function updateOrderProductInfo($orderId, $productName, $price) {
        return $this->orderRepository->updateOrderProductInfo($orderId, $productName, $price);
    }
    
    public function handleOrderRequest() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Debug për të parë çfarë po dërgohet në $_POST
            var_dump($_POST);
    
            // Kontrollo nëse përdoruesi është i kyçur
            if (!isset($_SESSION['user_id'])) {
                die(json_encode(["error" => "Ju nuk jeni i kyçur!"]));
            }
    
            // Kontrollo nëse të dhënat janë të plota dhe nuk janë bosh
            if (empty(trim($_POST['product_name'])) || empty(trim($_POST['price']))) {
                die(json_encode(["error" => "Të dhëna të munguara!"]));
            }
    
            $userId = $_SESSION['user_id'];
            $productName = htmlspecialchars(trim($_POST['product_name']));
            $price = floatval($_POST['price']);
    
            if ($price <= 0) {
                die(json_encode(["error" => "Çmimi duhet të jetë një numër valid!"]));
            }
    
            $name = $_SESSION['name'] ?? 'Anonim';
            $surname = $_SESSION['surname'] ?? 'Anonim';
    
            $order = new Order($userId, $name, $surname, $productName, $price);
    
            $success = $this->orderRepository->addOrder($order);
    
            if ($success) {
                echo '<script type="text/javascript">alert("Porosia u ruajt me sukses!"); window.location.href = "Chair.php";</script>';
            } else {
                echo json_encode(["error" => "Dështoi ruajtja e porosisë!"]);
            }
        }
    }
    
    
}

$controller = new OrderController();
$controller->handleOrderRequest();
?>
