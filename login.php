<?php 

if ($_GET['error_login'] == TRUE) 
{
    $error_text = '<h1 class="error">Bitte Benutername und Passwort erneut ausfüllen!</h1>';
    unset ($error_login);
}

elseif ($_GET['zugang_falsch'] == TRUE) 
{
    unset ($zugang_falsch);
    $error_text = '<h1 class="error">Bitte Benutername und Passwort prüfen!</h1>';
}
else {}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="/bilder/favicon.ico">
        <title>Willkommen</title>
    </head>

    <body>
        <div class="fulldiary">
            <div class="diary-body">
            
                <div class="willkommen">
                <h1>Willkommen zu deinem online Tagebuch<br></h1>
                </div>
            
                <div class="first_text">   
                    <p>Hier kannst du dir dein eigenes online Tagebuch erstellen.<br>
                    Wir wünsche dir viel spass beim erstellen von Einträgen.</p>
                </div> 
                <div>  
                    <h2>Anmelden</h2>  
                    <div class="error"><?=$error_text?></div>
                    <div class="input_form">
                    <form action="login_action.php" method="POST">
                            <input type="text" name="benutzername" value="" placeholder="Benutzername">
                            <br>
                            <input type="password" name="passwort" placeholder="Passwort">
                            <br>
                            <input type="submit" value="Einloggen">
                    </form>
                    </div>  
                </div>
                
                <br><br>   
                    <a href="register.php">Registrieren</a>
            </div>
            
            <!--Menue für ?-->
            <!--
                <nav class= "menu">
                    <ul>
                        <li>Hallo Velo</li>
                    </ul> 
                </nav> 
            --> 
        </div>
    </body>
</html>


