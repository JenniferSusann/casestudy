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
        <title>Dein Tagebuch</title>
    </head>

    <body>
        <div class="fulldiary">
            <h2>Tagebuch Übersicht</h2>
            <div class="diary-body">
            <div class="input_form">
                <form action="diary_overview_action.php" method="POST">
                   
                    <input type="submit" name="logout" value="Abmelden">
                    <input type="submit" name="new_diary" value="Neuer Beitrag erstellen">
                </form>
            </div>  
            </div>
        </div>
        <?php     
                    
        ?>
    </body>