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
<!-- include files -->
<style>
	<?php
	include 'css/materialize/css/materialize.min.css';
	include 'css/main.css';
	?>
</style>

<?php
require('components/header.php');
readfile('components/info_box.html');
require('components/list.php');
readfile('components/footer.html');
?>