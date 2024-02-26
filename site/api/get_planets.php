<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "harenae_castrum";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
        die("ERROR: failed connecting to database. Reason: ".$conn->connect_error);
    } else {
        $query = "SELECT `ID`, `name`, `image`, `description`, `hostility`, `landable` FROM planet;";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "ID: ".$row["ID"]." - name: ".$row["name"]."<br>";
            }
            echo $_SERVER["HTTP_REFERER"];
        } else {
            echo "0 results";
        }
        $conn->close();
    }
?>
