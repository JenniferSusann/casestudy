<?php
session_start(); 
//Include anderer Files
require_once('./funktionen.php');
    
    //Abfrage wie weiter
    if (isset($_POST['new_diary'])) {
        header ( 'Location: ./diary_create.php');
    }
    elseif (isset($_POST['logout'])) {
        session_destroy();
        unset($_SESSION);
        ?><script>
            alert("Sie wurden erfolgreich abgemeldet");
            window.location = 'login.php';
        </script><?php
    }

    elseif (isset($_POST['filter'])) {
        $_SESSION['kat_filter'] = $_POST['kat_filter'];
        header ( 'Location: ./diary_display.php');
    }

    else {
        header ( 'Location: ./diary_overview.php');
    }                      
?>