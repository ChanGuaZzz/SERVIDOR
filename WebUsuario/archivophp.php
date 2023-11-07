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
        session_start();//se crea la session apenas entra a esta web para usar los valores de session
        
        
        if (isset($_POST["user"])&&isset($_POST["pass"])){//condicion para saber si los valores que se pasaron desde el html estan definidos, sí lo estan se guardan en el array asociativo de session
            
            $_SESSION["usuario"]=$_POST["user"];
            $_SESSION["clave"]=$_POST["pass"];

        }//este if se utiliza para crear solo una vez los valores en el array asociativo ya que cuando se vuelve a entrar a esta pagina ya no existiria las variables user y pass
    
        

        


if ( $_SESSION["usuario"] == "admin" && $_SESSION["clave"] == 1234 ||  $_SESSION["usuario"] == "cliente1" && $_SESSION["clave"] == 1234  ) {//condicion para verificar si los valores que el usuario puso en el login son correctas
    $fecha = date("Y-m-d H:i:s");//fechas de el momento en el que se ejecuta
    echo $fecha;//imprime
?>
    <h1 class="mt-3">Bienvenido</h1>

    <form action="archivophp.php" method="post"> <input class="btn btn-info mt-5" type="submit" name="ruta" value="Conocer la ruta actual"></form><!-- formulario que envia los valores a este mismo php para que se ejecute el la condicion de abajo-->
    <br>
    <?php
    if (isset($_POST["ruta"])) {//condicion para verificar si se pulso el boton para ejecutar la funcionalidad
        $ruta = getcwd();//funcion que devuelve la ruta actual

        echo $ruta . "<br>";
    }
    ?>
    <form action="archivophp.php" method="post"><!-- formulario que envia los valores a este mismo php para que se ejecute el la condicion de abajo-->
        <input type="text" name="buscar" id="buscar" placeholder="Archivo.extension"> <br><input class="btn btn-info mt-2" type="submit"  value="Buscar archivo"></form>
    <?php
        
    if (isset($_POST["buscar"])) {//condicion para verificar si se pulso el boton y se enviaron los valores  para poder ejecutar la funcionalidad de buscar
        $rutactual = getcwd();
        $archivos= scandir($rutactual);//funcion para escanear los archivos de el directorio actual y devuelve un array con aquellos archivos
        if (in_array($_POST["buscar"], $archivos)) {//condicion para verificar si lo que quiere buscar el usuario esta en el array de los archivos de la ruta actual
            
            echo "<p>Archivo encontrado : ". $_POST["buscar"]." </p>";
        }else{//si no se encuentra
            echo "<p>Archivo NO encontrado</p>";

        }  
    }
    if ( $_SESSION["usuario"] == "admin"){//condicion para verificar si el usuario es admin o no, sí es admin muestra la opcion de crear archivo, si no es admin no muestra nada
    ?>

    <form action="archivophp.php" method="post"><!-- formulario que envia los valores a este mismo php para que se ejecute el la condicion de abajo-->
         <input type="text" name="crear" id="crear" placeholder="Archivo.extension"> 
         <br>
         <input class="btn btn-info mt-2" type="submit" value="Crear archivo">
        </form>
    
    <?php
        
    if (isset($_POST["crear"])) {//condicion para verificar si se pulso el boton y se enviaron los valores  para poder ejecutar la funcionalidad de buscar
        $archivo=$_POST["crear"];
        $abrir= fopen($archivo,"a+");  //funcion para abrir el archivo que pones en el primer parametro, el segundo parametro son los permisos al abrir el archivo en este caso a+ es lectura, escritura y si el archivo no existe se crea, si existe escribe con el puntero al final
        fwrite($abrir,"CREADO NUEVO FICHERO ");//escribir en el fichero que pones como primer parametro
        echo"<p>Archivo Creado</p>";
        fclose($abrir);//cierra el fichero para no haber errores
    }
}
    ?>

    <a class="btn btn-dark mt-2" href="webLogin.php">Volver</a>
<?php
} else {
?>
    <h1 class="mt-5">LOGIN ERRONEO</h1>

    <a class="btn btn-dark mt-5" href="webLogin.php">Volver</a>
<?php
}

?>


        </div>

    </div>
</body>

</html>