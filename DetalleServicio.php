<?php

    $db_host = "localhost";
    $db_name = "practica_1";
    $db_user = "root";
    $db_pass = "";
    
    $usuario = $_GET['id_user'];
    $car = $_GET['id_veh'];
    $id = $_GET['id_service'];
    $idservice = $_GET['id_service'];
    $id2 = $_GET['NomServicio'];
    $id3 = $_GET['Descripción'];

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $conn2 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $conn3 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $conn4 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {

        echo mysqli_connect_error();

        exit;
    }

    //echo "Connected successfully.";

    $sql = "SELECT * FROM vehiculos where id_veh = $car";
    $sql2 = "SELECT * FROM usuarios where id_user = $usuario";
    $sql3 = "SELECT * FROM servicios where id_veh = $car and id_service = $idservice";
    
    $results = mysqli_query($conn, $sql);
 
    if ($results === false) {

        echo mysqli_error($conn);

    } else {

        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);

    }


    $results2 = mysqli_query($conn2, $sql2);
 
    if ($results2 === false) {

        echo mysqli_error($conn2);

    } else {

        $users2 = mysqli_fetch_all($results2, MYSQLI_ASSOC);

    }

    $results3 = mysqli_query($conn3, $sql3);
 
    if ($results3 === false) {

        echo mysqli_error($conn3);

    } else {

        $users3 = mysqli_fetch_all($results3, MYSQLI_ASSOC);

    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $sql6 = "UPDATE servicios,vehiculos SET id_service = '" .$_POST['id_service']."', NomServicio='"
        .$_POST['NomServicio']."', Fecha = '".$_POST['Fecha']."', Descripción = '".$_POST['Descripción']."' WHERE id_service = '".$id."'";
        
        $results10 = mysqli_query($conn, $sql6);
    
        if ($results10 === false) {
    
            echo mysqli_error($conn);
    
        } else {
    
            $id = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id";
    
        }
    
    }

    

?>

<!DOCTYPE html>
<html>
<head>
    <title>USUARIOS</title>
    <meta charset="utf-8">

    <style>
      
        header{
            border: solid 5px black;
            background-color: yellow;
            margin-bottom: 10px;
            padding: 10px;
            text-align:center;
            margin-top:30px;
        }

        footer{
            border: solid 5px black;
            background-color: turquoise;
            margin-top: 10px;
            padding: 10px;
            text-align:center;
        }

        h2{
            text-align:center;
            color: black;
            background-color: yellow;
            border: solid 4px black;
            margin-left: 170px;
            margin-right: 170px;
            padding:15px;
        }

        tr{

            background-color: yellow;
        }

        div{

            border: solid black 3px;
            padding: 10px;
        }

        body{
            text-align:center;
            top: 60px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url("foto.jpg");
            background-size: cover;
            z-index: 0;
        }

        table{

            border: solid 5px black;
            padding:15px;
            margin-bottom: 10px;
            text-align: center;
            margin-left: 160px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin-top: 5px;

        }

        #datos{

            margin-left:600px;

        }



    </style>
</head>
<body>

    <header>
        <h1>DETALLE SERVICIO</h1>
    </header>
 
    <div>

        <main>

            <h2>USUARIO</h2>

                <?php foreach ($users2 as $usu): ?>

                    <p>Nombre: 
                        <input type = "text" name = "login" value = <?= $usu['login']; ?>>
                    </p>

                <?php endforeach; ?>

                <h2>DATOS VEHÍCULO</h2>

                <?php foreach ($users as $veh): ?>

                    <form class = "form" method="POST">

                        <table id = datos>

                            <tr>

                                <td>

                                    <p>Matrícula: <input type = "text" name = "matricula" placeholder = "MATRÍCULA" 
                                    value = <?= $veh['matricula']; ?>></p>

                                </td>

                            </tr>

                            <tr>

                                <td>

                                    <p>Marca: <input type="text" name="marca" placeholder = "MARCA" 
                                    value = <?= $veh['marca']; ?>></p>

                                </td>
                                
                            </tr>

                            <tr>

                                <td>

                                    <p>Modelo: <input type="text" name="modelo" placeholder = "MODELO" 
                                    value = <?= $veh['modelo']; ?>></p>

                                </td>
                                
                            </tr>

                        </table>

                    </form>

                <?php endforeach; ?>

            <br>

            <h2>SERVICIO</h2>

            <?php if (empty($id3)): ?>

                <?php foreach ($users3 as $ser): ?>


                        <form class = "form" method = "POST">

                            <table>
                                <tr>

                                    <td>
                                        <p>ID SERVICIO: <input type = "text" name = "id_service"
                                        value = <?= $ser['id_service'] ?>></p>
                                    </td>

                                    <td>
                                        
                                        <p>TIPO DE SERVICIO: <input type = "text" name = "NomServicio"
                                        value = <?= $ser['NomServicio'] ?>></p>

                                    </td>

                                    <td>
                                        
                                        <p>Fecha: <input type = "date" name = "Fecha"
                                        value = <?= $ser['Fecha'] ?>></p>

                                    </td>

                                    <td>
                                        
                                        <p>Descripción: <input type = "text" name = "Descripción"
                                        value = <?= $ser['Descripción'] ?>></input></p>

                                    </td>

                                                    
                                    <input type = "hidden" value = <?=$id?>>
                                    <input type = "submit" value = "GUARDAR">

                                </tr> 
                            </table>
                        </form>


                <?php endforeach; ?>
 
            <?php else: ?>

                <?php foreach ($users3 as $ser): ?>

                        <form class = "form" method = "POST">

                            <table>

                                <tr>

                                    <td>
                                        <p>ID SERVICIO: <input type = "text" name = "id_service"
                                        value = <?= $ser['id_service'] ?>></p>
                                    </td>

                                    <td>
                                        
                                        <p>TIPO DE SERVICIO: <textarea type = "text" name = "NomServicio"
                                        ><?= $ser['NomServicio'] ?></textarea></p>

                                    </td>

                                    <td>
                                        
                                        <p>Fecha: <input type = "date" name = "Fecha"
                                        value = <?= $ser['Fecha'] ?>></p>

                                    </td>

                                    <td>
                                        
                                        <p>Descripción: <textarea type = "text" name = "Descripción"
                                        ><?= $ser['Descripción'] ?></textarea></p>

                                    </td>

                                    <input type = "hidden" value = <?=$id?>>
                                    <input type = "submit" value = "GUARDAR">


                                </tr> 

                            </table>                            

                        </form>

                <?php endforeach; ?>

            <?php endif; ?>

        </main>

    </div>

    <footer>

        <h1>FOOTER</h1>
        
    </footer>

</body>
</html>