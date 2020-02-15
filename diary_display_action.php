<?php
session_start(); 
//Include anderer Files
require_once('./funktionen.php');

if (!isset($_SESSION['session_on'])) { 
    ?><script>
        alert("Ihre Sitzung ist abgelaufen");
        window.location = 'login.php';
    </script><?php   
}

    $db_conn = db_connect();
    var_dump($_POST['out_date']);
    if (isset($_POST['out_date'])) {
        echo "Datum ohne Einträge";
    }

    else {
        echo "Normale Suche";

        //ev. lefter join um alle Eintraege anzuzeigen
        $sql = "Select * from tagebucheintrag
                    inner join benutzer ON tagebucheintrag.bnID = benutzer.bnID
                    inner join kategorie ON tabebucheintrag.kategorieID_1 = kategorie.kategorieID
                    inner join kategorie ON tabebucheintrag.kategorieID_2 = kategorie.kategorieID
                    inner join kategorie ON tabebucheintrag.kategorieID_3 = kategorie.kategorieID
                    where bnID = $userID
                    order by tagebucheintrag.datum_eintrag";
    /*     
        $sql = "Select * from tagebucheintrag where bnID = $userID";
        foreach($db_conn->query($sql) as $row) {
            echo "$row['datum_eintrag']";
            echo "<br>";
            echo "$row['diary_text']";
            echo "<br>";
            echo "$row['kategorieID_1']";
            echo "$row['kategorieID_2']";
            echo "$row['kategorieID_3']";
            echo "<br>";
        }


        <table>
			<tr>
				<th>Titel 1</th>
				<th>Titel 2</th>
			</tr>
            foreach($db_conn->query($sql) as $row) {
                <tr>
                    <td>echo "$row['datum_eintrag']";</td>
                    <td>echo "$row['diary_text']";</td>
                    <td>echo "$row['kategorieID_1']";</td>
                    <td>echo "$row['kategorieID_2']";</td>
                    <td>echo "$row['kategorieID_3']";</td>
                </tr>
        </table>
        */
    }
    db_close();
                
?>



