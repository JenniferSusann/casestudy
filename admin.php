<?php
try {
    $pdo = new PDO('mysql:dbname=webtech1;host=localhost',
    'webtech1', 'webtech1');
} catch (PDOException $e){
    echo 'Verbindung fehlgeschlagen: '. $e->getMessage();
}
echo '<table>';
$sql = "Select * from velag";
foreach ($pdo->query($sql) as $row){
   $fields = array('name', 'plz','ort','adresse1' );
    echo '<tr>';
    foreach ( $fields as $feld){ 
        echo '<td>'.$row[$feld].'</td>';
    }
    echo '</tr>';

}
echo '</table>';



?>