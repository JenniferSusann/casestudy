<?php
session_start(); 
//Include anderer Files
require_once('./funktionen.php');
    
    //Abfrage wie weiter
    //Neuer Beitrag
    if (isset($_POST['new_diary'])) {
        header ( 'Location: ./diary_create.php');
    }
    //Logout
    elseif (isset($_POST['logout'])) {
        session_destroy();
        unset($_SESSION);
        ?><script>
            alert("Sie wurden erfolgreich abgemeldet");
            window.location = 'login.php';
        </script><?php
    }
    //Eintraege filtern und anzeigen
    elseif (isset($_POST['filter'])) {
        if ($_POST['kat_filter'] == '') { //Filer steht auf Waehlen
            unset($_SESSION['kat_filter']);
        }
        else { //Filter ist ausgefuellt
            $_SESSION['kat_filter'] = $_POST['kat_filter']; 
        }
        header ( 'Location: ./diary_display.php');
    }

    //auf Seite bleiben
    else {
        header ( 'Location: ./diary_overview.php');
    }                      
?>