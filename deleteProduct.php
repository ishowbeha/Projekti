<?php

// Kontrolloni nëse ID e produktit është i dhënë në URL
if (isset($_GET['id'])) {
    // Merrni ID-në e produktit që duhet të fshihet
    $orderId = $_GET['id']; 

    include_once 'OrderRepository.php';

    $orderRepository = new OrderRepository();

    // Përdorni funksionin deleteOrder për të fshirë produktin nga baza e të dhënave
    if ($orderRepository->deleteOrder($orderId)) {
        // Pas fshirjes, ridrejtoni përdoruesin në dashboard
        header("Location: dashboard.php#order-list");
        exit; // Sigurohuni që të bëni exit pas ridrejtimit
    } else {
        // Gabim gjatë fshirjes
        echo "Gabim gjatë fshirjes së produktit!";
    }
} else {
    echo "ID e produktit nuk është dhënë.";
}
?>
