<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="./script/jump_animation.js"></script>
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
            <a class="nav-link" href="./product.php"><p>Ajánlatok</p><span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./cart.php"><p>Kosár</p></a>
          </li>
        </ul>
      </div>
    </nav> 
  </header>
  <main class="product_main">
    <div class="overlay" onclick="closeOverlay()">
      <img src="./img/boylgo.jpg">
    </div>
    <div class="product_item">
      <img src="./img/boylgo.jpg" onclick="openOverlay()">
        <div class="product_desc" id="details">
            <h2>Planet_Name</h2>
            <p>efhafoiahndfihníaifvdijvni íabvuiadíbvuiabdvlibdavilbdagv eibdblvíakegbvilbígriwíb</p>
        </div>
        <div class="product_desc" id="add">
            <a class="termek_button" href="">Foglalás</a>
        </div>
    </div>
    <div class="overlay" onclick="closeOverlay()">
      <img src="./img/boylgo.jpg">
    </div>
    <div class="product_item">
      <img src="./img/boylgo.jpg" onclick="openOverlay()">
        <div class="product_desc" id="details">
            <h2>Planet_Name</h2>
            <p>efhafoiahndfihníaifvdijvni íabvuiadíbvuiabdvlibdavilbdagv eibdblvíakegbvilbígriwíb</p>
        </div>
        <div class="product_desc" id="add">
            <a class="termek_button" href="">Foglalás</a>
        </div>
    </div>
</main>

</body>
</html>