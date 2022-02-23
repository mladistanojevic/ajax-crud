<?php

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = [
        'user_id' => $_POST['user_id'],
        'firstname' => trim($_POST['firstname']),
        'lastname' => trim($_POST['lastname']),
        'email' => trim($_POST['email']),
        'phone' => trim($_POST['phone'])
    ];

    $stmt = $pdo->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, phone = :phone WHERE user_id = :user_id");
    if ($stmt->execute([
        ':firstname' => $data['firstname'],
        ':lastname' => $data['lastname'],
        ':email' => $data['email'],
        ':phone' => $data['phone'],
        ':user_id' => $data['user_id']
    ])) {
        echo "Updated successfully!";
    } else {
        echo "Something went wrong!";
    }
}
