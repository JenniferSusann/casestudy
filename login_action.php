<?php 
session_start(); 
//Include anderer Files
require_once('./funktionen.php');

   
    $BN = strtolower($_POST['benutzername']);
    $PW = $_POST['passwort'];
    //#PW sollte noch gehashed werden
    if (!empty($BN) && !empty($PW)) { //BN und PW ausgefuellt
        $db_conn = db_connect();   
            $sql = "Select * from benutzer where bn_name = '$BN'";
            foreach($db_conn->query($sql) as $row) {
                $db_bn_name = $row["bn_name"];
                $db_bn_pw = $row["bn_pw"];
                $db_bnID = $row["bnID"];
            } 
        db_close();

        if ($BN == $db_bn_name && $PW == $db_bn_pw) { //BN und PW stimmen ueberein
                $_SESSION['userID'] = $db_bnID;
                $_SESSION['date_today'] = date('Y-m-d');
                $_SESSION['session_on'] = True;
            header ( 'Location: ./diary_overview.php');
        }
        else {
            header ('Location: ./login.php?zugang_falsch=true'); //BN oder PW falsch
        }
    }
    else {
        header ('Location: ./login.php?error_blank=true'); //BN oder PW nicht ausgefüllt
    }

?>