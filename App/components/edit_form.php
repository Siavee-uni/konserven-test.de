<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>

<head>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/input_form.css">
    <title>edit-form</title>
    <!--===============================================================================================-->
</head>

<body>
<?php
// echo postform
$server = "http://$_SERVER[HTTP_HOST]";
if ($_SESSION["login"]) {
    $url = dirname(__DIR__, 2);
    include_once $url . '/database/database.class.php';

    $id = $_POST["id"];

    $connection = new Database;
    $connection->id = $id;
    $postObject = $connection->readSingle("id");

    if ($postObject->bio == 1) {
        $bioChecked = "checked";
    } else {
        $bioChecked = "";
    }

    if ($postObject->vegan == 1) {
        $veganChecked = "checked";
    } else {
        $veganChecked = "";
    }

    $imgPath = "../uploads/" . $postObject->image;

    echo '
    <div class="container-contact100">
      <div class="wrap-contact100">
        <form class="contact100-form validate-form" action="../api/update.php" method="POST" enctype="multipart/form-data">
          <div class="wrap-input100 validate-input" data-validate="Name is required">
            <span class="label-input100">Name</span>
            <input type="text" id="name" name="name" value="' . $postObject->name . '">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Name is required">
            <span class="label-input100">Firma</span>
            <input type="text" id="brand" name="brand" value="' . $postObject->brand . '">
            <span class="focus-input100"></span>
          </div>
    
          <div class="wrap-input100 validate-input">
            <span class="label-input100">Bio</span>
            <input type="checkbox" id="bio" value="1" name="bio" ' . $bioChecked . ' >
            <span class="focus-input100"></span>
            
            <span class="label-input100">Vegan</span>
            <input type="checkbox" id="vegan" value="1" name="vegan" ' . $veganChecked . '>
            <span class="focus-input100"></span>
          </div>
    
          <div class="wrap-input100 input100-select">
            <span class="label-input100">Score</span>
            <div>
              <select class="selection-2" name="score">
                <option ' . (($postObject->score === "1") ? "selected" : "") . '>1</option>
                <option ' . (($postObject->score === "2") ? "selected" : "") . '>2</option>
                <option ' . (($postObject->score === "3") ? "selected" : "") . '>3</option>
                <option ' . (($postObject->score === "4") ? "selected" : "") . '>4</option>
                <option ' . (($postObject->score === "5") ? "selected" : "") . '>5</option>
                <option ' . (($postObject->score === "6") ? "selected" : "") . '>6</option>
                <option ' . (($postObject->score === "7") ? "selected" : "") . '>7</option>
                <option ' . (($postObject->score === "8") ? "selected" : "") . '>8</option>
                <option ' . (($postObject->score === "9") ? "selected" : "") . '>9</option>
                <option ' . (($postObject->score === "10") ? "selected" : "") . '>10</option>
              </select>
            </div>
            
            <span class="label-input100">Filling?</span>
            <div>
              <select class="selection-2" name="filling">
              <option ' . (($postObject->filling === "1") ? "selected" : "") . '>1</option>
              <option ' . (($postObject->filling === "2") ? "selected" : "") . '>2</option>
              <option ' . (($postObject->filling === "3") ? "selected" : "") . '>3</option>
              <option ' . (($postObject->filling === "4") ? "selected" : "") . '>4</option>
              <option ' . (($postObject->filling === "5") ? "selected" : "") . '>5</option>
              <option ' . (($postObject->filling === "6") ? "selected" : "") . '>6</option>
              <option ' . (($postObject->filling === "7") ? "selected" : "") . '>7</option>
              <option ' . (($postObject->filling === "8") ? "selected" : "") . '>8</option>
              <option ' . (($postObject->filling === "9") ? "selected" : "") . '>9</option>
              <option ' . (($postObject->filling === "10") ? "selected" : "") . '>10</option>
              </select>
            </div>
          </div>
          <div class="wrap-input100 validate-input"">
            <span class="label-input100">Beschreibung</span>
            <textarea class="input100" name="description" placeholder="Your description here...">' . $postObject->description . '"</textarea>
            <span class="focus-input100"></span>
          </div>
            <img src="' . $imgPath . '" alt="konserve" style="width: 300px;>
          <div class="wrap-input100">
            <span class="label-input100">Bild</span>
            <input type="file" name="image">
            <span class="focus-input100"></span>
          </div>
          
          <input name="id" type="hidden" value="' . $postObject->id . '">
    
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
} else {
    header("Location:" . $server); // $_SERVER['HTTP_HOST']
}
?>

</body>