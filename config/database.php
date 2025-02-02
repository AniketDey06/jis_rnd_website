<?php
session_start();

$host = 'localhost';
$dbname = 'rnd_website';
$user = 'root';   
$password = '';   

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    error_log("Connection failed: " . $e->getMessage());
    die('Database connection error.');
}
?>