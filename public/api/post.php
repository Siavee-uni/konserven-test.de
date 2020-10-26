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
        'brand' => $_POST["brand"],
        'vegan' => $_POST["vegan"],
        'description' => $_POST["description"],
        'filling' => $_POST["filling"],
        'score' => $_POST["score"],
        'image' => basename($_FILES["image"]["name"]),
        'url' => $_POST["name"] . "-" . $_POST["brand"]
    ];
    $connection = new Database;

   /*  $connection->name = $_POST["name"];
    $connection->bio = $_POST["bio"];
    $connection->vegan = $_POST["vegan"];
    $connection->description = $_POST["description"];
    $connection->filling = $_POST["filling"];
    $connection->score = $_POST["score"];
    $connection->id = $_POST["id"];
    $connection->brand = $_POST["brand"];
    $connection->image = basename($_FILES["image"]["name"]); */

    
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