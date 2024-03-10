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
    <title>Fizetés</title>
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
    <main>
        <div class="finalize_details">
            <?php
                if(!isset($_POST["planetID"])
                    || !isset($_POST["name"])
                    || !isset($_POST["date"])
                    || !isset($_POST["return_date"])
                    || !isset($_POST["from"])
                    || !isset($_POST["people"])) {
                    echo "<h1>400 Bad request</h1>";
                    echo "<img src='https://http.cat/400'>";
                    http_response_code(400);
                } else {
                    $customerName = $_POST["name"];
                    $dateOfJourney = $_POST["date"];
                    $dateOfReturn = $_POST["return_date"];
                    $from = $_POST["from"];
                    $people = $_POST["people"];
                    $planet = json_decode(
                        file_get_contents(
                            "http://".$_SERVER['HTTP_HOST']
                                .implode("/",array_map('rawurlencode',explode("/",dirname($_SERVER['SCRIPT_NAME'])."/api/get_planet_by_id.php")))
                                ."?planetID=".$_POST["planetID"]
                            )
                        );
                    echo "<p>Megrendelő neve: ".$customerName."</p>";
                    echo "<p>Hova: ".$planet->name."</p>";
                    echo "<p>Honnan: ".$from."</p>";
                    echo "<p>Utazás napja: ".$dateOfJourney."</p>";
                    if($dateOfReturn != "") {
                        echo "<p>Visszaút napja: ".$dateOfReturn."</p>";
                    }
                    echo "<p>Utasok száma: ".$people."</p>";
                }
            ?>
        </div>
        <a class="termek_button finalize_btn" href="">Fizetés</a>
    </main>
</body>
</html>
