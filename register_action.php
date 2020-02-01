<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title>Formulare</title>
    </head>
    <body>
        <?php

                 //daten einfügen
                $vorname = $_POST['vorname'];
                $nachname = $_POST['nachname'];
                $bn_name = strtolower($_POST['benutzername']);
                $bn_pw = $_POST['password'];
                $bn_pw_confirm = $_POST['password_confirm'];
                $email = strtolower($_POST['email']);
                if ($vorname != "" && $nachname != "" && $bn_name != "" && $bn_pw != "" && $bn_pw_confirm != "" && $email != "") {  
                    if ($pw == $pw_confirm) {

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

                        $dbtabelle = "benutzer";
                        $stmt = $conn->prepare("INSERT INTO $dbtabelle (vorname, nachname, bn_name, bn_pw, email)
                        VALUES (:vorname, :nachname, :bn_name, :bn_pw, :email)");
                        $stmt->bindParam(':vorname', $vorname);
                        $stmt->bindParam(':nachname', $nachname);
                        $stmt->bindParam(':bn_name', $bn_name);
                        $stmt->bindParam(':bn_pw', $bn_pw);
                        $stmt->bindParam(':email', $email);

                        $stmt->execute();

                        ?><script>
                            alert("Eintrag war erfolgreich!");
                            window.location = 'login.php';
                        </script><?php

                    }
                    else {
                        ?><script>
                            alert("Eintrag war erfolgreich!");
                            window.location = 'register.php';
                        </script><?php
                    }
                }
                else {
                        ?><script>
                            alert("Eintrag war erfolgreich!");
                            window.location = 'register.php';
                        </script><?php
                }
        /*
        $PW = $_POST['password_confirm'];
        if($PW != "") {
        ?>
            
            <script>
                alert("Eintrag war erfolgreich!");
                window.location = 'login.php';
            </script>
        <?php
        }
        else {       
        ?>
            <script>  
                alert("Fehler beim speichern!");
                window.location = 'register.php';
            </script>      
        <?php   
        }

        */
        ?>
    </body>
</html>