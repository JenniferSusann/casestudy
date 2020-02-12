<?php 
session_start();
require_once('./funktionen.php');
//voruebergehend
//$_SESSION['session_on'] = TRUE;
//Session gestartet
/*
if (!isset($_SESSION['session_on'])) {
    ?><script>
        alert("Ihre Sitzung ist abgelaufen");
        window.location = 'login.php';
    </script><?php 
}*/
?>

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
        <div class="fulldiary">
            <h2>Tagebuch Übersicht</h2>
            <div class="diary-body">
            <div class="input_form">
            <!--falls geburtstag dann eine Meldung anzeigen-->

            <!--Bestehende Einträge anzeigen-->
            <!--Filtermöglichkeiten(Datum zwischen/Kategorie)-->
            <form action="diary_create_action.php" method="POST">
                <ul>
                    <!--Datumsbereich auswählen fuer welchen man filten moechte-->
                    <li><p>Suche Einträge zwischen dem <input type="date" name="create_date" value="<?php echo date('Y-m-d'); ?>"> 
                    und dem <input type="date" name="create_date" value="<?php echo date('Y-m-d'); ?>"></p></li>

                    <li><p>Kategorie:
                        <select name="kat_filter">
                            <?php kat_auswahl(); ?>
                        </select>
                    </p></li>
                    
                
                    <input type="submit" value="Nach Einträgen suchen">
                    <input type="reset" value="Filter reseten"/>
                </ul>   
                </form>
                <!--Button neuer Eintrag erfassen oder Logout-->
                <form action="diary_overview_action.php" method="POST">
                   
                    <input type="submit" name="logout" value="Abmelden">
                    <input type="submit" name="new_diary" value="Neuer Beitrag erstellen">
                </form>
            </div>  
            </div>
        </div>
    </body>