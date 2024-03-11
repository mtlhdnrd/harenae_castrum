<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="./favicon.ico">
        <script src="./script/menu.js"></script>
        <script src="./script/overlay.js"></script>
        <title>Termékek</title>
    </head>
    <body>
    <header class="fixed-top">
    <nav class="navbar navbar-expand">
        <div class="navbar-brand">
            <img src="./img/logo_00000.png">
            <h2>Harenae Castrum</h2>
            <button class="navbar-toggler" id="hamburger" type="button" onclick="toggleMenu()" aria-label="Toggle navigation">
                <div class="icon"></div>
                <div class="icon"></div>
                <div class="icon"></div>
            </button>
        </div>
        <div class="navbar-brand" id="hamburger_div">
            <ul class="dropdown-menu" id="dropdownMenu">
                <li><a href="./index.html"><p>Főoldal</p></a></li>
                <li><a href="./product.php"><p>Ajánlatok</p></a></li>
                <li><a href="./cart.php"><p>Kosár</p></a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.html"><p>Főoldal</p></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./product.php"><p>Ajánlatok</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cart.php"><p>Kosár</p></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
        <main class="product_main">
            <?php
                ob_start();
                include_once "./api/get_planets.php";
                $planets = ob_get_clean();
                foreach(json_decode($planets) as $planet) {
                    echo "<div id='overlay".$planet->ID."' class='overlay' onclick='closeOverlay(".$planet->ID.")'>";
                    echo "    <img src='./img/planets/".$planet->infopanel."'>";
                    echo "</div>";
                    echo "<div class='product_item'>";
                    echo "    <img class='planetimg'src='./img/planets/".$planet->image."' onclick='openOverlay(".$planet->ID.")'>";
                    echo "    <div class='product_desc details'>";
                    echo "        <h2>".$planet->name."</h2>";
                    echo "        <p>".$planet->description."</p>";
                    echo "    </div>";
                    echo "    <form action='./cart.php' method='post' class='product_desc add' id='form".$planet->ID."'>";
                    echo "        <input type='hidden' name='planetID' value='".$planet->ID."'>";
                    echo "        <a class='termek_button btn' href='#' onclick='document.getElementById(\"form".$planet->ID."\").submit()'>Foglalás</a>";
                    echo "    </form>";
                    echo "</div>";
                }
            ?>
        </main>
    </body>
</html>
