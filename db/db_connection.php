<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Vorlage MySql</title>
    </head>
    <body>
        <?php

        $dbhost = "127.0.0.1";
        $dbname = "casestudy1";
        $dbuser = "casestudy";
        $dbpw = "casestudy";
        
        //verbindugsaufbau
        try {
            $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpw);
        } catch (PDOException $e){ 
            echo 'Verbindung fehlgeschlagen: ' .$e->get_messagge();
         }
        
        
         //verbindung schliessen
         $conn = null;
        ?>
    </body>
</html>