<?php
include_once '../database/database.class.php';
$date = new DateTime();
$timestamp = $date->getTimestamp();

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$data = [
    'name' => $_POST["name"],
    'bio' => $_POST["bio"],
    'score' => $_POST["score"],
    /* 'date' => date("Y-m-d", $timestamp), */
    'image' => basename($_FILES["image"]["name"])
];
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
$connection = new Database;
$message = $connection->insert($data);

var_dump($message);

