<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: mainpage.php");
    exit;
}
require_once "config.php";
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] =="POST")
{
    if(empty(trim($_POST["new_password"])))
    {
        $new_password_err = "Bitte gib ein neues Password ein.";
    } elseif(strlen(trim($_POST["new_password"])) <6)
    {
        $new_password_err = "Password muss mindestens 6 Zeichen haben.";
    } else
    {
        $new_password = trim($_POST["new_password"]);
    }
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Bitte bestätige dein neues Passwort.";
    } else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password))
        {
            $confirm_password_err = "Passwörter stimmen nicht überein.";
        }
    }
    if(empty($new_password_err) && empty($confirm_password_err))
    {
        $sql = "UPDATE users SET password = ? WHERE id = ?";   
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            if(mysqli_stmt_execute($stmt))
            {
                header("location: logout.php");
                exit();
            } else{
                echo "Irgendwas ist schiefgelaufen. Probier es später nochmal.";
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
        <h1> Passwort ändern </h1>
    </header>
    <div class="empty-box">

    </div>
    <div class="wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group3 <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>Neues Passwort</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group3 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Passwort bestätige</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
                <h2><a href="welcome.php">Abbrechen
                </a><h2>
        </form>
    </div>    

    <footer>
    <h4> Erstellt von Cyril Koller und Jennifer Mentner </h4>
    </footer>

</body>

</html>   
