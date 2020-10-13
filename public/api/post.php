<?php
$url = dirname(__DIR__, 2);
include_once $url . '/database/database.class.php';

// file upload
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$data = [
    'name' => $_POST["name"],
    'bio' => $_POST["bio"],
    'vegan' => $_POST["vegan"],
    'description' => $_POST["description"],
    'filling' => $_POST["filling"],
    'score' => $_POST["score"],
    'image' => basename($_FILES["image"]["name"])
];

move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
$connection = new Database;
$message = $connection->create($data);

var_dump($message);
header("Location: http://localhost/konserven-test.de/public/");
