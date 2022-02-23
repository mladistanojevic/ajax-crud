<?php

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_POST['user_id'];

    $stmt = $pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
    if ($stmt->execute([
        ':user_id' => $user_id
    ])) {
        echo "Successfully deleted!";
    } else {
        echo "Something went wrong!";
    }
}
