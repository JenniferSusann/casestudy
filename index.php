<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="Bilder\journal.jpg">
        <title>Tagebuch</title>


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
                <div class="loginlink">  
                    <p><h2>Anmelden</h2>    
                    <form action="login.php" method="POST">    
                            <input type="text" name="benutzername" value="" placeholder="Benutzername">
                            <br>
                            <input type="password" name="passwort" placeholder="Passwort">
                            <br>
                            <input type="submit" value="Einloggen">
                    </form>  
                    </p>  
                </div>
                
                <br><br>   
                    <a href="registrieren.php">Registrieren</a>
            </div>
            
            

            <!--Menue für ?-->
                <nav class= "menu">
                    <ul>
                        <li>Hallo Velo</li>
                    </ul> 
                </nav>  
        </div>
    </body>
</html>


