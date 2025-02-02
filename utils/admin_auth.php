<?php
require_once '../config/database.php';

if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == true) {
    // echo "hello1";
    // $id = $_SESSION['user_id'];
    $login_token =  $_SESSION['session_token'];
    // echo $login_token;
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE session_token = :login_token");
    $stmt->execute(['login_token' => $login_token]);
    $noc = $stmt->rowCount();
    if ($noc) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);      
    } else {
        header('Location: ../utils/logout.php');
        exit;
    }
} else {
    // echo "hello2";
    header('Location: ../utils/logout.php');
    exit;
}

?>