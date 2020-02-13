<?php 
session_start(); 
//Include anderer Files
require_once('./funktionen.php');

//Session gestartet
if (!isset($_SESSION['session_on'])) {
    ?><script>
        alert("Ihre Sitzung ist abgelaufen");
        window.location = 'login.php';
    </script><?php 
}


//Error Meldungen
if (isset($_GET['error_blank'])) //nicht alle Felder ausgefuellt
{
    $error_text = '<h1 class="error">Bitte alle Pflichfelder ausfüllen!</h1>';
    unset ($error_blank);
}

elseif (isset($_GET['error_text_blank'])) //Tagebucheintrag Text leer
{
    $error_text = '<h1 class="error">Bitte einen Tagebuch Text eintragen!</h1>';
    unset ($error_blank);
}

elseif (isset($_GET['error_kat'])) //Kategorienwahl falsch
{
    $error_text = '<h1 class="error">Bitte pro Kategorie nur einen Wert wählen!</h1>';
    unset ($error_kat);
}

else {
    $error_text = '';
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title>Erfassung</title>
    </head>

    <body>
        <div class="fulldiary">
            <h2>Tagebucheintrag erfassen</h2>
            <div class="diary-body">
            <div class="input_form">
            <div class="error"><?=$error_text?></div>
                <form action="diary_create_action.php" method="POST">
                <ul>
                    <!--Datum auswählen fuer weches man den EIntrag erassen moechte-->
                    <li><p>Datum für den Eintrag: <input type="date" name="create_date" value="<?php echo date('Y-m-d'); ?>"></p></li>
                    
                    <!--Die Auswahlmoeglichkeiten fuer die Kategorien sollen aus der DB ausgelesen werden können und dann Dinamisch eingefuegt werden
                    Die Kategorien werden dann auch in die DB geschrieben, es gibt Kat fuer alle und Benutzerdefinierte, loeschen kann man diese nicht, 
                    sondern muss den Eintrag Kat anpassen uns somit ist die Kat dann weg.-->

                    <li><p>Kategorien 1:
                        <select name="kat1">
                            <?php kat_auswahl(); ?>
                        </select>
                        <input type="text" name="kat_input1" value="" placeholder="Freie Eingabe">
                    </p></li>
                    <li><p>Kategorien 2:
                        <select name="kat2">
                            <?php kat_auswahl(); ?>
                        </select>
                        <input type="text" name="kat_input2" value="" placeholder="Freie Eingabe">
                    </p></li>
                    <li><p>Kategorien 3:
                        <select name="kat3">
                            <?php kat_auswahl(); ?>
                        </select>
                        <input type="text" name="kat_input3" value="" placeholder="Freie Eingabe">
                    </p></li>
                    <textarea name="diary_text" cols="50" rows="10" maxlength="1500" placeholder="Bitte hier Ihren Tagebucheintrag erfassen..."></textarea>
                    <p>Datei wählen: <input type="file" name="myfile"><br></p>
                
                    <input type="submit" value="Speichern">
                    <!-- <input type="reset" value="Reset"/> -->
                    <input type="button" value="Abbrechen" onclick="window.location.href='diary_overview.php'">
                </ul>   
                </form>
            </div>  
            </div>
        </div>
    </body>