<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

if ($_SESSION["login"] && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    
    $url = dirname(__DIR__, 2);
    include_once $url . '/database/database.class.php';

    // file upload
    $target_dir = "../uploads/";

    $date = new DateTime();
    $timeStamp = $date->getTimestamp();

    $target_file = $target_dir . basename($_FILES["image"]["name"]);

   /*  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    echo $_FILES["image"]["name"] = basename($_FILES["image"]["name"],".".$imageFileType) . $timeStamp . "." . $imageFileType; */
    
    $data = [
        'name' => $_POST["name"],
        'bio' => $_POST["bio"],
        'vegan' => $_POST["vegan"],
        'description' => $_POST["description"],
        'filling' => $_POST["filling"],
        'score' => $_POST["score"],
        'image' => basename($_FILES["image"]["name"])
    ];

    $connection = new Database;
    
    if ($connection->create($data)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        header("Location: http://localhost/konserven-test.de/public/");
    } else {
        echo "something went wrong";
        header("refresh:5; http://localhost/konserven-test.de/public/");
    }

}   else {

    echo "You are not logged in";
    header("refresh:5; http://localhost/konserven-test.de/public/");
}