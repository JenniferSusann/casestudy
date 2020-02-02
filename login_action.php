<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title>Dein Tagebuch</title>
    </head>

    <body>
        <?php
        session_start();
        require_once('./db/db_connection.php');

        $BN = strtolower($_POST['benutzername']);
        $PW = $_POST['passwort'];

        if ($BN != "" && $PW != "") { //BN und PW ausgefuellt
            db_connect();
                        
            $sql = "Select * from benutzer where bn_name = '$BN'";
            foreach($_SESSION['conn']->query($sql) as $row) {
                $bn_name = $row["bn_name"];
                $bn_pw = $row["bn_pw"];
            }

            if ($BN == $bn_name && $PW == $bn_pw) { //BN und PW stimmen ueberein
                    $_SESSION['session_on'] = "TRUE";
                header ( 'Location: ./diary_overview.php');
            }
            else {
                header ('Location: ./login.php?zugang_falsch=true'); //BN oder PW falsch
            }
        }

        else {
            header ('Location: ./login.php?error_login=true'); //BN oder PW nicht ausgefüllt
        }
        
        ?>
    </body>
</html>