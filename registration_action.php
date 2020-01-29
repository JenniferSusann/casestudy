<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title>Formulare</title>
    </head>
    <body>
        <p>Hallo <?php echo $_POST['nachname'] ." ". $_POST['vorname']; ?> </p>
        <p>E-Mail lautet: <?php echo $_POST['email']; ?> </p>
        <p>PW ist: <?php echo $_POST['password'] ." Bestätigung: ". $_POST['password_confirm']; ?> </p>
    </body>
</html>