<?php
class Consultas
{
    public static function CrearTabla()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $conexion = mysqli_connect($host, $user, $password) or die("Conexion incorrecta");//conexion a el servidor



        $sql = "CREATE DATABASE IF NOT EXISTS usuarioBD";//consulta aql para ejecutar

        $tablacrear = "CREATE TABLE IF NOT EXISTS USUARIOS( USUARIO varchar(30) PRIMARY KEY, CLAVE varchar(1000));";//consulta aql para ejecutar

        $tablamusica = "CREATE TABLE IF NOT EXISTS MUSICA( ID INT AUTO_INCREMENT PRIMARY KEY, CANCION varchar(100), AUTOR VARCHAR(100), GENERO VARCHAR(20));";//consulta aql para ejecutar

        mysqli_query($conexion, $sql) or die("BaseDeDatos no creada");

        mysqli_select_db($conexion, "usuarioBD") or die("No se encontro la bd");

        mysqli_query($conexion, $tablacrear) or die("No se pudo crear la tabla");

        mysqli_query($conexion, $tablamusica) or die("No se pudo crear la tabla");

        mysqli_close($conexion);
    }



    public static function Insertar($usuario, $clave)
    {

        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "usuarioBD";

        $conexion = mysqli_connect($host, $user, $password, $database) or die("Conexion incorrecta");//conexion a la base de datos

        $HashPassword = password_hash($clave, PASSWORD_DEFAULT);//funcion para hashear una contraseña de manera default

        $consultainsertar = "INSERT INTO USUARIOS VALUES(?,?)";

        $stmtInsertar = mysqli_prepare($conexion, $consultainsertar);//prepara consulta para ser utilizada

        mysqli_stmt_bind_param($stmtInsertar, "ss", $usuario, $HashPassword);//pone los parametros en la consulata preparada

        mysqli_stmt_execute($stmtInsertar);//ejecutar la consulta preparada

        mysqli_stmt_close($stmtInsertar);//cerrar consulta
        mysqli_close($conexion);//cerrar conexion

    }


    public static function ExisteRegistro($usuario)
    {

        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "usuarioBD";
        $conexion = mysqli_connect($host, $user, $password, $database) or die("Conexion incorrecta");
        $Existe = false;


        $consultausuario = "SELECT * FROM USUARIOS WHERE USUARIO=?";
        $stmtUsuario = mysqli_prepare($conexion, $consultausuario) or die("Error");//prepara consulta para ser utilizada
        mysqli_stmt_bind_param($stmtUsuario, "s", $usuario) or die("Error");
        mysqli_stmt_execute($stmtUsuario);

        mysqli_stmt_store_result($stmtUsuario);//guardar el resultado en memoria y ser usado

        if (mysqli_stmt_num_rows($stmtUsuario) > 0) {//funcion para saber cuantas filas tiene el resultado
            $Existe = true;
        }
        mysqli_stmt_close($stmtUsuario);



        mysqli_close($conexion);

        return $Existe;
    }




    public static function ComprobarInicio($usuario, $clave)
    {

        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "usuarioBD";

        $conexion = mysqli_connect($host, $user, $password, $database) or die("Conexion incorrecta");
        $Existe = false;

        // Utilizar una consulta preparada
        $consulta = "SELECT CLAVE FROM USUARIOS WHERE USUARIO=?";
        $stmt = mysqli_prepare($conexion, $consulta);
        // Vincular parámetros
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $columnaHash,);//asignarle un nombre a la zelda de cada valor para usarlo


        // Obtener resultados
        mysqli_stmt_fetch($stmt);//ir fila por fila en el resultado
        
        if (password_verify($clave, $columnaHash)) {//comprobar si la contraseña es igual al hasheo 
            $Existe = true;
        }

        // Cerrar la consulta preparada
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);

        return $Existe;
    }
    

    public static function añadirmusica($musica, $autor, $genero)
    {
        echo $genero . "generoooo";
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "usuarioBD";
        $conexion = mysqli_connect($host, $user, $password, $database) or die("Conexion incorrecta");


        $consultainsertar = "INSERT INTO MUSICA (CANCION,AUTOR,GENERO) VALUES(?,?,?)";

        $stmtInsertar = mysqli_prepare($conexion, $consultainsertar);

        mysqli_stmt_bind_param($stmtInsertar, "sss", $musica, $autor, $genero);

        mysqli_stmt_execute($stmtInsertar);

        mysqli_stmt_close($stmtInsertar);
        mysqli_close($conexion);
    }











    public static function eliminar($id)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "usuarioBD";

        $conexion = mysqli_connect($host, $user, $password, $database) or die("conexion incorrecta");
        $consulta = "DELETE FROM MUSICA WHERE ID=$id";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        mysqli_stmt_close($stmt);

        mysqli_close($conexion);
    }








    public static function MostrarTabla()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "usuarioBD";

        $conexion = mysqli_connect($host, $user, $password, $database) or die("conexion incorrecta");
        $consulta = "SELECT * FROM MUSICA";

        $Stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_execute($Stmt);
        mysqli_stmt_store_result($Stmt);
        mysqli_stmt_bind_result($Stmt, $id, $cancion, $autor, $genero,);

        while (mysqli_stmt_fetch($Stmt)) {

            echo "<tr onclick='sacarId(this)'>";
            echo "<td style='color:yellow;'>$id</td>";
            echo "<td>$cancion</td>";
            echo "<td>$autor</td>";
            echo "<td>$genero</td>";
            echo "<td><form method='post' action='../consultas/eliminar.php'> <button name='id' value='$id' class='btn '><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
            <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
          </svg>
          </button></form></td>";
            echo "</tr>";
        }

        mysqli_stmt_close($Stmt);


        mysqli_close($conexion);
    }

    public static function Update($id, $cancion, $autor, $genero)
    {

        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "usuarioBD";
        $conexion = mysqli_connect($host, $user, $password, $database) or die("error");
        $sql = "UPDATE MUSICA SET CANCION=?, AUTOR=?, GENERO=? WHERE ID=?";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "sssi", $cancion, $autor, $genero, $id);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        mysqli_close($conexion);
    }
}
