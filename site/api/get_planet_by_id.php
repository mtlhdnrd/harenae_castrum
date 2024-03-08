<?php
    require_once "database.php";
    if(!isset($_GET["planetID"])) {
        echo "<h1>ERROR 400: Bad request</h1>";
        http_response_code(400);
    } else {
        echo get_planet_by_id($_GET["planetID"]);
    }
