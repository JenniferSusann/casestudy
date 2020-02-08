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
            //Include anderer Files
            require_once('./db/db_connection.php');
/*
            //Inputfeld ausgefuellt
            if (!empty($_POST['diary_text'])) {
            //if ($_POST['diary_text'] != "") {
                echo "Tagebucheintragstext vorhanden";
            }

            else {
                echo "keinen Tagebuchtext vorhanden";
            }
            
            */
            //leere Eingabefelder unset
            $kat = array('kategorie1', 'kategorie2', 'kategorie3', 'kat_input1', 'kat_input2', 'kat_input3');
            foreach ($kat as $value) {
                if ($_POST["$value"] == '') {
                    unset($_POST["$value"]);

                } 
                
            }

            //Nur Auswahl oder Dropdown gewaehlt
            if (
                (isset($_POST['kategorie3']) xor isset($_POST['kat_input3'])) and
                (isset($_POST['kategorie1']) xor isset($_POST['kat_input1'])) and 
                (isset($_POST['kategorie2']) xor isset($_POST['kat_input2']))
               ) {
                    //echo "Alles gut";
                

                //daten einfügen
                $create_date = $_POST['create_date'];
                $date_create = $_POST['date_create'];
                $kat1 = $_POST['kategorie1'];
                $kat1 = $_POST['kat_input1'];
                $kat2 = $_POST['kategorie2'];
                $kat2 = $_POST['kat_input2'];
                $kat3 = $_POST['kategorie3'];
                $kat3 = $_POST['kat_input3'];
                $diary_text = $_POST['diary_text'];
                
                db_connect();
//DB noch anpassen auf diary_text
                $dbtabelle = "tagebucheintrag";
                        $stmt = $_SESSION['conn']->prepare("INSERT INTO $dbtabelle (bnID, diary_text, kategorieID_1, kategorieID_2, kategorieID_3, datum_eintrag, datum_erstellung)
                        VALUES (:wert1, :wert2, :wert3, :wert4, :wert5, :wert6, :wert7)");
                        $stmt->bindParam(':wert1', $_SESSION['userID']);
                        $stmt->bindParam(':wert2', $diary_text);
                        $stmt->bindParam(':wert3', $kat1);
                        $stmt->bindParam(':wert4', $kat2);
                        $stmt->bindParam(':wert5', $kat3);
                        $stmt->bindParam(':wert6', $create_date);
                        $stmt->bindParam(':wert7', $date_create);

                        $stmt->execute();
                        db_close();

                        ?><script>
                        alert("Eintrag war erfolgreich!");
                        window.location = 'diary_overview.php';
                    </script><?php
                      
           }
            
            else {
                echo "Nicht alles korrekt ausgefüllt";
            }
            
        ?>
    </body>