<!-- include files -->
<style>
	<?php
	include 'css/materialize/css/materialize.min.css';
	include 'css/main.css';
	?>
</style>

<?php
readfile('html/header.html');
require_once 'html/info_box.php';
require_once 'html/list.php';
readfile('html/footer.html');
$uri =  __DIR__;
?>