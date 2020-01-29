<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">      
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title>Tagebuch</title>


    </head>

    <body>
    <div class="input_form">
        <form action="register_action.php" method="post">     
                <input type="text" name="nachname" value="" placeholder="Nachname">
                <br>
                <input type="text" name="vorname" value="" placeholder="Vorname">
                <br>
                <input  type="email" name="email" value="" placeholder="E-Mail">
                <br>
                <input type="password" name="password" placeholder="Passwort">
                <br>
                <input type="password" name="password_confirm" placeholder="Passwort bestätigen">
                <br>
                <input type="submit" value="Registrieren"/>  
    </div>
    </body>
</html>