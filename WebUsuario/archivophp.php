<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            background: fixed url(img/fondo.jpg);
            background-size: cover;

        }

        .bg-trans {
            background-color: rgba(0, 0, 0, 0.295);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body>
    <div class="container-fluid mx-auto pt-5">

        <div class="container bg-trans h-75 w-100 text-white text-center mt-5 login pt-3">



        <?php

if (isset($_POST["user"]) && $_POST["user"] == "admin" && isset($_POST["pass"]) && $_POST["pass"] == 1234 || isset($_POST["ruta"])||isset($_POST["buscar"])|| isset($_POST["crear"])) {
    $fecha = date("Y-m-d H:i:s");
    echo $fecha;
?>
    <h1 class="mt-3">Bienvenido</h1>

    <form action="archivophp.php" method="post"> <input class="btn btn-info mt-5" type="submit" name="ruta" value="Conocer la ruta actual"></form>
    <br>
    <?php
    if (isset($_POST["ruta"])) {
        $ruta = getcwd();

        echo $ruta . "<br>";
    }
    ?>
    <form action="archivophp.php" method="post">
        <input type="text" name="buscar" id="buscar" placeholder="Archivo.extension"> <br><input class="btn btn-info mt-2" type="submit"  value="Buscar archivo"></form>
    <?php
        
    if (isset($_POST["buscar"])) {
        $rutactual = getcwd();
        $archivos= scandir($rutactual);
        if (in_array($_POST["buscar"], $archivos)) {
            $posicion= array_search($_POST["buscar"], $archivos);
            echo "<p>Archivo encontrado : ". $archivos[$posicion]."</p>";
        }else{
            echo "<p>Archivo NO encontrado</p>";

        }  
    }
    ?>

    <form action="archivophp.php" method="post"> <input type="text" name="crear" id="crear" placeholder="Archivo.extension"> <br><input class="btn btn-info mt-2" type="submit" value="Crear archivo"></form>
    
    <?php
        
    if (isset($_POST["crear"])) {
        $archivo=$_POST["crear"];
        $abrir= fopen($archivo,"a+");  
        fwrite($abrir,"CREADO NUEVO FICHERO ");
        echo"<p>Archivo Creado</p>";
        fclose($abrir);
    }
    ?>

    <a class="btn btn-dark mt-2" href="webLogin.html">Volver</a>
<?php
} else {
?>
    <h1 class="mt-5">LOGIN ERRONEO</h1>
    <a class="btn btn-dark mt-5" href="webLogin.html">Volver</a>
<?php
}

?>


        </div>

    </div>
</body>

</html>