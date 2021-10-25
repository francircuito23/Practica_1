<?php

    $db_host = "localhost";
    $db_name = "practica1";
    $db_user = "Practica_1.php";
    $db_pass = "BICHOTA123";
    
    $usuario = $_GET['id_user'];
    $id = $_GET['id_user'];


    $sql2 = "SELECT * FROM vehiculos where id_user = $usuario";
    $sql = "SELECT * FROM usuarios where id_user = $usuario";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $conn2 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $conn3 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $sql2 = "SELECT * FROM vehiculos where id_user = $usuario";
    $sql = "SELECT * FROM usuarios where id_user = $usuario";

    $results = mysqli_query($conn, $sql);

    if($usuario == null){


    }
    else{

        if ($results === false) {

            echo mysqli_error($conn);
        
        } 
        else{
        
            $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
        
        }
        $results2 = mysqli_query($conn2, $sql2);
            
        if ($results2 === false) {
            
            echo mysqli_error($conn2);
            
        } else {
            
            $vehiculos = mysqli_fetch_all($results2, MYSQLI_ASSOC);
            
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $sql1 = "INSERT INTO usuarios (id_user, login, password) 
        VALUES ('{$_POST['id_user']}', '{$_POST['login']}', '{$_POST['password']}')";
    
        $results = mysqli_query($conn3, $sql1);
    
        if ($results === false) {
    
            echo mysqli_error($conn3);
    
        } else {
    
            $id = mysqli_insert_id($conn3);
            echo "Inserted record with ID: $id";
    
        }
    }


?>

<!DOCTYPE html>
<html>
<head>
    <title>LISTA DE VEHICULOS</title>
    <meta charset="utf-8">

    <style>
      
        header{
            border: solid 5px black;
            background-color: yellow;
            margin-bottom: 10px;
            padding: 10px;
            text-align:center;
            margin-left:27%;
            margin-right: 27%;
            margin-top:30px;
        }

        footer{
            border: solid 5px black;
            background-color: turquoise;
            margin-top: 10px;
            padding: 10px;
            text-align:center;
            margin-left:27%;
            margin-right: 27%;
        }

        h2{
            text-align:center;
            color: black;
            background-color: yellow;
            border: solid 4px black;
            margin-left: 170px;
            margin-right: 170px;
        }


        div{

            border: solid black 3px;
            margin-left:27%;
            margin-right: 27%;
            padding: 10px;
        }

        body{
            text-align:center;
            position: absolute;
            top: 60px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-size: cover;
            z-index: 0;
            background-image: url("fototaller.jpg");
            font-family: Verdana, Geneva, Tahoma, sans-serif;

        }

        table{
            padding:5px;
            margin-bottom: 10px;
            text-align: center;
            margin-left: 180px;
            margin-right: 50px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        td{
            padding:5px;
            background-color: white;
            text-align: center;
        }

        tr th{

            background-color:yellow;
            text-align: center;

        }

    </style>
</head>
<body>

    <header>
        <h1>LISTA DE VEHICULOS</h1>
    </header>
 
    <div>
    <main>
        
    <?php if (empty($users)): ?>

        <h2>USUARIO</h2>
        
        <form class = "form" method="POST">

            <p>ID: <input type="text" name = "id_user" id= "id_user"></p>

            <p>Login: <input type = "text" name = "login" id = "login"></p>

            <p>Password: <input type="text" name="password" id = "password"></p>

            <input type = "hidden" value = <?=$id?>>
            <input type = "submit">

        </form>

    <?php else: ?>

        <?php if (empty($users)): ?>

            <p>No hay ningún usuario registrado</p>

        <?php else: ?>

            <h2>USUARIO</h2>
        
            <?php foreach ($users as $usu): ?>

                <p>ID: <input type="text" name = "id_user"
                value = <?= $usu['id_user']; ?>></p>

                <p>Login: <input type = "text" name = "login"
                value = <?= $usu['login']; ?>></p>

                <p>Password: <input type="text" name="password"
                value = <?= $usu['password']; ?>></p>


            <?php endforeach; ?>

        <?php endif; ?>

        <?php foreach ($users as $usu): ?>
            <form action = "CambiarDatosUsuario.php" method = "GET">

                <input type = "hidden" name = "id_user" value = <?= $usu['id_user']; ?>>
                <input type = "submit" value = "EDITAR USUARIO">

            </form>
        <?php endforeach; ?>

        <br>

        <h2>LISTA DE VEHICULOS</h2>

        <form class = "form" action = "HeaderDatosVehiculoListaServicios.php" method = "GET">

            <table border = "3">

                <tr>
                    <th>Matrícula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Combustible</th>
                    <th>Tipo de motor</th>
                </tr>

                <?php foreach ($vehiculos as $veh): ?>
                    <tr>    

                        <td>

                            <p><?= $veh['matricula']; ?></p>

                        </td>

                        <td>

                            <button name = "id_veh" value = <?= $veh['id_veh']; ?> onclick = "window.location.href = 'HeaderDatosVehiculoListaServicios.php';" > <?= $veh['marca']; ?> </button>
                            <input type = "hidden" name = "id_user"  value = <?= $veh['id_user']; ?>>

                            
                    
                        </td>

                        <td>

                            <p><?= $veh['modelo']; ?></p>

                        </td>

                        <td>

                            <p><?= $veh['combustible']; ?></p>
                            
                        </td>

                        <td>

                            <p><?= $veh['tipo_motor']; ?></p>
    
                        </td>

                    </tr>

                <?php endforeach; ?>
            </table>

        </form>

        <?php foreach ($users as $usu): ?>

            <form action = "HeaderDatosVehiculoListaServicios.php" method = "GET">

                <input type = "hidden" name = "id_user" value = <?= $usu['id_user']; ?>>
                <input type = "submit" value = "AÑADIR VEHICULO">

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
