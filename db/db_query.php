
<?php
//wird zurzeit nicht benötigt

/*
function check_login() {
    //daten aus DB auslesen
    $tabelle = array('benutzer', 'kategorie', 'tagebucheintrag');

    foreach($tabelle as $value) {
    //$sql = "Select * from $value";
    echo "$value: <br>";
    switch ($value) { //Verzweigung nach Farbe
        case "benutzer":
            $sql = "Select * from $value";
                foreach($conn->query($sql) as $row) {
                    echo "BN:". $row["bn_name"] ." ";
                    echo "PW:". $row["bn_pw"] ."<br>";
                }
            echo "<br>";
            break;

        case "kategorie":
            $sql = "Select * from $value";
                foreach($conn->query($sql) as $row) {
                    echo $row["beschreibung"] ."<br>";
                }
            echo "<br>";
            break;

        case "tagebucheintrag":
            $sql = "Select * from $value";
                foreach($conn->query($sql) as $row) {
                    echo $row["bnID"] ."<br>";
                    echo $row["kategorieID_1"] ."<br>";
                    echo $row["kategorieID_2"] ."<br>";
                    echo $row["kategorieID_3"] ."<br>";
                    echo $row["datum_eintrag"] ."<br>";
                    echo $row["datum_erstellung"] ."<br>";
                }
            echo "<br>";
            break;
        
        default:
            echo "Es ist ein Fehler aufgetreten";
            break;
    }
    }
}

    //daten aus DB auslesen
    $tabelle = array('benutzer', 'kategorie', 'tagebucheintrag');

    foreach($tabelle as $value) {
    //$sql = "Select * from $value";
    echo "$value: <br>";
    switch ($value) { //Verzweigung nach Farbe
        case "benutzer":
            $sql = "Select * from $value";
                foreach($conn->query($sql) as $row) {
                    echo "Vor:". $row["vorname"] ."<br>";
                    echo "Nach:". $row["nachname"] ."<br>";
                    echo "BN:". $row["bn_name"] ." ";
                    echo "PW:". $row["bn_pw"] ."<br>";
                    echo "Mail:". $row["email"] ."<br>";
                    echo "<br>";
                }
            echo "<br>";
            break;

        case "kategorie":
            $sql = "Select * from $value";
                foreach($conn->query($sql) as $row) {
                    echo $row["beschreibung"] ."<br>";
                }
            echo "<br>";
            break;

        case "tagebucheintrag":
            $sql = "Select * from $value";
                foreach($conn->query($sql) as $row) {
                    echo $row["bnID"] ."<br>";
                    echo $row["kategorieID_1"] ."<br>";
                    echo $row["kategorieID_2"] ."<br>";
                    echo $row["kategorieID_3"] ."<br>";
                    echo $row["datum_eintrag"] ."<br>";
                    echo $row["datum_erstellung"] ."<br>";
                }
            echo "<br>";
            break;
        
        default:
            echo "Es ist ein Fehler aufgetreten";
            break;
    }
    }
*/
?>