<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
$server = "http://$_SERVER[HTTP_HOST]";

if ($_SESSION["login"] && isset($_POST["id"])) {
    
    $url = dirname(__DIR__, 2);
    include_once $url . '/database/database.class.php';
    $id =  $_POST["id"];

    $connection = new Database;
    $connection->id = $id;
    $fileName = $connection->readSingle("id")->image;

    if ($connection->delete()) {
        // delete File from server
        $filePath = "../uploads/" . $fileName;
        unlink($filePath);
        header("Location:" . $server);

    } else {
        echo "something went wrong";
        header("refresh:5;" .$server);
    }

} else {
    echo "You are not logged in. Redirect in 5sec";
    header("refresh:5;" . $server);
}

