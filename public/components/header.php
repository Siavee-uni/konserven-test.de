<html lang="de">
<title>konserven-tests</title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="/css/materialize/css/materialize.min.css">
<link rel="stylesheet" href="/css/main.css">
<body>

<header>
    <nav class="navigation_1">
        <div class="container nav-wrapper">
            <a href="https://www.konserven-tests.de/"><img class="logo" src="/img/konserven-test-logo.png"
                                                           alt="konserven-test-logo"></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Über Uns</a></li>
                <li><a href="#">Kontakt</a></li>
                <?php if ($_SESSION["login"]) : ?>
                    <li><a href="/components/form.php">New Post</a></li>
                <?php endif ?>
            </ul>
        </div>
    </nav>
    <nav class="nav2">
        <div class="container">
            <ul class="hide-on-med-and-down filter-nav">
                <li><a href="https://www.konserven-tests.de/">Alle Produkte</a></li>
                <li id="vegan"><a href="?search=vegan">Vegan</a></li>
                <li><a href="?search=bio">Bio</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="#">Über Uns</a></li>
        <li><a href="#">Kontakt</a></li>
    </ul>
</header>