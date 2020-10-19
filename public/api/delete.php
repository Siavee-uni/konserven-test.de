<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

if ($_SESSION["login"] && isset($_POST["id"])) {
    
    $url = dirname(__DIR__, 2);
    include_once $url . '/database/database.class.php';
    
    $id =  $_POST["id"];

    $connection = new Database;
    $connection->id = $id; 

    if ($connection->delete()) {
        // delete File from server
        $table = 'konserven';
        $colum = 'image';
        $fileName = $connection->readSingle($colum, $table, $id)->image;
        $filePath = "../uploads/" . $fileName;

        unlink($filePath);
        header("Location: http://localhost/konserven-test.de/public/"); 

    } else {
        echo "something went wrong";
        header("refresh:5; http://localhost/konserven-test.de/public/");
    }

} else {
    echo "You are not logged in. Redirect in 5sec";
    header("refresh:5; http://localhost/konserven-test.de/public/");
}

