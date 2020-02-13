<?php 

    function db_connect() {
        $dbhost = "127.0.0.1";
        $dbuser = "casestudy";
        $dbpw = "casestudy";
        $dbname = "casestudy1";
        //verbindugsaufbau
        try {
            $dbconnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpw);
        } catch (PDOException $e) { 
            die('Verbindung fehlgeschlagen: ' .$e->get_messagge());
        }
        //Uebergabe der Connection
        return $dbconnection;
    }

        
    function db_close() {        
        //verbindung schliessen
        unset($dbconnection);
    }
?>