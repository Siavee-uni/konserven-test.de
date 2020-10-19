<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

if ($_SESSION["login"] && ($_SERVER['REQUEST_METHOD'] == 'POST')) {

    $url = dirname(__DIR__, 2);
    include_once $url . '/database/database.class.php';

    // file upload
    /* $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); */

    /* move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); */
    $connection = new Database;

    $connection->name = $_POST["name"];
    $connection->bio = $_POST["bio"];
    $connection->vegan = $_POST["vegan"];
    $connection->description = $_POST["description"];
    $connection->filling = $_POST["filling"];
    $connection->score = $_POST["score"];
    $connection->id = $_POST["id"];

    if ($connection->update()) {
        /* move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); */
        header("Location: http://localhost/konserven-test.de/public/");
    } else {
        echo "You are not logged in. Redirect in 5sec";
        header("refresh:5; http://localhost/konserven-test.de/public/");
    }
   

}