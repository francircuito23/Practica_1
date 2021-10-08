<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="servicio.css">
</head>

<body>
    <?php
    $db_host = "localhost";
    $db_name = "Practica1";
    $db_user = "Practica_1.php";
    $db_pass = "BICHOTA123";

    $usu = $get["id_user"];
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    //viem
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    
    echo "Connected successfully.";
 
    $sql = "SELECT *
            FROM user
            ORDER BY date_entry;";
 
    $results = mysqli_query($conn, $sql);
 
    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
 
        print_r($users);
    }
 


    ?>
    <div>
        <header>
            <h2>Header</h2>
        </header>
        <main>
            <form method="get" action="index.php">
                <h3>Nombre de Usuario </h3>
                <h3 class="hola">Vehículo</h3>
                <input type="text" name="Matrícula" placeholder="Matrícula">
                <input type="text" name="Marca" placeholder="Marca">
                <input type="text" name="Modelo" placeholder="Modelo">
                <h3 class="hola">Servicio </h3>
                <input type="text" name="Tipo de servicio" placeholder="tipo de servicio">
                <input type="date" name="fecha">
                <input type="text" name="Descripción" placeholder="Descripción">
                <input type="submit" value="guardar">
            </form>

        </main>
        <br>
        <footer>

            <h2>Footer</h2>

        </footer>
    </div>
</body>

</html>