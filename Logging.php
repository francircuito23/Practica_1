<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGGING</title>

    <style>

        body{
            margin: 0;
            padding: 0;
            background: #fff;

            color: #fff;
            font-family: Arial;
            font-size: 12px;
        }

        .body{

            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
            background-size: cover;
            -webkit-filter: blur(5px);
            z-index: 0;
            
        }

        .grad{
            position: absolute;
            top: -20px;
            left: -20px;
            right: -40px;
            bottom: -40px;
            width: auto;
            height: auto;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
            z-index: 1;
            opacity: 0.7;
        }

        .header{
            position: absolute;
            top: calc(50% - 35px);
            left: calc(50% - 255px);
            z-index: 2;
            margin-top:60px;
        }

        .header div{
            float: left;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 25px;
            font-weight: 200;
        }

        .header div span{
            color: #5379fa !important;
        }

        .login{
            position: absolute;
            top: calc(50% - 75px);
            left: calc(50% - 50px);
            height: 150px;
            width: 350px;
            padding: 10px;
            z-index: 2;
            margin-left: 0px;
        }

        .login input[type=text]{
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
            margin-left: 125px;
        }

        .login input[type=password]{
            width: 250px;
            height: 30px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 2px;
            color: #fff;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 4px;
            margin-top: 10px;
        }

        .login input[type=submit]{
            width: 260px;
            height: 35px;
            background: #fff;
            border: 1px solid #fff;
            cursor: pointer;
            border-radius: 2px;
            color: #a18d6c;
            font-family: 'Exo', sans-serif;
            font-size: 16px;
            font-weight: 400;
            padding: 6px;
            margin-top: 90px;
        }

        .login input[type=button]:hover{
            opacity: 0.8;
        }

        .login input[type=button]:active{
            opacity: 0.6;
        }

        .login input[type=text]:focus{
            outline: none;
            border: 1px solid rgba(255,255,255,0.9);
        }

        .login input[type=password]:focus{
            outline: none;
            border: 1px solid rgba(255,255,255,0.9);
        }

        .login input[type=button]:focus{
            outline: none;
        }

        ::-webkit-input-placeholder{
        color: rgba(255,255,255,0.6);
        }

        ::-moz-input-placeholder{
        color: rgba(255,255,255,0.6);
        }

        .text {
            position: absolute;
            top: 50%; 
            right: 70%;
            transform: 

            
            translate(50%,-50%);
            text-transform: uppercase;
            font-family: verdana;
            font-size: 120px;
            font-weight: 600;

            color: blue;
            text-shadow: 1px 1px 1px #919191,
            1px 2px 1px #919191,
            1px 3px 1px #919191,
            1px 4px 1px #919191,
            1px 5px 1px #919191,
            1px 6px 1px #919191,
            1px 7px 1px #919191,
            1px 8px 1px #919191,
            1px 9px 1px #919191,
            1px 10px 1px #919191,
            1px 18px 6px rgba(16,16,16,0.4),
            1px 22px 10px rgba(16,16,16,0.2),
            1px 25px 35px rgba(16,16,16,0.2),
            1px 30px 60px rgba(16,16,16,0.4);
        }

        p{
            margin-top: 0px;
            margin-left: 120px;
        }

    </style>

</head>
<body>

    <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
            <div>
                <span class="text"> TALLER 
                    <p>JFM</p>
                </span>
            </div>
		</div>
		<br>
		<div class="login">

            <form class = "form" action = "ListadeVehiculos.php" method="GET">

                <input type = "text" name = "id_user" class = "username" placeholder = "Numero de identificación">
                <br>
                <input type = "submit" class = "login" value = "LOGIN">

            </form>
            
		</div>
    <div>
    
</body>
</html>