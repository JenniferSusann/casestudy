<?php 
if ($_SESSION['session_on'] == TRUE) {    
}

else {
    ?><script>
        alert("Ihre Sitzung ist abgelaufen");
        window.location = 'login.php';
    </script><?php
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title>Willkommen</title>
    </head>

    <body>
        <?php
            require_once('./db/db_connection.php'); //File einbinden um Funktionen zu benützen
            header ( 'Location: ./login.php'); //Wechsel zu einem anderen PHP File
            header ('Location: ./login.php?error=true'); //Wechsel zu einem anderen File zusammen mit der Uebergabe einer Error Variable
            onclick="window.location.href='diary_create.php'" //Option fuer Button
        ?>
    </body>
</html>


