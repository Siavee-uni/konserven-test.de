<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    $_SESSION["login"] = false;
}
?>
<?php
require('components/header.php');
readfile('components/info_box.html');
require('components/list.php');
readfile('components/footer.html');
?>