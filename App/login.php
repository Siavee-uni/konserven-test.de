<?php
include_once dirname(__DIR__, 1) . '/env.php';
include_once 'components/session.php';
?>

    <link rel="stylesheet" type="text/css" href="/css/input_form.css">

<?php
$errorMsg = "";

if (isset($_POST["submit"])) {
    $validUser = $_POST["username"] == getenv("USER_NAME") && $_POST["password"] == getenv("USER_PW");
    if (!$validUser) {
        $errorMsg = "Invalid username or password.";
    } else {
        $_SESSION["login"] = true;
        header("Location: https://www.konserven-tests.de/");
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
