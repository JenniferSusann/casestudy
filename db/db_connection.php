<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>MySql</title>
    </head>
    <body>
        <?php

            function db_connect() {
                $dbhost = "127.0.0.1";
                $dbuser = "casestudy";
                $dbpw = "casestudy";
                $dbname = "casestudy1";
                //verbindugsaufbau
                try {
                    $_SESSION['conn'] = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpw);
                } catch (PDOException $e) { 
                    echo 'Verbindung fehlgeschlagen: ' .$e->get_messagge();
                }
            }

                
            function db_close() {        
                //verbindung schliessen
                $_SESSION['conn'] = null;
            }
        ?>
    </body>
</html>