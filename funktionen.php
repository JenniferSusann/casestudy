<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>MySql</title>
    </head>
    <body>
        <?php
        //Include anderer Files
        require_once('./db/db_connection.php');

            //Funktion zur erstellung des Dropdownmenue
            function kat_auswahl() {
                //Das Array muss durch die Werte aus der Datenbank ersetzt werden (für jeden Benutzer anderst)
                $arrey = array('Familie', 'Feste', 'Schule'); 
                //Werte fuer Dropdown Menu erstellen
                        echo "<option value=''>Wählen</option>";
                        foreach ($arrey as $value) {
                        echo "<option value='$value'>$value</option>";  
                        }
            }





            ?>
    </body>
</html>
