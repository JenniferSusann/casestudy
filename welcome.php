<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: mainpage.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width", inital-scale=1.0>
    <link rel="stylesheet" href="style.css">
    <title> Tagebuch </title>

</head>

<body>
    <header>
        <img id="ibzlogo" src="bilder/ibzlogo.png" alt="Logo">
        <h1> <?php echo 'Wilkommen '. $_SESSION["username"]; ?> </h1>
    </header>
    <div class=empty-box>
    </div>

    <div class="form-group">
        <form action="diaryconf.php" method="POST">
            <input type="submit" class="btn btn-primary" value="Erstellen"><br>
        </form>
        <form action="filter.php" method="POST">
            <input type="submit" class="btn btn-primary" value="Alle Einträge anzeigen"><br>
        </form>
        <form action="password-reset.php">
            <input type="submit" class= "button" value="Passwort ändern">
        </form>
        <form action="logout.php">
            <input type="submit" class= "button" value="Logout">
        </form>
    </div>

        <div class=leerbox>
        </div>

    <footer>
    <h4> Erstellt von Cyril Koller und Jennifer Mentner </h4>
    </footer>
</body>
</html>