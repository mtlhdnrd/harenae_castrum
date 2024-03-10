<?php
    require_once "database.php";

    if(!isset($_POST["planetID"])
        || !isset($_POST["name"])
        || !isset($_POST["date"])
        || !isset($_POST["return_date"])
        || !isset($_POST["from"])
        || !isset($_POST["participants"])
        || !isset($_POST["price"])) {
        echo "<h1>400 Bad request</h1>";
        echo "<img src='https://http.cat/400'>";
        http_response_code(400);
    } else {
        $planets = get_planets();

        $planetID = $_POST["planetID"];
        $customerName = $_POST["name"];
        $dateOfJourney = $_POST["date"];
        $dateOfReturn = $_POST["return_date"];
        $from = $_POST["from"];
        $participants = $_POST["participants"];
        $price = $_POST["price"];

        $customerID = get_customer_id_by_name($customerName);
        $fromID = get_planet_id_by_name($from);

        if($dateOfReturn == "") {
            echo record_journey($customerID, $dateOfJourney, $fromID, $planetID, $participants, $price);
        } else {
            echo record_return_journey($customerID, $dateOfJourney, $fromID, $planetID, $participants, $price, $dateOfReturn);
        }

        // commented to debug the query generation
        //header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
