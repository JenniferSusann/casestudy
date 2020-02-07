<?php session_start(); ?>


<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title></title>
    </head>

    <body>
        <?php
        //session_start();
        require_once('./db/db_connection.php');

        $BN = strtolower($_POST['benutzername']);
        $PW = $_POST['passwort'];
        //PW sollte noch gehashed werden

        if (!empty($BN) && !empty($PW)) { //BN und PW ausgefuellt
            db_connect();            
                $sql = "Select * from benutzer where bn_name = '$BN'";
                foreach($_SESSION['conn']->query($sql) as $row) {
                    $db_bn_name = $row["bn_name"];
                    $db_bn_pw = $row["bn_pw"];
                    $db_bnID = $row["bnID"];
                }

            if ($BN == $db_bn_name && $PW == $db_bn_pw) { //BN und PW stimmen ueberein
                    $_SESSION['session_on'] = "TRUE";
                    $_SESSION['userID'] = $db_bnID;
                header ( 'Location: ./diary_overview.php');
            }
            else {
                header ('Location: ./login.php?zugang_falsch=true'); //BN oder PW falsch
            }
        }

        else {
            header ('Location: ./login.php?error_blank=true'); //BN oder PW nicht ausgefüllt
        }
        
        ?>
    </body>
</html>