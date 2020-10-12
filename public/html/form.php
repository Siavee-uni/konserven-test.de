<!DOCTYPE html>
<html lang="en">

<head>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/input_form.css">
  <!--===============================================================================================-->
</head>

<body>
  <?php
  $errorMsg = "";
  $validUser = "";
  $form = '
<div class="container-contact100">
  <div class="wrap-contact100">
    <form class="contact100-form validate-form" action="/api/api.php" method="POST" enctype="multipart/form-data">
      <div class="wrap-input100 validate-input" data-validate="Name is required">
        <span class="label-input100">Name</span>
        <input type="text" id="name" name="name" value="">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input">
        <span class="label-input100">Bio</span>
        <input type="checkbox" id="bio" name="bio" value="1">
        <span class="focus-input100"></span>
        
        <span class="label-input100">Vegan</span>
        <input type="checkbox" id="vegan" name="vegan" value="1">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 input100-select">
        <span class="label-input100">Score</span>
        <div>
          <select class="selection-2" name="score">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
          </select>
        </div>
        
        <span class="label-input100">Filling?</span>
        <div>
          <select class="selection-2" name="filling">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
          </select>
        </div>
      </div>
      <div class="wrap-input100 validate-input"">
        <span class="label-input100">Beschreibung</span>
        <textarea class="input100" name="description" placeholder="Your description here..."></textarea>
        <span class="focus-input100"></span>
      </div>
      <div class="wrap-input100 validate-input" data-validate="Name is required">
        <span class="label-input100">Bild</span>
        <input type="file" name="image">
        <span class="focus-input100"></span>
      </div>
      

      <div class="container-contact100-form-btn">
        <div class="wrap-contact100-form-btn">
          <div class="contact100-form-bgbtn"></div>
          <button type="submit" class="contact100-form-btn">
            <span>
              Submit
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </div>
    </form>
  </div>
</div>';

  $form2 = '
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

  if (isset($_POST["submit"])) {
    $validUser = $_POST["username"] == "test" && $_POST["password"] == "123";
    if (!$validUser) {
      echo $errorMsg = "Invalid username or password.";
    } else {
      echo $form;
    }
  }

  if (empty($validUser) || !empty($errorMsg)) {
    echo $form2;
  }
  ?>
</body>

</html>