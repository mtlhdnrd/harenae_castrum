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

        function __construct($ID, $name, $image, $description, $hostility, $landable, $price, $infopanel) {
            $this->ID = $ID;
            $this->name = $name;
            $this->image = $image;
            $this->description = $description;
            $this->hostility = $hostility;
            $this->landable = $landable;
            $this->price = $price;
            $this->infopanel = $infopanel;
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
        $query = "SELECT `ID`, `name`, `image`, `description`, `hostility`, `landable`, `price`, `infopanel` FROM planet;";
        $result = $GLOBALS["conn"]->query($query);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push(
                    $planets,
                    new Planet($row["ID"], $row["name"], $row["image"], $row["description"], $row["hostility"], $row["landable"], $row["price"], $row["infopanel"])
                );
            }
        }

        return json_encode($planets);
    }

    function escape_string($s) {
        return $GLOBALS["conn"]->real_escape_string($s);
    }

    // TODO: make this work and move the garbage from order.php here
    function record_journey($customerName, $dateOfJourney, $from, $to, $type, $participants) {
        $planetquery = "SELECT hostility, landable FROM planet WHERE planet.ID = \"".escape_string($to)."\";";
        $GLOBALS["conn"]->query($planetquery);

        // i am way too tired
        $date_recorded = (new DateTime())->format("Y-m-d");
        $active = 1;
        //$price = calculate_price();
        $query = 'INSERT INTO journey VALUES ("'.$date_recorded.'", "1", "'.escape_string($dateOfJourney).'", "4");';
    }

    function record_return_journey($customerName, $dateOfJourney, $from, $to, $type, $participants, $dateOfReturn) {
        record_journey($customerName, $dateOfJourney, $from, $to, $type, $participants);
        record_journey($customerName, $dateOfReturn, $to, $from, $type, $participants);
    }
