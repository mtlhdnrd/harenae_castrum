<?php
    class Planet {
        public $ID;
        public $name;
        public $image;
        public $description;
        public $hostility;
        public $landable;

        function __construct($ID, $name, $image, $description, $hostility, $landable) {
            $this->ID = $ID;
            $this->name = $name;
            $this->image = $image;
            $this->description = $description;
            $this->hostility = $hostility;
            $this->landable = $landable;
        }
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "harenae_castrum";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("ERROR: failed connecting to database. Reason: ".$conn->connect_error);
    } else {
    }

    function get_planets() {
        $planets = array();
        $query = "SELECT `ID`, `name`, `image`, `description`, `hostility`, `landable` FROM planet;";
        $result = $GLOBALS["conn"]->query($query);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push(
                    $planets,
                    new Planet($row["ID"], $row["name"], $row["image"], $row["description"], $row["hostility"], $row["landable"])
                );
            }
        }

        return json_encode($planets);
    }