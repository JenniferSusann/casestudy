<?php
session_start();
require_once "config.php";
$webtechcs = include 'config.php';

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
        <h1> Deine Einträge </h1>
    </header>

    <div class=empty-box>
    </div>

    <form action="" method="POST">
    <div class=filter-text>
        <lable>Wähle eine Kategorie um deine Einträge zu filtern</lable>
        <div class="filter">
        <select name="filter">
            <option selected="" value="0">Alle zeigen</option>
            <option value="1">keine Kategorie</option>
            <option value="2">Schule</option>
            <option value="3">Familie</option>
            <option value="4">Fest</option>
        </select>    
        </div>
    </div>
    <div class="filter-text">
        <lable>Datum</lable>
    </div>
    <div class="filter">
        von 
            <input type="date" name="date_filter_start" value="<?php echo date('Y-m-d', strtotime('-1 week')); ?>">
            <br><br>
        bis
            <input type="date" name="date_filter_end" value="<?php echo date('Y-m-d'); ?>">
            <br><br>
    </div>

       <!-- Button fuer Filtern --> 
    <div class="speicherbutton">
       <input type="submit" name="button_filter" value="Filtern">
    </div>
        <br><br>
</form>


<?php 
if (isset($_POST['button_filter'])) {
    include('display.php'); 
}

?>
    <h2>
        <a href="welcome.php">Zurück zur Startseite</a>
    </h2>
<div class=leerbox>

</div>

    <footer>
    <h4> Erstellt von Cyril Koller und Jennifer Mentner </h4>
    </footer>
</body>

</html>
    