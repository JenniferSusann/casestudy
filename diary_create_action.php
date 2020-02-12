<?php session_start(); ?>

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

            //Inputfeld ausgefuellt
            if (!empty($_POST['diary_text'])) {
                //leere Eingabefelder unset
                $kat = array('kat1', 'kat2', 'kat3', 'kat_input1', 'kat_input2', 'kat_input3');
                foreach ($kat as $value) {
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
                    $date_create = $_POST['date_create'];
                    if (isset($_POST['kat1'])) $kat1 = $_POST['kat1'];
                    if (isset($_POST['kat_input1'])) $kat1 = $_POST['kat_input1'];
                    if (isset($_POST['kat2'])) $kat2 = $_POST['kat2'];
                    if (isset($_POST['kat_input2'])) $kat2 = $_POST['kat_input2'];
                    if (isset($_POST['kat3'])) $kat3 = $_POST['kat3'];
                    if (isset($_POST['kat_input3'])) $kat3 = $_POST['kat_input3'];
                    $diary_text = $_POST['diary_text'];
                    
                    if ($kat1 != $kat2 and $kat1 != $kat3 and $kat2 != $kat3) {
//Dies funktioniert noch nicht ganz
                        db_connect();
                        $dbtabelle = "tagebucheintrag";
                                $stmt = $_SESSION['conn']->prepare("INSERT INTO $dbtabelle (bnID, diary_text, kategorieID_1, kategorieID_2, kategorieID_3, datum_eintrag, datum_erstellung)
                                VALUES (:bnID, :diary_text, :kategorieID_1, :kategorieID_2, :kategorieID_3, :datum_eintrag, :wert7)");
                                //$stmt->bindParam(':bnID', $_SESSION['userID']);
                                $stmt->bindParam(':bnID', 1);
                                $stmt->bindParam(':diary_text', $diary_text);
                                /*
                                $stmt->bindParam(':kategorieID_1', $kat1);
                                $stmt->bindParam(':kategorieID_2', $kat2);
                                $stmt->bindParam(':kategorieID_3', $kat3);*/
                                $stmt->bindParam(':kategorieID_1', 1);
                                $stmt->bindParam(':kategorieID_2', 2);
                                $stmt->bindParam(':kategorieID_3', 3);
                                $stmt->bindParam(':datum_eintrag', $create_date);
                                $stmt->bindParam(':datum_erstellung', $date_create);

                                $stmt->execute();
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
    </body>