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
    public function handleOrderRequest() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!isset($_SESSION['user_id'])) {
                die(json_encode(["error" => "Ju nuk jeni i kyçur!"]));
            }

            if (empty($_POST['product_name']) || empty($_POST['price'])) {
                die(json_encode(["error" => "Të dhëna të munguara!"]));
            }

            $userId = $_SESSION['user_id'];
            $productName = htmlspecialchars($_POST['product_name']);
            $price = floatval($_POST['price']);
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
