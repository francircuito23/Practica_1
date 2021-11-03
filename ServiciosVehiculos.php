<?php

    $db_host = "localhost";
    $db_name = "practica_1";
    $db_user = "root";
    $db_pass = "";
    
    $usuario = $_GET['id_user'];
    $car = $_GET['id_veh'];
    $id = $_GET['id_service'];


    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $conn2 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $conn3 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {

        echo mysqli_connect_error();

        exit;
    }

    //echo "Connected successfully.";

    $sql = "SELECT * FROM vehiculos where id_veh = $car";
    $sql2 = "SELECT * FROM usuarios where id_user = $usuario";
    $sql3 = "SELECT * FROM servicios";

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
    
        $sql6 = "INSERT INTO servicios (id_service,id_veh, NomServicio, Fecha, Descripción) 
        VALUES ('{$_POST['id_service']}', '{$_POST['id_veh']}', '{$_POST['NomServicio']}', '{$_POST['Fecha']}', '{$_POST['Descripción']}')";

        $results10 = mysqli_query($conn, $sql6);
    
        if ($results10 === false) {
    
            echo mysqli_error($conn);
    
        } else {
    
            $id = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id";
            header("Location: http://localhost:81/Practica_1/ListadeVehiculos.php?id_user=$usuario");
    
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
            background-image: url("fotoweb.jpg");
            background-size: cover;
            z-index: 0;

        }

        table{

            border: 5px solid black;
            padding:15px;
            margin-bottom: 10px;
            text-align: center;
            margin-left: 430px;

            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-image: url("fototaller.jpg");
            background-repeat: no-repeat;

        }
        
        input{

            text-align: center;

        }

        .btn {

            background: yellow;
            color: black;
            padding: 10px;
            display: inline-block;
            margin-right: 200px;
            font-family: arial;
            font-size: 20px;
            transition: font-size  1s;
            border-radius: 30px;

        }

        .btn:hover {

            background: white;
            font-size: 30px;

        }

        .btn:active {

            transform: translatey(0);

        }

        form{

            margin-left: 300px;
            margin-right: 100px;
            text-align: center;


        }

        #tabla1{

            margin-left: 450px;



        }
        input[type="text"],[type="password"]{

            text-align: center;
            border: 3px solid white;
            border-radius: 25px;
            background-color: cyan;
            font-size: large;

        }

    </style>
</head>
<body>

    <header>
        <h1>AÑADIR SERVICIO🔧</h1>
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

                        <table id = tabla1>


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

            <form class = "form" method="POST">
                <table>

                    <tr>

                        <td>

                            <p>ID SERVICIO: <input type ="text" name = "id_service" id = "id_service" required></p>

                        </td>
                    </tr>

                    <tr>

                        <td>

                            <p>ID VEHICULO: <input type ="text" name = "id_veh" id = "id_veh" value = <?=$car?>></p>

                        </td>
                    </tr>

                    <tr>

                        <td>

                            <p>NOMBRE SERVICIO: <textarea type ="text" name = "NomServicio" id = "NomServicio" required></textarea></p>

                        </td>
                    </tr>

                    <tr>

                        <td>

                            <p>DESCRIPCIÓN:<textarea type ="text" name = "Descripción" id = "Descripción" required></textarea></p>

                        </td>
                    </tr>

                    <tr>

                        <td>

                            <p>FECHA <input type ="date" name = "Fecha" id = "Fecha" required></p>

                        </td>
                    </tr>

                </table>

                <input type = "hidden" value = <?=$id?>>
                <input class = "btn" type = "submit" value = "GUARDAR">

            </form>

        </main>

    </div>

    <footer>

        <h1>© Taller JFM</h1>
        
    </footer>

</body>
</html>