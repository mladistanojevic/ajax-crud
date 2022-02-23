<?php

$con = 'mysql:host=localhost;dbname=testing';
$options = [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

$pdo = new PDO($con, 'root', '', $options);
