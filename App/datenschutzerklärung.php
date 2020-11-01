<?php
include_once 'components/session.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="css/materialize/css/materialize.min.css">
<link rel="stylesheet" href="css/main.css">

<?php
require_once('components/header.php');
readfile('components/datenschutzerklärung.html');
readfile('components/footer.html');
?>