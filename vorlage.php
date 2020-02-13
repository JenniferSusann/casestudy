<?php
//Include anderer Files
require_once('./funktionen.php');

if (!isset($_SESSION['session_on'])) { 
    ?><script>
        alert("Ihre Sitzung ist abgelaufen");
        window.location = 'login.php';
    </script><?php   
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title>Willkommen</title>
    </head>

    <body>
        <?php
            require_once('./db/db_connection.php'); //File einbinden um Funktionen zu benützen
            header ( 'Location: ./login.php'); //Wechsel zu einem anderen PHP File
            header ('Location: ./login.php?error=true'); //Wechsel zu einem anderen File zusammen mit der Uebergabe einer Error Variable
            $db_conn = db_connect();
                /* Wird in Funktion wie folgt verarbeitet
                    try {
                        $dbconnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpw);
                    } catch (PDOException $e) { 
                        die('Verbindung fehlgeschlagen: ' .$e->get_messagge());
                    }
                    return $dbconnection;
                */
            //In HTML
            onclick="window.location.href='diary_create.php'" //Option fuer Button
        ?>
    </body>
</html>


