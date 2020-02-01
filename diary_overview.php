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
            
                <form action="diary_overview.php" method="POST">
                   
                    <input type="button" name="logout" value="Abmelden" onclick="window.location.href='diary_overview_action.php'">
                    <input type="button" name="new_diary" value="Neuer Beitrag erstellen" onclick="window.location.href='diary_create.php'">
                </form>
                <?php check_login(); ?>
            </div>  
            </div>
        </div>
        <?php     
                       
        ?>
    </body>