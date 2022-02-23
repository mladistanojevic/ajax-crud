<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = [
        'firstname' => trim($_POST['firstname']),
        'lastname' => trim($_POST['lastname']),
        'email' => trim($_POST['email']),
        'phone' => trim($_POST['phone']),
    ];

    echo json_encode($data);
    $stmt = $pdo->prepare("INSERT INTO users (firstname,lastname,email,phone) VALUES (:firstname,:lastname,:email,:phone)");
    if ($stmt->execute([
        ':firstname' => $data['firstname'],
        ':lastname' => $data['lastname'],
        ':email' => $data['email'],
        ':phone' => $data['phone']
    ])) {
        echo 'Everything is OK!';
    } else {
        echo 'Something went wrong!';
    }
}
