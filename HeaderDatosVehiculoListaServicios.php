
<?php

    $db_host = "localhost";
    $db_name = "practica1";
    $db_user = "Practica_1.php";
    $db_pass = "BICHOTA123";
    
    $usu = $_GET["id_user"];

    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if (mysqli_connect_error()) {

        echo mysqli_connect_error();

        exit;
    }

    echo "Connected successfully.";

    $sql = "SELECT * FROM vehiculos where id_user = $usu";

 
    $results = mysqli_query($conn, $sql);
 
    if ($results === false) {

        echo mysqli_error($conn);

    } else {

        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);

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
          margin-bottom: 4px;
          padding: 10px;
          text-align:center;
        }

    </style>
</head>
<body>

    <header>
        <h1>DATOS DE VEHICULO Y LISTA DE SERVICIOS</h1>
    </header>
 
    <main>

        <?php if (empty($users)): ?>

            <p>No hay ningún usuario registrado</p>

        <?php else: ?>
            <ul>
                <?php foreach ($users as $usu): ?>
                
                    <id_user><?= $usu['id_user']; ?></id_user>
                    <br>
                    <id_user><?= $usu['marca']; ?></id_user>
                    <br>
                    <id_user><?= $usu['modelo']; ?></id_user>
                    <br>
                    <id_user><?= $usu['matricula']; ?></id_user>
                    <br>
                    <id_user><?= $usu['combustible']; ?></id_user>
                    <br>
                    <id_user><?= $usu['tipo_motor']; ?></id_user>

                <?php endforeach; ?>
            </ul>
        <?php endif; ?>


        <h2>VEHÍCULO</h2>
        
        <form>

            <p>Nombre: <input type="text" name = "id_user" placeholder = "NOMBRE DE USUARIO" 
            value = <?= $usu['id_user']; ?>>
            </p>

            <p>Matrícula: <input type = "text" name = "id_vehiculo" placeholder = "MATRÍCULA" 
            value = <?= $usu['matricula']; ?>></p>

            <p>Marca: <input type="text" name="entrada3" placeholder = "MARCA" 
            value = <?= $usu['marca']; ?>></p>
            
            <p>Modelo: <input type="text" name="entrada4" placeholder = "MODELO" 
            value = <?= $usu['modelo']; ?>></p>
            
            <p>Combustible: <input type="text" name="entrada5" placeholder = "COMBUSTIBLE" 
            value = <?= $usu['combustible']; ?>></p>
            
            <p>Tipo de motor: <input type="text" name="entrada6" placeholder = "TIPO DE MOTOR" 
            value = <?= $usu['tipo_motor']; ?>></p>

            <input type="submit" value="GUARDAR">

        </form>

        <br>
        <br>

        <h2>LISTA DE SERVICIOS</h2>

        <select name="servicios" id = "">

            <option value = "1">Cambio de aceite</option>

            <option value = "2">Cambio de freno</option>

             <option value = "3">Pinchazo</option>

        </select>

        <br>
        <br>
            
        <input type="submit" value="AÑADIR">

    </main>

    <footer>


    </footer>
</body>
</html>
