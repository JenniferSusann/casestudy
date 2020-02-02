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
            if (isset($_POST['new_diary'])) {
                header ( 'Location: ./diary_create.php');
            }
            elseif (isset($_POST['logout'])) {
                $_SESSION['session_on'] = false;
                session_destroy();
                ?><script>
                    alert("Sie wurden erfolgreich abgemeldet");
                    window.location = 'login.php';
                </script><?php
            }
            else {
                header ( 'Location: ./diary_overview.php');
            }                      
        ?>
    </body>