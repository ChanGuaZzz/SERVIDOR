<?php
class Consultas
{
    public static function CrearTabla()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $conexion = mysqli_connect($host, $user, $password) or die("Conexion incorrecta");



        $sql = "CREATE DATABASE IF NOT EXISTS usuarioBD";

        $tablacrear = "CREATE TABLE IF NOT EXISTS USUARIOS( USUARIO varchar(30) PRIMARY KEY, CLAVE varchar(1000));";

        $tablamusica = "CREATE TABLE IF NOT EXISTS MUSICA( ID INT AUTO_INCREMENT PRIMARY KEY, CANCION varchar(100), AUTOR VARCHAR(100), GENERO VARCHAR(20));";

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
        $conexion = mysqli_connect($host, $user, $password, $database) or die("Conexion incorrecta");
        $HashPassword = password_hash($clave, PASSWORD_DEFAULT);

        $consultainsertar = "INSERT INTO USUARIOS VALUES(?,?)";

        $stmtInsertar = mysqli_prepare($conexion, $consultainsertar);

        mysqli_stmt_bind_param($stmtInsertar, "ss", $usuario, $HashPassword);

        mysqli_stmt_execute($stmtInsertar);

        mysqli_stmt_close($stmtInsertar);
        mysqli_close($conexion);
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
        $stmtUsuario = mysqli_prepare($conexion, $consultausuario) or die("Error");
        mysqli_stmt_bind_param($stmtUsuario, "s", $usuario) or die("Error");
        mysqli_stmt_execute($stmtUsuario);

        mysqli_stmt_store_result($stmtUsuario);

        if (mysqli_stmt_num_rows($stmtUsuario) > 0) {
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

        mysqli_stmt_bind_result($stmt, $columnaHash);
        // Obtener resultados
        mysqli_stmt_fetch($stmt);

        if (password_verify($clave, $columnaHash)) {
            $Existe = true;
        }

        // Cerrar la consulta preparada
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);

        return $Existe;
    }
    public static function recolectarDatos($usuario)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "usuarioBD";

        $conexion = mysqli_connect($host, $user, $password, $database) or die("Conexion incorrecta");
        $consulta = "SELECT * FROM USUARIOS WHERE USUARIO=?";
        $stmtRecolectar = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmtRecolectar, "s", $usuario);
        mysqli_stmt_execute($stmtRecolectar);
        mysqli_stmt_store_result($stmtRecolectar);

        mysqli_stmt_bind_result($stmtRecolectar, $columna1, $columnaNN, $columna3, $columna4, $columna5, $columna6, $columna7);

        mysqli_stmt_fetch($stmtRecolectar);

        $_SESSION["usuario"] = $columna1;
        $_SESSION["email"] = $columna3;
        $_SESSION["nombre"] = $columna4;
        $_SESSION["telefono"] = $columna5;
        $_SESSION["direccion"] = $columna6;
        $_SESSION["sexo"] = $columna7;

        mysqli_stmt_close($stmtRecolectar);
        mysqli_close($conexion);
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
