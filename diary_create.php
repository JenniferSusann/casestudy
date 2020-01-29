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
            echo "<h1>Sie wurden erfolgreich eingeloggt!</h1>";
            echo "BN:" .$_POST['benutzername'];
            echo "<br>";
            echo "PW:" .$_POST['passwort'];
            }
        ?>
    </body>