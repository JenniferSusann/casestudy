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
    <div class="fulldiary">
    <h2>Registration</h2>
    <div class="input_form">
        <form action="register_action.php" method="post"> 
        <ul>
            <li><input type="text" name="nachname" value="" placeholder="Nachname"> </li>
            <li><input type="text" name="vorname" value="" placeholder="Vorname"></li>
            <li><input type="text" name="benutzername" value="" placeholder="Benutzername"></li>
            <li><input type="email" name="email" value="" placeholder="E-Mail"></li> 
            <li><input type="password" name="password" placeholder="Passwort"></li>
            <li><input type="password" name="password_confirm" placeholder="Passwort bestätigen"></li>
        
            <input type="submit" value="Registrieren">
            <!-- <input type="reset" value="Reset"/> -->
            <input type="button" value="Abbrechen" onclick="window.location.href='login.php'">
        </ul>        
    
    </div>
    </div>
    </body>
</html>