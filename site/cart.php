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
            <img src="./img/boylgo.jpg">
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
            <form>
              <label for="name">Név: </label>
        <input type="text" id="name" name="name">
        <br>
        <label for="date">Utazás dátuma:</label>
        <input type="date" id="date" name="date">
        <br>
        <label for="from">Honnan?:</label>
        <input type="text" id="from" name="from">
            </form>
          </div>
        </div>
        <div class="pay_column" id="column2">
          <div class="pay_item" id="pay_sum">
            <img src="./img/boylgo.jpg" id="pay_img">
            <p>(ide majd kell az ár)</p>
            <a class="termek_button cart_btn" href="">Fizetés</a>
          </div>
        </div>
    </main>
</body>
</html>