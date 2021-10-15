
<?php
$db_host = "localhost";
$db_name = "Prueba";
$db_user = "root";
$db_pass = "";

$usu = $_GET["id_user"];

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

echo "Connected successfully.";

$sql = "SELECT * FROM servicio where id_user = $usu";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        header {
            background-color: yellow;
            text-align: center;
            border: 4px solid black;

        }

        footer {
            background-color: turquoise;
            border: 1px solid black;
            text-align: center;
        }

        .hola {
            background-color: turquoise;
            margin-right: 400px;
            margin-left: 400px;
        }

        main {
            text-align: center;
        }

        h3 {
            text-align: center;
        }

        div {
            border: 4px solid black;
            margin-top: 5%;
            margin-bottom: 5%;
            margin-left: 27%;
            margin-right: 27%;
        }
    </style>
</head>

<body>
    <div>
        <header>
            <h2>Header</h2>
        </header>

        <main>

            <?php if (empty($users)) : ?>
                <p>No hay ningún usuario registrado</p>
            <?php endif; ?>

            <form>
                <?php foreach ($users as $usu) : ?>
                    <h3>Nombre de Usuario </h3>
                    <h3 class="hola">Vehículo</h3>
                    <p>Matrícula<input type="text" name="Matrícula" placeholder="Matrícula" value=<?= $usu['Matrícula']; ?>></p>
                    <p>Marca<input type="text" name="Marca" placeholder="Marca" value=<?= $usu['Marca']; ?>></p>
                    <p>Modelo<input type="text" name="Modelo" placeholder="Modelo" value=<?= $usu['Modelo']; ?>></p>
                    <h3 class="hola">Servicio </h3>
                    <p>Tipo de servicio<input type="text" name="Tipo de servicio" placeholder="tipo de servicio" value=<?= $usu['Tipo de servicio']; ?>></p>
                    <p>fecha<input type="date" name="fecha" value=<?= $usu['Fecha']; ?>></p>
                    <p>Descripción<input type="text" name="Descripción" placeholder="Descripción" value=<?= $usu['Descripción']; ?>></p>

                <?php endforeach; ?>

                <input type="submit" value="Guardar">


            </form>

        </main>
        <br>
        <footer>

            <h2>Footer</h2>

        </footer>
    </div>
</body>

</html>