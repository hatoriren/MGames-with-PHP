<?php
$host = 'localhost'; 
$db = 'login'; 
$user = 'root'; 
$password = ''; 

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
?>
