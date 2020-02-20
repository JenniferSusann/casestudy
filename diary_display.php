<?php
session_start(); 
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
        <link rel="shortcut icon" href="./bilder/favicon.ico">
        <title>Erfassung</title>
    </head>

    <body>
        <div class="fulldiary">
            <h2>Tagebucheintrag erfassen</h2>
            <div class="diary-body">
                <div class="table">
                    <?php
                        //Filtern der Eintraege und anzeigen
                        diary_filter(); //File Funktionen
                    ?>
            </div>
            </div>
        </div>
    </body>



