<?php session_start(); ?>

<link rel="stylesheet" type="text/css" href="css/input_form.css">

<?php
$errorMsg = "";
$_SESSION["login"] = $_SESSION["login"];

if (isset($_POST["submit"])) {
  $validUser = $_POST["username"] == "test" && $_POST["password"] == "123";
  if (!$validUser) {
    echo $errorMsg = "Invalid username or password.";
  } else {
    $_SESSION["login"] = true;
    header("Location: http://localhost/konserven-test.de/public/");
  }
}
$loginForm = '
  <div class="login-page">
    <div class="form">
      <form class="login-form" name="input" action="" method="post">
        <input type="text" value="" id="username" name="username" placeholder="username"/>
        <input type="password" value="" id="password" name="password" placeholder="password"/>
        <button type="submit" name="submit" >login</button>
        <div class="error">' . $errorMsg . '</div>
      </form>
    </div>
  </div>';

if (empty($validUser) || !empty($errorMsg)) {
  echo $loginForm;
}
