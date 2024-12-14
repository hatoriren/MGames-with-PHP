<?php
session_start();
require 'db_connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare('SELECT id, password, firstName FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Логування користувач

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];       // Збереження ID
            $_SESSION['user_name'] = $user['firstName']; // Збереження імені користувача
            echo json_encode(['redirect' => 'index.php']); // Повідомляємо, що треба перенаправити
            exit();
        } else {
            error_log("Password mismatch for email: $email");
            echo json_encode(['error' => 'Wrong password.']);
        }
    } else {
        error_log("User not found: $email");
        echo json_encode(['error' => 'User is not found.']);
    }

    $stmt->close();
    $conn->close();
}
?>
