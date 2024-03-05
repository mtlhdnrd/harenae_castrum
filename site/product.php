<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="./script/jump_animation.js"></script>
        <script src="./script/overlay.js"></script>
        <title>Termékek</title>
    </head>
    <body>
        <header class="fixed-top">
            <nav class="navbar navbar-expand">
            <div class="navbar-brand">
                <img src="./img/boylgo.jpg">
                <h2>Harenae Castrum</h2>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.html"><p>Főoldal</p></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./product.html"><p>Ajánlatok</p><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="./cart.html"><p>Kosár</p></a>
                </li>
                </ul>
            </div>
            </nav>
        </header>
        <main class="product_main">
            <?php
                //require_once "./api/classes.php";
                ob_start();
                include_once "./api/get_planets.php";
                $planets = ob_get_clean();
                //echo $planets."<br>";
                //for($i = 0; $i < 8; $i++) {
                foreach(json_decode($planets) as $planet) {
                    echo "<div id='overlay".$planet->ID."' class='overlay' onclick='closeOverlay(".$planet->ID.")'>";
                    echo "    <img src='./img/planets/".$planet->infopanel."'>";
                    echo "</div>";
                    echo "<div class='product_item'>";
                    echo "    <img src='./img/planets/".$planet->image."' onclick='openOverlay(".$planet->ID.")'>";
                    echo "    <div class='product_desc' id='details'>";
                    echo "        <h2>".$planet->name."</h2>";
                    echo "        <p>".$planet->description."</p>";
                    echo "    </div>";
                    echo "    <div class='product_desc add'>";
                    echo "        <a class='termek_button' href=''>Foglalás</a>";
                    echo "    </div>";
                    echo "</div>";
                }
            ?>
            <!--div id="overlay10" class="overlay" onclick="closeOverlay(10)">
                <img src="./img/boylgo.jpg">
            </div>
            <div class="product_item">
                <img src="./img/boylgo.jpg" onclick="openOverlay(10)">
                <div class="product_desc" id="details">
                    <h2>Planet_Name</h2>
                    <p>efhafoiahndfihníaifvdijvni íabvuiadíbvuiabdvlibdavilbdagv eibdblvíakegbvilbígriwíb</p>
                </div>
                <div class="product_desc add">
                    <a class="termek_button" href="">Foglalás</a>
                </div>
            </div>
            <div id="overlay20" class="overlay" onclick="closeOverlay(20)">
                <img src="./img/planets/crystallis_infopanel_00000.png">
            </div>
            <div class="product_item">
                <img src="./img/planets/crystallis_min_00000.png" onclick="openOverlay(20)">
                <div class="product_desc" id="details">
                    <h2>Crystallis</h2>
                    <p>Egy bolyó-méretű szellemváros, amely arra készteti az egyént, hogy újragondolja a háború fogalmát, miközben az áldozatok rideg, drágakövekbe fagyott tekintetükkel vizslatják a betolakodót.</p>
                </div>
                <div class="product_desc add">
                    <a class="termek_button" href="">Foglalás</a>
                </div>
            </div-->
        </main>
    </body>
</html>
