<?php

    $db_host = "localhost";
    $db_name = "practica1";
    $db_user = "Practica_1.php";
    $db_pass = "BICHOTA123";

    $usuario = $_GET['id_user'];

    
    if (mysqli_connect_error()) {

        echo mysqli_connect_error();

        exit;
    }

    echo "Connected successfully.";

    require("ListadeVehiculos.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST"&&$car==$_POST['id_veh']){
        
        $sql4 = "UPDATE vehiculos SET id_veh = '" .$_POST['id_veh']."', id_user='"
        .$_POST['id_user']."', marca = '".$_POST['marca']."', modelo = '".$_POST['modelo']."', matricula = '".$_POST['matricula']."', combustible = '".$_POST['combustible']."', tipo_motor = '".$_POST['tipo_motor']."' WHERE id_veh = '".$car."' and id_user = '".$usuario."';";

        $results4 = mysqli_query($conn, $sql4);
    
        if ($results4 === false) {
    
            echo mysqli_error($conn);
    
        } else {
    
            $id2 = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id2";
    
        }
    
    }

?>


    
    

    
