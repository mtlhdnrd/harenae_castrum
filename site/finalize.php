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
                session_start();
                if(isset($_GET["success"])) {
                    $success = $_GET["success"];
                    if($success) {
                        echo "<p class='feedback'>Sikeres rendelés</p>";
                    } else {
                        echo "<p class='feedback'>Sikertelen rendelés</p>";
                        if(isset($_GET["reason"])) {
                            if($_GET["reason"] == "unknown_customer") {
                                echo "<p class='feedback'>Ismeretlen ügyfél</p>";
                            }
                        }
                    }
                } else if(!isset($_POST["planetID"])
                    || !isset($_POST["name"])
                    || !isset($_POST["date"])
                    || !isset($_POST["return_date"])
                    || !isset($_POST["from"])
                    || !isset($_POST["people"])) {
                    echo "<h1>400 Bad request</h1>";
                    echo "<img src='https://http.cat/400'>";
                    http_response_code(400);
                } else {
                    $planetID = $_POST["planetID"];
                    $customerName = $_POST["name"];
                    $dateOfJourney = $_POST["date"];
                    $dateOfReturn = $_POST["return_date"];
                    $from = $_POST["from"];
                    $people = $_POST["people"];
                    $planet = json_decode(
                        file_get_contents(
                            "http://".$_SERVER['HTTP_HOST']
                                .implode("/",array_map('rawurlencode',explode("/",dirname($_SERVER['SCRIPT_NAME'])."/api/get_planet_by_id.php")))
                                ."?planetID=".$planetID
                            )
                        );

                    $price = $people * $planet->price;
                    echo "<p>Megrendelő neve: ".$customerName."</p>";
                    echo "<p>Hova: ".$planet->name."</p>";
                    echo "<p>Honnan: ".$from."</p>";
                    echo "<p>Utazás napja: ".$dateOfJourney."</p>";
                    if($dateOfReturn != "") {
                        $price *= 2;
                        echo "<p>Visszaút napja: ".$dateOfReturn."</p>";
                    }
                    echo "<p>Utasok száma: ".$people."</p>";
                    echo "<p>Fizetendő összeg: $".$price."</p>";

                    // please actually make a post request this is painful to look at
                    echo "<form hidden action='./api/order.php' method='post'>";
                    echo "<input name='planetID' value='".$planetID."'>";
                    echo "<input name='name' value='".$customerName."'>";
                    echo "<input name='date' value='".$dateOfJourney."'>";
                    echo "<input name='return_date' value='".$dateOfReturn."'>";
                    echo "<input name='from' value='".$from."'>";
                    echo "<input name='participants' value='".$people."'>";
                    echo "<input name='price' value='".$price."'>";
                    echo "<input type='submit' id='bootleg_post_request'>";
                    echo "</form>";


                    $receipt_text = "Megrendelő neve: ".$customerName."\n"
                        ."Hova: ".$planet->name."\n"
                        ."Honnan: ".$from."\n"
                        ."Utazás napja: ".$dateOfJourney."\n";
                    if($dateOfReturn != "") {
                        $receipt_text = $receipt_text."Visszaút napja: ".$dateOfReturn."\n";
                    }
                    $receipt_text = $receipt_text."Utasok száma: ".$people."\n"
                        ."Végösszeg: $".$price;
                    $_SESSION["receipt_text"] = $receipt_text;
                }
            ?>
        </div>
        <?php
            if(!isset($_GET["success"])) {
                echo "<a class='termek_button finalize_btn btn' onclick=\"document.getElementById('bootleg_post_request').click()\">Fizetés</a>";
            } else {
                echo "<a class='termek_button finalize_btn' href='./receipt.php'>Számla</a>";
            }
        ?>
    </main>
</body>
</html>
