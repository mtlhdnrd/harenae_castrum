<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mockup API test page</title>
    </head>
    <body>
        <h1 style="color: #FF0000;">DELETE BEFORE PRODUCTION RELEASE</h1>
        <form action="./order.php" method="post">
            <label for="customerName">Buyer's name</label>
            <input type="text" name="customerName" required><br>
            <label for="dateOfJourney">When (go)</label>
            <input type="date" name="dateOfJourney" required><br>
            <label for="dateOfReturn">When (return)</label>
            <input type="date" name="dateOfReturn"><br>
            <label for="from">From where</label>
            <input type="text" name="from" required><br>
            <label for="participants">Participants</label>
            <input type="number" name="participants" required><br>
            <input type="hidden" value="1" name="planetID">
            <input type="submit" value="Submit">
        </form>
        <?php
            if(http_response_code() == 400) {
                echo "<h1>400 Bad request</h1><br>";
            }
        ?>
    </body>
</html>
