<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Vorlage MySql</title>
    </head>
    <body>
        <?php

        $dbhost = "127.0.0.1";
        $dbname = "casestudy1";
        $dbuser = "casestudy";
        $dbpw = "casestudy";
        
        //verbindugsaufbau
        try {
            $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpw);
        } catch (PDOException $e){
            echo 'Verbindung fehlgeschlagen: ' .$e->get_messagge();
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
/*
            $sql = "Select * from $value";
            foreach($conn->query($sql) as $row) {
                echo $row["bn_name"] ."<br>";
                echo $row["bn_pw"] ."<br>";
            }
         }


/*
         <h2>Mehrdimensionale Array</h2>
        <p>
            <?php //Mehrdimensionale Array
                $car = array
                    (
                        array("Volvo", 22, 18),
                        array("BMW", 15, 13),
                        array("Saab", 5, 2),
                        array("Land Rover", 17, 15),
                    );
                //Volvo: In Stock: 22, sold: 18
                echo $car [0] [0]. ": In Stock: ".$car [0] [1].", sold: ".$car [0] [2] ."<br>";
                echo $car [1] [0]. ": In Stock: ".$car [1] [1].", sold: ".$car [1] [2];
            ?>
        </p>

/*
         //daten vorbereiten und verknüpfen
         $stmt = $conn->prepar("INSERT INTO $dbname (wert1, wert2, wert3)
         VALUES (:wert_1, :wert_2, :wert_3)");
         $stmt->bindParam(':wert_1', $wert1);
         $stmt->bindParam(':wert_2', $wert2);
         $stmt->bindParam(':wert_3', $wert3);

         //daten einfügen
         $wert1 = "Dies ist Wert 1";
         $wert2 = "Dies ist Wert 2";
         $wert3 = "Dies ist Wert 3";
         $stmt->execute();
         
         //verbindung schliessen
         $conn = null;
*/
        ?>
    </body>
</html>