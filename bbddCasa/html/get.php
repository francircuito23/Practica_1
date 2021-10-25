<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vehículos</title>
</head>
<body>
    <style>

        body{
            box-sizing: border-box;
            font-family: 'Titillium Web', sans-serif;
            background-image: url("https://cdn.hobbyconsolas.com/sites/navi.axelspringer.es/public/styles/1200/public/media/image/2013/03/213860-initial-d-llega-su-final.jpg?itok=QOzYuG4o");
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        

        header{
            background: linear-gradient(to bottom, #129bc5, white);
            position: relative;
            text-align: center;
            border-radius: 50px 50px 221px 244px / 25px 25px 100px 100px;
            width: 1000px;
            height: 100px;
            left: 450px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header{
            font-family: Copperplate, Copperplate Gothic Light, fantasy;
            font-size: xx-large;
        }

        h1{
            text-align: center;
        }

        .usuario {
            margin-top: 100px;
            margin-left: 300px;
            width: 343px; 
            height: 400px; 
            border-radius: 8px/7px; 
            background-color: #ebebeb;
            box-shadow: 1px 2px 5px rgba(0,0,0,.31); 
            border: solid 1px #cbc9c9;
            
        }

        form{
            margin-left: 50px;
        }

        input[type=text],input[type=password]{
            width: 200px; 
            height: 39px;
        }

        #name{

            margin-bottom: 15px;
            margin-top: 15px;
            margin-left: 15px;
        }

        #iduser{

            margin-bottom: 15px;
            margin-left: 15px;
        }

        #pass{
            margin-left: 15px;
        }

        input[type='submit'] {
            font-size: 14px;
            font-weight: 600;
            color: white;
            padding: 6px 25px 0px 20px;
            margin: 50px 30px 50px 20px;
            display: inline-block;
            text-decoration: none;
            width: 200px; height: 35px; 
            border-radius: 5px; 
            background-color: #3a57af; 
            box-shadow: 0 3px rgba(58,87,175,.75); 
            top: 0px;
            position: relative;
        }

        input[type='submit']:hover {
            top: 3px;
            background-color:#2e458b;
            box-shadow: none;
            
        }

        .coches{
            position: absolute;
            left: 1100px;
            top: 300px;
        }

        .listaCoches{

            padding: .2em .8em;
            border: 1px solid rgba(16,76,167,1);
            background: rgba(90,156,255,1);
            text-align: left;

        }

        table {
            width: 100%; 
            border-collapse: collapse;
            font-family: "Roboto", helvetica, arial, sans-serif;
            font-weight: 400;
            height: 200px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #dee2e6;
            color: #CADBEA;
            font-size: small;
        }

        th {
            height: 40px;
            text-align: left;
            background-color: #3F464C;
        }

        .añadir{

            display: flex;
            justify-content: right;
            text-align: right;
            margin-right: 500px;
            margin-top: -150px;

        }
        
    </style>

    <header>
        <p class="header"><b>Lista de vehículos</b></p>
    </header>

    <div class="usuario">
            <h1>Datos Usuario</h1>

            <hr>

            <form>

                <?php if (empty($users)) : ?>
                    <p>No hay ningún usuario registrado.</p>
                <?php endif; ?>

                <?php foreach ($users as $usu): ?>

                    <input type="text" name="nombre" id="name" placeholder="Nombre" required value=<?= $usu['Nombre']; ?>>

                    <input type="text" name="login" id="iduser" placeholder="DNI" required value=<?= $usu['DNI']; ?>>
                
                    <input type="password" name="password" id="pass" placeholder="Contraseña" required value=<?= $usu['Pass']; ?>>

                    <input type="submit" name="guardar" value="Guardar Usuario">

                <?php endforeach; ?>

            </form>
    </div>

    <div class="coches">
        
        <table class="listaCoches">
            
            <?php foreach ($users as $usu): ?>

            <tr>

            <th>Matrícula</th>

            <th>Marca</th>

            <th>Modelo</th>

            <th>Color</th>

            <th>Fecha de Compra</th>

            </tr>

            <tr>

            <td><?= $usu['Nombre']; ?></td>

            <td><?= $usu['Nombre']; ?></td>

            <td><?= $usu['Nombre']; ?></td>

            <td><?= $usu['Nombre']; ?></td>

            <td><?= $usu['Nombre']; ?></td>

            </tr>

            <tr>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            </tr>

            <tr>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            <td></td>

            </tr>

            <?php endforeach; ?>

        </table>

    </div>

    <div class="añadir">

        <form action="datosCoches.php">

            <input type="submit" name="coche" value="Añadir vehículo">

        </form>


    </div>
    
</body>
</html>