<?php
    require "database.php";

    if(!isset($_POST["planetID"])
        || !isset($_POST["customerName"])
        || !isset($_POST["dateOfJourney"])
        || !isset($_POST["dateOfReturn"])
        || !isset($_POST["from"])
        || !isset($_POST["type"])
        || !isset($_POST["participants"])) {
        http_response_code(400);
        echo "<h1>400 Bad request</h1>";
        echo "<img src='https://http.cat/400'>";
    } else {
        $planets = get_planets();
        print_r($planets);

        $planetID = $_POST["planetID"];
        $customerName = $_POST["customerName"];
        $dateOfJourney = $_POST["dateOfJourney"];
        $dateOfReturn = $_POST["dateOfReturn"];
        $from = $_POST["from"];
        $type = $_POST["type"];
        $participants = $_POST["participants"];

        /*$i = -1;
        do {
            $i++;
        } while($from != $planets[$i]->name);*/

        /*if($dateOfReturn != "") {
            echo "dateOfReturn: $dateOfReturn";
        }*/

        // commented to debug the query generation
        //header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
