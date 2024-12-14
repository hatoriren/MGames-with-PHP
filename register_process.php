<?php
require 'db_connection.php';

// Перевіряємо, чи це POST-запит
if (!isset($_SERVER['REQUEST_METHOD']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Invalid request method']);
    exit();
}

// Перевіряємо, чи встановлено ключ signUp
if (!isset($_POST['signUp'])) {
    echo json_encode(['error' => 'Missing signUp parameter']);
    exit();
}

// Отримуємо дані
$fName = $_POST['fName'] ?? '';
$lName = $_POST['lName'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Валідація даних
if (empty($fName) || empty($lName) || empty($email) || empty($password)) {
    echo json_encode(['error' => 'All fields are required']);
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['error' => 'Invalid email']);
    exit();
}

if (strlen($password) < 8) {
    echo json_encode(['error' => 'Password must be at least 8 characters long']);
    exit();
}

// Хешування пароля
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Перевірка унікальності email
$stmt = $conn->prepare('SELECT id FROM users WHERE email = ?');
if (!$stmt) {
    echo json_encode(['error' => 'SQL error: ' . $conn->error]);
    exit();
}
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['error' => 'This email is already registered']);
    exit();
}

$stmt->close();

// Додаємо дані до бази
$stmt = $conn->prepare('INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)');
if (!$stmt) {
    echo json_encode(['error' => 'SQL error: ' . $conn->error]);
    exit();
}
$stmt->bind_param('ssss', $fName, $lName, $email, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode(['redirect' => 'index.php']);
} else {
    echo json_encode(['error' => 'Registration error. Please try again later']);
}

$stmt->close();
$conn->close();
?>
