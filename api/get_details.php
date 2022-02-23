<?php

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST['user_id'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
    $stmt->execute([
        ':user_id' => $user_id
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($user);
}
