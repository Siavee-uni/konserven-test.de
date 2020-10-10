<?php
$errorMsg = "";
$validUser = "";
$form = '<form action="../api/api.php" method="POST" enctype="multipart/form-data">  
          <input type="text" id="name" name="name" value="">
          <label for="name">Name</label><br>
          <br>
          <input type="checkbox" id="bio" name="bio" >
          <label for="bio">BIO</label><br>
          <br>
          <label>Score:
          <select name="score" size="10">
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
          </label>
          <br>
          <br>
          <input type="file" name="image">
          <br>
          <br>
          <input type="submit" value="Submit">
        </form>';

$form2 = '<form name="input" action="" method="post">
            <label for="username">Username:</label><input type="text" value="" id="username" name="username" />
            <br>
            <label for="password">Password:</label><input type="password" value="" id="password" name="password" />
            <br>
            <div class="error">'.$errorMsg.'</div>
            <br>
            <input type="submit" value="Abschicken" name="submit" />
          </form>';

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
