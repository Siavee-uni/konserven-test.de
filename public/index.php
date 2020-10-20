<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if (isset($_SESSION['login'])) {
	$_SESSION["login"] = $_SESSION["login"];
} else {
	$_SESSION["login"] = false;
}
?>
<html>
<title>konserven-tests</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="css/materialize/css/materialize.min.css">
<link rel="stylesheet" href="css/main.css">
<body>
<?php
require('components/header.php');
readfile('components/info_box.html');
require('components/list.php');
readfile('components/footer.html');
?>
</body>
</html>