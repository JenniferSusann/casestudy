<?php 
session_start(); 
//Include anderer Files
require_once('./funktionen.php');

    //Inputfeld ausgefuellt
    if (!empty($_POST['diary_text'])) {
        //leere Eingabefelder unset
        $kat_form = array('kat1', 'kat2', 'kat3', 'kat_input1', 'kat_input2', 'kat_input3');
        foreach ($kat_form as $value) {
            if ($_POST["$value"] == '') {
                unset($_POST["$value"]);
            }
        }

        //Nur Auswahl oder Dropdown gewaehlt
        if (                   
            //Nicht (a und b) (NAND)
            !(isset($_POST['kat1']) and isset($_POST['kat_input1'])) and 
            !(isset($_POST['kat2']) and isset($_POST['kat_input2'])) and
            !(isset($_POST['kat3']) and isset($_POST['kat_input3']))
        ) {
                                
            //daten einfügen
            $create_date = $_POST['create_date'];
            //Datum an welchem der Eintrag erstellt wurde (Automatisches Datum beim erzeugen des Beitrages)
            $date_create = $_SESSION['date_today'];

            if (isset($_POST['kat1'])) $kat1 = $_POST['kat1'];
            if (isset($_POST['kat_input1'])) $kat1 = $_POST['kat_input1'];
            if (isset($_POST['kat2'])) $kat2 = $_POST['kat2'];
            if (isset($_POST['kat_input2'])) $kat2 = $_POST['kat_input2'];
            if (isset($_POST['kat3'])) $kat3 = $_POST['kat3'];
            if (isset($_POST['kat_input3'])) $kat3 = $_POST['kat_input3'];
            $diary_text = $_POST['diary_text'];
            $userID = $_SESSION['userID'];
            
            if ($kat1 != $kat2 and $kat1 != $kat3 and $kat2 != $kat3) {

                //Kategorien in DB einfügen falls nicht vorhanden
                //Anpassen damit keine Beschreibungen von BN 0 gemacht werden koennen
                $db_conn = db_connect();
                $dbtabelle = "kategorie";
                    $kat_fill = array($kat1, $kat2, $kat3);
                    foreach ($kat_fill as $value) {
                        $stmt = $db_conn->prepare("INSERT INTO $dbtabelle (bnID, beschreibung)
                            VALUES (:bnID, :beschreibung)");
                            $stmt->bindParam(':bnID', $userID);
                            $stmt->bindParam(':beschreibung', $value);
                            $stmt->execute();
                    }
                    unset($dbtabelle);

                    //Tabebucheintrag einfuegen
                    $dbtabelle = "tagebucheintrag";
                    $stmt = $db_conn->prepare("INSERT INTO $dbtabelle (bnID, diary_text, kategorieID_1, kategorieID_2, kategorieID_3, datum_eintrag, datum_erstellung)
                            VALUES (:abnID, 
                                    :adiary_text, 
                                    (select kategorieID from kategorie where beschreibung = :akategorieID_1 LIMIT 1), 
                                    (select kategorieID from kategorie where beschreibung = :akategorieID_2 LIMIT 1), 
                                    (select kategorieID from kategorie where beschreibung = :akategorieID_3 LIMIT 1), 
                                    :adatum_eintrag, 
                                    :adatum_erstellung)");
                            $stmt->bindParam(':abnID', $userID);
                            $stmt->bindParam(':adiary_text', $diary_text);
                            $stmt->bindParam(':akategorieID_1', $kat1);
                            $stmt->bindParam(':akategorieID_2', $kat2);
                            $stmt->bindParam(':akategorieID_3', $kat3);
                            $stmt->bindParam(':adatum_eintrag', $create_date);
                            $stmt->bindParam(':adatum_erstellung', $date_create);
                            
                            $stmt->execute();
                            unset($dbtabelle);
                            db_close();

                            ?><script>
                            alert("Eintrag war erfolgreich!");
                            window.location = 'diary_overview.php';
                        </script><?php
            }
            else {
                header ('Location: ./diary_create.php?error_kat=true'); //input oder dropdown mehrmals gewaehlt
            }
        }
        else {
            header ('Location: ./diary_create.php?error_kat=true'); //input und dorpdown für Kat
        }
                
    }
    else {
        header ('Location: ./diary_create.php?error_text_blank=true'); //Tagebucheintrag Text ist leer
    } 
?>
