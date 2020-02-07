<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bilder\favicon.ico">
        <title></title>
    </head>
    <body>
        <?php
            //Include anderer Files
            require_once('./db/db_connection.php');

                //daten einfügen
                $vorname = $_POST['vorname'];
                $nachname = $_POST['nachname'];
                $bn_name = strtolower($_POST['benutzername']);
                $bn_pw = $_POST['password'];
                $bn_pw_confirm = $_POST['password_confirm'];
                $email = strtolower($_POST['email']);
                                            //if ($vorname != "" && $nachname != "" && $bn_name != "" && $bn_pw != "" && $bn_pw_confirm != "" && $email != "") {  
                if (!empty($vorname) && !empty($nachname) && !empty($bn_name) && !empty($bn_pw) && !empty($bn_pw_confirm)) {
                    if ($bn_pw == $bn_pw_confirm && $bn_pw != "") {

                        db_connect();

                        //prüfen ob User bereits besteht
                        $sql = "Select * from benutzer where bn_name = '$bn_name'";
                        foreach($_SESSION['conn']->query($sql) as $row) {
                            $db_bn_name = $row["bn_name"];
                        }

                        if ($db_bn_name =="") {
                            echo "Erfolgreich";

                        /*
                            $dbtabelle = "benutzer";
                            
                            $stmt = $conn->prepare("INSERT INTO $dbtabelle (vorname, nachname, bn_name, bn_pw, email)
                            VALUES (:vorname, :nachname, :bn_name, :bn_pw, :email)");
                            $stmt->bindParam(':vorname', $vorname);
                            $stmt->bindParam(':nachname', $nachname);
                            $stmt->bindParam(':bn_name', $bn_name);
                            $stmt->bindParam(':bn_pw', $bn_pw);
                            $stmt->bindParam(':email', $email);

                            $stmt->execute();
                            db_close();
*/
                            ?><script>
                                alert("Eintrag war erfolgreich!");
                                window.location = 'login.php';
                            </script><?php
                            
                            //header ('Location: ./register.php');
                        }
                        
                        else {
                            header ('Location: ./register.php?error_bn_double=true'); //BN bereits vorhanden
                        }
                    
                    }
                    else {
                        header ('Location: ./register.php?error_pw_same=true'); //nicht alle Felder ausgefuellt
                    }
                }
                else {
                    header ('Location: ./register.php?error_blank=true'); //nicht alle Felder ausgefuellt
                }
        ?>
    </body>
</html>