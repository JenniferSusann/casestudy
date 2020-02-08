<?php 

session_start();

if ($_SESSION['session_on'] == 'TRUE') { 
}

else { 
    /*  
    ?><script>
        alert("Ihre Sitzung ist abgelaufen");
        window.location = 'login.php';
    </script><?php 
    */
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
                <form action="diary_create_action.php" method="POST">
                <ul>
                    <!--Datum auswählen fuer weches man den EIntrag erassen moechte-->
                    <li><p>Datum für den Eintrag: <input type="date" name="create_date" value="<?php echo date('Y-m-d'); ?>"></p></li>
                    <!--Datum an welchem der Eintrag erstellt wurde (Automatisches Datum beim erzeugen des Beitrages)-->
                    <input type="hidden" id="date_create" name="date_create" value="<?php //echo date('Y-m-d'); ?>">

                    <li><p>Kategorien 1:
                        <select name="kategorie1">
                            <option value="">Wählen</option>
                            <option value="kat_familie1">Familie</option>
                            <option value="kat_feste1">Feste</option>
                            <option value="kat_schule1">Schule</option>
                        </select>
                        <input type="text" name="kat_input1" value="" placeholder="Freie Eingabe">
                    </p></li>
                    <li><p>Kategorien 2:
                        <select name="kategorie2">
                        <option value="">Wählen</option>
                            <option value="kat_familie2">Familie</option>
                            <option value="kat_feste2">Feste</option>
                            <option value="kat_schule2">Schule</option>
                        </select>
                        <input type="text" name="kat_input2" value="" placeholder="Freie Eingabe">
                    </p></li>
                    <li><p>Kategorien 3:
                        <select name="kategorie3">
                        <option value="">Wählen</option>
                            <option value="kat_familie3">Familie</option>
                            <option value="kat_feste3">Feste</option>
                            <option value="kat_schule3">Schule</option>
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
    <?php        
            
            
    ?>
    </body>