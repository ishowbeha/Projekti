<?php
require_once "Contact.php";

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new Contact();
    }

    public function submitMessage($name, $email, $message) {
        if (empty($name) || empty($email) || empty($message)) {
            return "All fields are required!";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }

        $saved = $this->contactModel->saveMessage($name, $email, $message);

        return $saved ? "Message sent successfully!" : "Failed to send message.";
    }
}
?>
