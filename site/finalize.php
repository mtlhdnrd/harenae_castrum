<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
        <div>
            <p>Ide csak ki kell írni mit vesz a felhasználó</p>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus odio doloribus voluptates consequatur beatae magnam perferendis dicta? Ipsa commodi quia rem distinctio eum dolore saepe doloremque minima atque magnam dicta, repudiandae fugiat impedit placeat iure excepturi temporibus quae omnis quasi. Dolores excepturi, architecto corrupti nobis adipisci ipsa qui saepe facilis vero totam, quibusdam, eius vitae harum obcaecati nisi maiores doloremque dignissimos sed illum sequi earum quidem ad molestias id? Iure voluptas delectus error quibusdam ut! Quia alias ipsa officiis, dolorem voluptate asperiores ea quisquam laudantium nostrum inventore omnis cumque, doloremque non, totam sint consectetur architecto autem. Laboriosam optio assumenda id.</p>
        </div>
        <a class="termek_button finalize_btn" href="">Fizetés</a>
    </main>
</body>
</html>