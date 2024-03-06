<?php
    require_once "database.php";

    if(!isset($_POST["planetID"])
        || !isset($_POST["name"])
        || !isset($_POST["date"])
        || !isset($_POST["return_date"])
        || !isset($_POST["from"])
        || !isset($_POST["participants"])) {
        echo "<h1>400 Bad request</h1>";
        echo "<img src='https://http.cat/400'>";
        http_response_code(400);
    } else {
        $planets = get_planets();
        print_r($planets);

        $planetID = $_POST["planetID"];
        $customerName = $_POST["name"];
        $dateOfJourney = $_POST["date"];
        $dateOfReturn = $_POST["return_date"];
        $from = $_POST["from"];
        $participants = $_POST["participants"];

        $fromID = get_planet_id_by_name($from);
        echo $fromID."<br>";

        echo get_planet_by_id($fromID)."<br>";

        // commented to debug the query generation
        //header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
