<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width", inital-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title>Dein Tagebuch</title>
    </head>

    <body>
        <?php
        $BN = strtolower($_POST['benutzername']);
        $PW = $_POST['passwort'];

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

                            $sql = "Select * from benutzer where bn_name = 'ab'";
                            foreach($conn->query($sql) as $row) {
                                //echo "<li>".$row["bn_pw"]."</li>";
                                $bn_name = $row["bn_name"];
                                $bn_pw = $row["bn_pw"];
                                //echo "<li>$user</li>";
                            }

                            if ($BN == $bn_name && $PW == $bn_pw) {
                                echo "Erfolgreich";
                            }
                            else {
                                echo "Fehler";
                            }

        /*
            if ($BN != "" && $PW != "") {  
                header ('Location: ./diary_overview.php');  
            }

            else {
                header('Location: ./login.php?error=true');
            }
            */
        ?>
    </body>
</html>