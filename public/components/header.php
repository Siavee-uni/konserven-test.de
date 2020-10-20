<header>
  <nav class="navigation_1">
    <div class="container nav-wrapper">
    <a href="konserven-tests.de"><img class="logo" src="img/konserven-test-logo.png" alt="konserven-test-logo"></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Über Uns</a></li>
        <li><a href="#">Kontakt</a></li>
        <?php if ($_SESSION["login"]) : ?>
          <li><a href="components/form.php">New Post</a></li>
        <?php endif ?>
      </ul>
    </div>
  </nav>
  <nav class="nav2">
    <div class="container">
      <ul class="hide-on-med-and-down filter-nav">
        <li><a href="#">Vegan</a></li>
        <li><a href="#">Best Rated</a></li>
        <li><a href="#">Newest</a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="#">Über Uns</a></li>
    <li><a href="#">Kontakt</a></li>
  </ul>
</header>