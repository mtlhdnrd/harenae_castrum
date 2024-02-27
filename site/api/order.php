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
        $planetID = $_POST["planetID"];
        $customerName = $_POST["customerName"];
        $dateOfJourney = $_POST["dateOfJourney"];
        $dateOfReturn = $_POST["dateOfReturn"];
        $from = $_POST["from"];
        $type = $_POST["type"];
        $participants = $_POST["participants"];

        // build query
        // should probably move this to a function in database.php and just pass the data as parameters
        // TODO: unfuck this abomination so it's not retarded
        $sql = 'INSERT INTO journeys VALUES ("'.(new DateTime())->format("Y-m-d").'", "1", "'.escape_string($dateOfJourney).'", "4");';
        echo $sql;

        // commented to debug the query generation
        //header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
