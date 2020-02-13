<?php
//Include anderer Files
require_once('./db/db_connection.php');

    //Funktion zur erstellung des Dropdownmenue
    function kat_auswahl() {
        //Das Array muss durch die Werte aus der Datenbank ersetzt werden (für jeden Benutzer anderst)
        //$arrey = array('Familie', 'Feste', 'Schule'); 
        $arrey = $_SESSION['bn_kat']; 
        //Werte fuer Dropdown Menu erstellen
                echo "<option value=''>Wählen</option>";
                foreach ($arrey as $value) {
                echo "<option value='$value'>$value</option>";  
                }
    }


    function kat_ermitteln() {
        $db_conn = db_connect();
        $userID = $_SESSION['userID'];
            $sql = "Select * from kategorie where bnID = $userID or bnID = 0";
            foreach($db_conn->query($sql) as $row) {
                $bn_kat[] = $row['beschreibung'];
            }
            var_dump($bn_kat);
            $_SESSION['bn_kat'] = $bn_kat;
        db_close();
    }


?>
