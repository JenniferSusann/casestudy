
<?php
    //$delete_select_zeile = $_POST['delete_select_zeile'];
    //var_dump($_POST['delete_zeile']);
    var_dump($_POST['delete_select_zeile']);
    foreach ($_POST['delete_select_zeile'] as $value) {
        echo "Zeile: $value soll gelöscht werden";
    }
    /*
    echo "Var: $delete_zeile";
    if (isset($_POST['select_zeile'])) {
        echo "Delet ist gewählt : $delete_zeile";
        
    }

    else {
        echo "Nicht gewählt: ";
        //var_dump($_POST['delete_zeile']);
    }
    */
                
?>



