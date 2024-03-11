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
    <title>Kosár</title>
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
                <!-- Your dropdown menu content here -->
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
    <?php
        if(!isset($_POST["planetID"])) {
            echo "<main><p class='cartp'>A kosár üres</p></main>";
            echo "<main hidden>";
        } else {
            echo "<main>";
        }
    ?>
        <div class="pay_column" id="column1">
          <div class="pay_item" id="pay_detail">
            <?php
                $planetID = $_POST["planetID"];
                $planet = json_decode(
                    file_get_contents(
                        "http://".$_SERVER['HTTP_HOST']
                            .implode("/",array_map('rawurlencode',explode("/",dirname($_SERVER['SCRIPT_NAME'])."/api/get_planet_by_id.php")))
                            ."?planetID=$planetID"
                        )
                    );
                echo "<p>".$planet->description."</p>";
            ?>
          </div>
          <div class="pay_item" id="pay_form">
            <form action="./finalize.php" method="post" id="user_input">
                <label for="name">Név: </label>
                <input type="text" id="name" name="name" required>

                <label for="date">Utazás dátuma:</label>
                <?php
                    echo "<input type='date' id='date' name='date' min='".date("Y-m-d")."' required>";

                    echo "<label for='return_date'>Visszaút dátuma (opcionális):</label>";
                    echo "<input type='date' id='return_date' name='return_date' min='".date("Y-m-d")."'>";
                ?>

                <label for="from">Honnan?:</label>
                <input type="text" id="from" list="planet_list" name="from" required>
                <datalist id="planet_list">
                    <?php
                        $planets = json_decode(
                            file_get_contents(
                                "http://".$_SERVER['HTTP_HOST']
                                    .implode("/",array_map('rawurlencode',explode("/",dirname($_SERVER['SCRIPT_NAME'])."/api/get_planets.php")))
                                )
                            );
                        foreach($planets as $current_planet) {
                            echo "<option value='".$current_planet->name."'>";
                        }
                    ?>
                </datalist>

                <label for="people">Fő (db):</label>
                <input type="number" id="people" name="people" min="1" value="1" required>
                <?php
                    echo "<input type='hidden' name='planetID' value='".$planetID."'>";
                ?>
                <input hidden type="submit" id="submit_button">
            </form>
          </div>
        </div>
        <div class="pay_column" id="column2">
          <div class="pay_item" id="pay_sum">
            <?php
                ini_set('display_errors','Off');
                echo "<img src='./img/planets/".$planet->wideimage."' id='pay_img'>";
                echo "<h2>".$planet->name."</h2>";
                echo "<span style='display: none' id='base_price'>".$planet->price."</span>";
                echo "<p id='price'>$".$planet->price."</p>";
            ?>
            <a class="termek_button cart_btn btn" onclick='document.getElementById("submit_button").click()'>Fizetés</a>
            <a class="delete" href="./cart.php">Utazás törlése</a>
          </div>
        </div>
    </main>
    <script src="./script/update_price.js"></script>
    <script src="./script/invalidate.js"></script>
</body>
</html>