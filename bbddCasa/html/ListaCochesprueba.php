<?php
    
    $db_host = "localhost";
    $db_name = "fran";
    $db_user = "admin";
    $db_pass = "123";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    
    echo "Connected successfully.";


    if(!$_GET){

        if (isset($_POST['guardar'])) {
        
            if (strlen($_POST['Nombre']) >= 1 && strlen($_POST['DNI']) >= 1 && strlen($_POST['Pass']) >= 1) {
                $name = trim($_POST['Nombre']);
                $dni = trim($_POST['DNI']);
                $contra = trim($_POST['Pass']);
                $fechareg = date("d/m/y");
                $consulta = "INSERT INTO usuarios(Nombre, DNI, Pass, fecha_reg) VALUES ('$name','$dni','$contra','$fechareg')";
                $resultado = mysqli_query($conn,$consulta);
    
                if ($resultado) {
                    
                    $id=mysqli_insert_id($conn);

                    header("Location: http://".$_SERVER['HTTP_HOST']."/practica_1/bbddCasa/html/ListaCochesprueba.php?ID=$id");

                } else {
                    ?> 
                    <h3 class="bad">¡Ups ha ocurrido un error!</h3>
                   <?php
                }
            }   else {
                    ?> 
                    <h3 class="bad">¡Por favor complete los campos!</h3>
                   <?php
            }
        }

        include("post.php");

    }else{

        $usu = $_GET["ID"];

        $sql = "SELECT * FROM usuarios where ID = $usu";

        $results = mysqli_query($conn, $sql);

        if ($results === false) {
            echo mysqli_error($conn);
        } else {
            $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
     
        }

        include("get.php");

    }


    //$sql2 = "SELECT * FROM user ORDER BY date_entry;"
 
    //$results = mysqli_query($conn, $sql); RESULTADOS DE LA CONSULTA GET

    //$results2 = mysqli_query($conn2, $sql2);
 
    /*if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
 
    }
    */

    /*if ($results2 === false) {
        echo mysqli_error($conn2);
    } else {
        $users2 = mysqli_fetch_all($results2, MYSQLI_ASSOC);
 
        print_r($users2);
    }
    */
  
?>