<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        body {
            background: fixed url(img/fondo.jpg);
            background-size: cover;

        }

        .bg-trans {
            background-color: rgba(0, 0, 0, 0.295);
            backdrop-filter: blur(10px);
        }

        label {
            color: white;
        }
        .login{
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    session_destroy();
    ?>
    <div class="container-fluid mx-auto pt-5">

        <div class="container bg-trans h-50 w-25 text-center mt-5 login pt-3">
            <h1 class=" text-white mb-5  ">Login</h1>

            <form action="archivophp.php" method="post"><!-- formulario que envia los valores a archivo.php-->


                <div class="input-group mb-3 w-50 mx-auto mb-5">
                    <span class="input-group-text bg-dark text-white" id="basic-addon1">@</span>
                    <input name="user" type="text" class="form-control " placeholder="Username" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3 w-50 mx-auto mb-5">
                    <span class="input-group-text bg-dark text-white" id="basic-addon1">*</span>
                    <input name="pass" type="password" class="form-control" placeholder="password" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>

                <input class="btn btn-dark" type="submit" name="submit" value="Logear">
            </form>

            <h3 class=" text-white">Session</h3>
            <p class=" text-white">Las sesiones son muy importantes a la hora de trabajar con entornos personalizados,
                 estas son espacios el cual se guarda informacion de el usuario mientras no se destruya
                  aquella sesion, podemos guardar aquella informacion en el array asociativo $_SESSION[],
                   con las sesiones podemos seguir teniendo lo svalores guardados pasando de navegador</p>
                   <h3 class=" text-white">Cookies</h3>
            <p class=" text-white">Las cookies es informacion el cual se almacenan preferencias e informacion
                 del usuario para mostrar contenido personalizado para el, aquellas cookies se guarda en el
                  dispositivo del usuario</p>

        </div>

    </div>

</body>

</html>