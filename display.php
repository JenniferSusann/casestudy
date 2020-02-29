<?php

session_start();
require_once "config.php";
$webtechcs = include 'config.php';


$user_id = $_SESSION['id'];
$kat_filter = $_POST['filter'];
$date_start = $_POST['date_filter_start'];
$date_end = $_POST['date_filter_end'];


if ($kat_filter == "0") {
    //no Kategorie is selected
    $sql ="Select title, textbe, kategorie, date_format(date_create,'%d.%m.%Y') as datum_eintrag_convert FROM eintrag
            where eintrag.user_id = '$user_id'
            and date_create BETWEEN '$date_start' and '$date_end'
            order by date_create DESC";
}

else {
    //Kategorie is selected
    $sql ="Select title, textbe, kategorie, date_format(date_create,'%d.%m.%Y') as datum_eintrag_convert FROM eintrag
            where eintrag.user_id = '$user_id'
            and date_create BETWEEN '$date_start' and '$date_end'
            and kategorie = '$kat_filter'
            order by date_create DESC";          
}


$webtechcs = mysqli_query($webtechcs, $sql);
      if( ! $webtechcs){
            die('Ungültige Abfrage: ' .mysqli_errno()); 
        }
            
?>

<div class="eintrag-anzeige">
    <?php
        $entryCount = 0;
        //$kategorien= array("keine Kategorie", "Schule", "Familie", "Fest");
        while ($entry = mysqli_fetch_array($webtechcs, MYSQLI_ASSOC)) {
            echo '<div class="eintrag">';
                echo '<h2>' . $entry['title'] . '</h2>';
                echo '<h3>' . $kategorien["kategorie"]. '</h3>';
                echo '<h5>' . $entry['datum_eintrag_convert']. '</h5>';
                echo '<p>' . $entry['textbe'] . '</p>'; 
                
            echo '</div>';
            $entryCount++;
        }

        if ($entryCount == 0) {
                echo ' <p class="keine_Einträge">Leider hast du noch keinen Eintrag erstellt</p>';
        } 
        
    ?>
</div> 





