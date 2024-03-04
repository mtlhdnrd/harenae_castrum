<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Setup database</title>
    </head>
    <body>
        <style>
            body {
                background-color: #333333;
                color: #cccccc;
            }

            h1 {
                color: #ff0000;
                text-align: center;
            }

            input {
                color-scheme: dark;
            }

            code {
                border: 2px solid #666;
                border-radius: 3px;
                padding: 2px 5px;
            }
        </style>
        <h1>WARNING: running this deletes the current database in its entireity</h1>
        <h2>
            Please copy the <code>harenae_castrum.sql</code> file in the <code>site/api/</code> directory
            and type "Yes, do as I say!" in the text input below if you really wish to do this.
        </h2>
        <form method="post">
            <input type="text" name="confirmation">
            <input type="submit" value="Setup database">
        </form>
        <?php
            require_once "database.php";
            if(isset($_POST["confirmation"]) && file_exists("./harenae_castrum.sql")) {
                if($_POST["confirmation"] == "Yes, do as I say!") {
                    $conn = $GLOBALS["conn"];
                    ob_start();
                    include "./harenae_castrum.sql";
                    $query = "DROP DATABASE harenae_castrum; ".ob_get_clean();
                    echo $query;
                    $conn->query($query);
                    $_POST = array();
                }
            }
        ?>
    </body>
</html>
