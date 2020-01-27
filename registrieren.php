<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">      
        <link rel="shortcut icon" href="journal.jpg">
        <title>Tagebuch</title>


    </head>

    <body>
    
    <div class="reglink">
        <form action="registration_action.php" method="post">
            <input type="text" name="nachname" value="" placeholder="Nachname">
            <br>
            <input type="text" name="vorname" value="" placeholder="Vorname">
            <br>
            <input  type="email" name="email" value="" placeholder="E-Mail">
            <br>
            <input type="password" name="password" placeholder="Passwort">
            <br>
            <input type="password" name="password_confirm" placeholder="Passwort bestätigen">
            <p><input type="submit" value="Registrieren"/></p>

    </div>
    </body>
</html>