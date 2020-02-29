<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggein"] === true) {
    header("location: welcome.php");
    exit;
}
require_once "config.php";
$username = $password = "";
$username_err =  $password_err ="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty(trim($_POST["username"])))
    {
        $username_err = "Bitte Benutzername eingeben.";
    } else
    {
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Bitte Passwort eingeben.";
    } else
    {
        $password = trim($_POST["password"]);
    }
    if(empty($username_err) && empty($password_err))
    {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            header("location: welcome.php");
                        } else
                        {
                            $password_err = "Das eingegebene Passwort stimmt nicht.";
                        }
                    }
                } else
                {
                    $username_err = "Es wurde kein Account zu diesem Benuternamen gefunden.";
                }
            } else
            {
                echo "Es ist etwas schiefgelaufen. Probiere es später nochmal.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width", inital-scale=1.0>
    <link rel="stylesheet" href="style.css">
    <title> Tagebuch </title>
</head>

<body>
    <header>
        <img id="ibzlogo" src="bilder/ibzlogo.png" alt="Logo">
        <h1> Willkommen zum Online-Tagebuch </h1>
    </header>
    <div class="empty-box">

    </div>
    <h2> Anmelden </h2>
    <div class="input_form">
        <form action="" method="post">
        <div class="form-group2 <?php echo (!empty($username_err)) ? 'has-error' : '';?>">
            <input type="text" name="username" class="form-control" placeholder="Benutzername">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group2 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <input type="password" name="password" class="form-control" placeholder="Passwort">
            <span class="help-block"><?php echo $password_err;?></span>
        </div>
    
        <div class="form-group2">
             <input type="submit" class="btn btn-primary" value="Einloggen"> 
        </div> 
        </form>
    </div> 
    <h2>   
        <a href="register.php">Registrieren
        </a>
    </h2>

    <img id="sydney" src="bilder/sydney.jpg" alt="cooles Bild">
    <img id="london" src="bilder/london.jpg" alt="juuppi Bild">


    <footer>
    <h4> Erstellt von Cyril Koller und Jennifer Mentner </h4>
    </footer>
</body>
</html>