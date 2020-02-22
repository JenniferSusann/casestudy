<?php
function addition($zahl1, $zahl2){
    return $zahl1+$zahl2;
}

function subtraktion($zahl1, $zahl2){
    return $zahl1-$zahl2;
}
function division($zahl1, $zahl2){
    return $zahl1/$zahl2;
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        
    </head>

    <body>
    <?php
           $z1=600;
           $z2=100;
           $z3=0;


           $totalA= addition($z1, $z2);
           $totalB= subtraktion($z1, $z2);
           $titalC= division($z1, $z2);
           $totalD= division($z1, $z3);
        ?>
        total addition ist <?= $totalA ?><br>
        total subtraktion ist <?= $totalB ?><br>
        total division ist <?= $titalC ?><br>
        total division durch 0 ist <?= $totalD ?><br>
    </body>
</html>


