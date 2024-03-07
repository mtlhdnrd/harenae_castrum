<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Kosár</title>
</head>
<body>
<header class="fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="navbar-brand">
            <img src="./img/logo_00000.png">
            <h2>Harenae Castrum</h2>
        </div>
        <button class="navbar-toggler" type="button" onclick="toggleMenu()" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./index.html"><p>Főoldal</p></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./product.php"><p>Ajánlatok</p><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./cart.php"><p>Kosár</p></a>
                </li>
            </ul>
        </div>
    </nav>
</header>


    <main>
        <div class="pay_column" id="column1">
          <div class="pay_item" id="pay_detail">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur dolores vero similique repellendus adipisci, cum, illo non quibusdam laborum temporibus facere nesciunt qui officiis, quas fugiat eveniet provident ipsam est! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos eos, ex reprehenderit, cumque earum iusto nam numquam consequatur deserunt placeat atque dolorum minus architecto, veniam ullam non quos delectus harum.</p>
          </div>
          <div class="pay_item" id="pay_form">
            <form action="./finalize.php" method="post" id="user_input">
              <label for="name">Név: </label>
        <input type="text" id="name" name="name" required>
        <label for="date">Utazás dátuma:</label>
        <input type="date" id="date" name="date" required>
        <label for="return_date">Visszaút dátuma (opcionális):</label>
        <input type="date" id="return_date" name="return_date">
        <label for="from">Honnan?:</label>
        <input type="text" id="from" name="from" required>
        <label for="people">Fő (db):</label>
        <input type="number" id="people" name="people" min="1" value="1" required>
            </form>
            <a class="termek_button" id="delete_btn" href="">Visszavonás</a>
          </div>
        </div>
        <div class="pay_column" id="column2">
          <div class="pay_item" id="pay_sum">
            <?php
            ini_set('display_errors','Off');
                $planetID = $_POST["planetID"];
                $planet = json_decode(
                    file_get_contents(
                        "http://".$_SERVER['HTTP_HOST']
                            .implode("/",array_map('rawurlencode',explode("/",dirname($_SERVER['SCRIPT_NAME'])."/api/get_planet_by_id.php")))
                            ."?planetID=$planetID"
                        )
                    );
                echo "<img src='./img/boylgo.jpg' id='pay_img'>";
                echo "<span style='display: none' id='base_price'>".$planet->price."</span>";
                echo "<p id='price'>$".$planet->price."</p>";
            ?>
            <a class="termek_button cart_btn" href="#" onclick='document.getElementById("user_input").submit()'>Fizetés</a>
          </div>
        </div>
    </main>
    <script src="./script/update_price.js"></script>
</body>
</html>