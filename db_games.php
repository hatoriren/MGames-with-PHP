<?php
$host = 'localhost'; 
$db = 'games_store'; 
$user = 'root'; 
$password = ''; 

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
?>
