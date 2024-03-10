<?php
    class Planet {
        public $ID;
        public $name;
        public $image;
        public $description;
        public $hostility;
        public $landable;
        public $price;
        public $infopanel;
        public $wideimage;

        function __construct($ID, $name, $image, $description, $hostility, $landable, $price, $infopanel, $wideimage) {
            $this->ID = $ID;
            $this->name = $name;
            $this->image = $image;
            $this->description = $description;
            $this->hostility = $hostility;
            $this->landable = $landable;
            $this->price = $price;
            $this->infopanel = $infopanel;
            $this->wideimage = $wideimage;
        }
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "harenae_castrum";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("ERROR: failed connecting to database. Reason: ".$conn->connect_error);
    }

    function get_planets() {
        $planets = array();
        $query = "SELECT `ID`, `name`, `image`, `description`, `hostility`, `landable`, `price`, `infopanel`, `wideimage` FROM planet ORDER BY planet.name;";
        $result = $GLOBALS["conn"]->query($query);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push(
                    $planets,
                    new Planet($row["ID"], $row["name"], $row["image"], $row["description"], $row["hostility"], $row["landable"], $row["price"], $row["infopanel"], $row["wideimage"])
                );
            }
        }

        return json_encode($planets);
    }

    function get_planet_id_by_name($name) {
        $query = "SELECT ID FROM planet WHERE planet.name = '".escape_string($name)."';";
        $result = $GLOBALS["conn"]->query($query);

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["ID"];
        } else {
            echo "<h1>FATAL: planet not found</h1>";
            http_response_code(400);
        }
    }

    function get_planet_by_id($id) {
        $query = "SELECT `name`, `image`, `description`, `hostility`, `landable`, `price`, `infopanel`, `wideimage` FROM planet WHERE ID = "
            .escape_string($id).";";
        // query planet, return json
        $result = $GLOBALS["conn"]->query($query);

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return json_encode($row);
        } else {
            echo "<h1>ERROR: planet not found</h1>";
            http_response_code(400);
        }

    }

    function escape_string($s) {
        return $GLOBALS["conn"]->real_escape_string($s);
    }

    function get_customer_id_by_name($customerName) {
        $query = "SELECT `ID` FROM customer WHERE customer.name = '".escape_string($customerName)."';";
        $result = $GLOBALS["conn"]->query($query);

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["ID"];
        } else {
            echo "<h1>FATAL: customer not found</h1>";
            http_response_code(400);
        }
    }

    // TODO: make this work and move the garbage from order.php here
    // way too much trust in the user, price should be recalculated here
    function record_journey($customerName, $dateOfJourney, $from, $to, $participants, $price) {
        $date_recorded = date("Y-m-d");
        $query = 'INSERT INTO journey (`date_recorded`, `date_of_journey`, `price`, `number_of_passangers`, `from`, `to`, `customer`) VALUES ("'
            .$date_recorded.'", "'
            .escape_string($dateOfJourney).'", "'
            .$price.'", "'
            .$participants.'", "'
            .$from.'", "'
            .$to.'", "'
            .$customerName.'");';

        $result = $GLOBALS["conn"]->query($query);
        return $result;
    }

    // bit of a monkey solution but it kinda works
    // price system should definitely be fixed tho. return shouldn't just double it, and this distribution is idiotic
    function record_return_journey($customerName, $dateOfJourney, $from, $to, $participants, $price, $dateOfReturn) {
        record_journey($customerName, $dateOfJourney, $from, $to, $participants, $price / 2);
        record_journey($customerName, $dateOfReturn, $to, $from, $participants, $price / 2);
    }
