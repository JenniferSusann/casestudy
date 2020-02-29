
<?php
session_start();
require_once "config.php";
$webtechcs = include 'config.php';
$show_form = true;
$error = null;


if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $textbe = $_POST['textbe'];
    $user_id = $_SESSION['id'];

    //##########################################################
    $date_create = $_POST['date_create'];
    //##########################################################
    $kategorie = $_POST['kategorie'];

    
    if(isset($file)){
     $file = $_FILES['file'];

     $fileName = $_FILES['file']['name'];
  
     $fileSize = $_FILES['file']['size'];

     $fileType = $_FILES['file']['type'];

     $fileTmpName = $_FILES['file']['tmp_name'];

     $fileError = $_FILES['file']['error'];
 

     $fileExt = explode('.', $fileName);

     $fileActualExt = strtolower(end($fileExt));
 
     $allowed = array('jpg', 'jpeg', 'png', 'gif');
 
   
     if (in_array($fileActualExt, $allowed)){
         if ($fileError === 0) {
             if($fileSize < 500000) {
             $fileNameNew = uniqid('', true).".".$fileActualExt;
 
             # Der Zielort wird festgelegt:
             $fileDesitination = '/var/www/html/uploaded/'.$fileNameNew;
             # Die Datei wird vom tempäreren Speicherort in             # Ordner verschoben wird.
           move_uploaded_file($fileTmpName, $fileDesitination);
 
             # Ausgabe der Erfolgsmeldung auf der Uploadseite
             header("Location: welcome.php");
 
             } else {
                 echo "Die Datei überschreitet die max. Größe";
             }
 
         } else {
             echo "Beim Hochladen ist ein Fehler aufgetreten";
         }
 
     } else {
         echo "Dieser Dateityp ist nicht erlaubt";
     }
    }
    if($speichern){
        echo '<b> Dein Eintrag wurde erfolgreich gespeichert</b><br>';
        $show_form = false;
    } else {
        $error ='Beim Abspeichern ist ein fehler aufgetreten';
    } 
    //##########################################################
    
    $speichern = $webtechcs->prepare("INSERT INTO eintrag (title, textbe, user_id, kategorie, date_create) VALUES(?, ?, ?, ?, ?)");
    $speichern->bind_param('ssiis', $title, $textbe, $user_id, $kategorie, $date_create);
    //##########################################################
    $speichern->execute();
    

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
        <h1> Tagebuch Eintrag erstellen  </h1>
    </header>
    <div class="empty-box">

    </div>

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="kategorie">
    <select name="kategorie">
        <option value="1">keine Kategorie</option>
        <option value="2">Schule</option>
        <option value="3">Familie</option>
        <option value="4">Fest</option>
    </select>
    </div>
    <div class="date">
        <lable>Datum für den Eintrag wählen</lable>
        <!-- <input type="date" name="publish_date" value="24.02.2020"> -->
        <!-- ########################################################## -->
        <input type="date" name="date_create" value="<?php echo date('Y-m-d'); ?>">
        <!-- ########################################################## -->

    </div>

    
    <div class="Eintragstitel">
    <textarea id="text" name="title" cols="2" rows="2" placeholder="Titel des Eintrags"></textarea>


    <div class="Eingabefeld">
    <textarea id="eintrag" name="textbe" cols="50" rows="10" maxlenght="1000" placeholder="Schreibe deinen Tagebucheintrag hier"></textarea>
    </div>
   
    <div class="bildeinfügen">
        <label>Bild einfügen</label>
        <input type="file" name="file">  
    </div> 
    
    <div class="speicherbutton">
    <input type="submit" name="submit" value="Speichern" />
    </div>
</form>

    <h2>
    <a href="welcome.php">Zurück zur Startseite</a>
</h2>
<div class="leerbox">
</div>
    <footer>
    <h4> Erstellt von Cyril Koller und Jennifer Mentner </h4>
    </footer>
</body>

</html>