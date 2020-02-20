<?php
//Include anderer Files
require_once('./db/db_connection.php');

    //Funktion zur erstellung des Dropdownmenue
    function kat_auswahl() {
        $arrey = $_SESSION['bn_kat']; 
            //Werte fuer Dropdown Menu erstellen
            echo "<option value=''>Wählen</option>";
            foreach ($arrey as $value) {
            echo "<option value='$value'>$value</option>";  
            }
    }

    //Kat des Benutzers ermitteln
    function kat_ermitteln() {
        $db_conn = db_connect();
        $userID = $_SESSION['userID'];
            $sql = "Select * from kategorie where bnID = $userID or bnID = 0";
            foreach($db_conn->query($sql) as $row) {
                $bn_kat[] = $row['beschreibung'];
            }
            var_dump($bn_kat);
            $_SESSION['bn_kat'] = $bn_kat;
        db_close();
    }

    //Filtern der Eintraege fuer den Benutzer
    function diary_filter() {
        $db_conn = db_connect();
            //filtern nach Datum ohne eintraege
            if (isset($_POST['out_date'])) {
                echo "Datum ohne Einträge";
            }
            
            //filtern nach bestimmten Datumbereich
            else {
                $userID = $_SESSION['userID'];
                if (!isset($_SESSION['kat_filter'])) {
                    //Abfrage der Eintraege ohne Filter
                    $sql = "Select date_format(tagebucheintrag.datum_eintrag,'%d.%m.%Y') as datum_eintrag_convert, tagebucheintrag.diary_text, Kat1.beschreibung as kat_besch_1, Kat2.beschreibung as kat_besch_2, Kat3.beschreibung as kat_besch_3 
                            from tagebucheintrag
                            inner join benutzer ON tagebucheintrag.bnID = benutzer.bnID
                            left join kategorie as Kat1 ON tagebucheintrag.kategorieID_1 = Kat1.kategorieID  
                            left join kategorie as Kat2 ON tagebucheintrag.kategorieID_2 = Kat2.kategorieID 
                            left join kategorie as Kat3 ON tagebucheintrag.kategorieID_3 = Kat3.kategorieID 
                            where tagebucheintrag.bnID = '$userID'
                            order by tagebucheintrag.datum_eintrag";
                }
                else {
                    //Abfrage der Eintraege mit gesetztem Filter
                    $kat_filter = $_SESSION['kat_filter'];
                    $sql = "Select date_format(tagebucheintrag.datum_eintrag,'%d.%m.%Y') as datum_eintrag_convert, tagebucheintrag.diary_text, Kat1.beschreibung as kat_besch_1, Kat2.beschreibung as kat_besch_2, Kat3.beschreibung as kat_besch_3 
                            from tagebucheintrag
                            inner join benutzer ON tagebucheintrag.bnID = benutzer.bnID
                            left join kategorie as Kat1 ON tagebucheintrag.kategorieID_1 = Kat1.kategorieID  
                            left join kategorie as Kat2 ON tagebucheintrag.kategorieID_2 = Kat2.kategorieID 
                            left join kategorie as Kat3 ON tagebucheintrag.kategorieID_3 = Kat3.kategorieID 
                            where tagebucheintrag.bnID = '$userID' and 
                                (tagebucheintrag.kategorieID_1 = 
                                (select kategorie.kategorieID from kategorie where (kategorie.bnID = 0 or kategorie.bnID = '$userID') 
                                and kategorie.beschreibung = '$kat_filter') or
                                tagebucheintrag.kategorieID_2 = 
                                (select kategorie.kategorieID from kategorie where (kategorie.bnID = 0 or kategorie.bnID = '$userID') 
                                and kategorie.beschreibung = '$kat_filter') or 
                                tagebucheintrag.kategorieID_3 = 
                                (select kategorie.kategorieID from kategorie where (kategorie.bnID = 0 or kategorie.bnID = '$userID') 
                                and kategorie.beschreibung = '$kat_filter'))
                            order by tagebucheintrag.datum_eintrag";
                }            
        ?>
                    <table>
                    <tr>
                        <th>Datum</th>
                        <th>Tagebuchtext</th>
                        <th>Kategorie 1</th>
                        <th>Kategorie 2</th>
                        <th>Kategorie 3</th>
                    </tr>
        <?php
                    foreach($db_conn->query($sql) as $row) {
        ?>
                        <tr>
                            <td><?php echo $row['datum_eintrag_convert'];?></td>
                            <td><?php echo $row['diary_text']; ?></td>
                            <td><?php echo $row['kat_besch_1']; ?></td>
                            <td><?php echo $row['kat_besch_2']; ?></td>
                            <td><?php echo $row['kat_besch_3']; ?></td>
                        </tr>    
        <?php
                    }
                    echo "</table>";
            }
                unset($sql);
                db_close();
    }





?>
