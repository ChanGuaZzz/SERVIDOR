<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRACTICAPHP</title>
    <style>
        body{
            background-color: darkolivegreen;
        }
        #cont{
            text-align: center;
            margin: 5% 5% 5% 5%;
            border: 1px solid black;
            border-radius: 30px ;
            background-color: lightslategrey;
            box-shadow: 6px 6px 6px black;
        }
        hr{
            margin-left: 5%;
            margin-right: 5%;
        }
        .titulos{
            font-weight: bold;
        }
        p{
            margin: 1%;
        }
    </style>
</head>
<body>
    <div id="cont">
    <h1 style=" color: white;" >PRACTICA TEMA 2 SERVIDOR</h1>
    <?
    $string1= "Hola";
    $string2= "Mundo";

    $concatenacion= $string1." ".$string2;
    echo "<p class=\"titulos\">EJERCICIO 1</p>";
    echo $concatenacion;
    echo "<br> <hr>";

    $boolean1= true;
    echo $boolean1;
    echo "<br> <hr>";

    $float1 = 3.14;
    echo $float1;
    echo "<br> <hr>";
    
    $array1= array("valor1"=> "1","valor2"=> "2","valor3"=> "3",);
    print_r($array1);
    echo "<br> <hr>";





echo "<p class=\"titulos\">EJERCICIO 2</p>";
    $boolean1=false;
    echo $boolean1;
    echo "<br> ";
    echo "<p>esto sucede ya que cuando un booleano es falso no se muestra nada</p>";
    echo " <hr>";
    
    echo "<p class=\"titulos\">EJERCICIO 3</p>";

    $concatenacion= str_replace(" ", "", $concatenacion);
     echo $concatenacion;
     echo "<br> <hr> ";
     echo "<p class=\"titulos\">EJERCICIO 4</p>";

     echo "<p>El operador \"+\" sirve para sumar el valor de variables. Con la \"/\"podemos
      dividir valores entre variables. El símbolo del dólar \"$\" indica que estamos
      utilizando variables pero no lo usaremos en las constantes o globales.</p>";

     echo "<br> <hr> ";
     echo "<p class=\"titulos\">EJERCICIO 5</p>";
     $texto= "El operador \"+\" sirve para sumar el valor de variables. Con la \"/\"podemos
     dividir valores entre variables. El símbolo del dólar \"$\" indica que estamos
     utilizando variables pero no lo usaremos en las constantes o globales.";
     $longitud= strlen($texto);
     echo  "hay ". $longitud ." de longitud en el texto";

     echo "<br> <hr> ";
     echo "<p class=\"titulos\">EJERCICIO 6</p>";
     $vocales= array("a","e","i","o","u");
     $mensaje="HelloWorld";
     $sinvocales= str_replace($vocales,"",$mensaje );
     echo $sinvocales;
     echo "<br> <hr> ";
     echo "<p class=\"titulos\">EJERCICIO 7</p>";

     $null=null;
     $boolean2=is_null($null);
     echo $boolean2;

     echo "<br> <hr> ";
     echo "<p class=\"titulos\">EJERCICIO 8</p>";

     $mensaje= intval($mensaje);
     echo $mensaje;
     echo "<p>el resultado es 0 ya que la variable al ser un string no tiene posibilidad de convertirse a un valor entero y se queda la base de la funcion en 0</p>";
     
     echo "<br> <hr> ";
     echo "<p class=\"titulos\">EJERCICIO 9</p>";

     $raiz= sqrt(144);//se utiliza una funcion para la raiz
     echo "La raíz cuadrada de 144 es ".$raiz;
     echo "<br> <hr>";

     $potencia = pow(2,8);//se utiliza una funcion para la potencia
    echo "La potencia 2^8 es ".$potencia;
    echo "<br> <hr>";

    $resto = 100%6;//se utiliza el operador aritmetico %
    echo "El resto de la división de 100/6 es ". $resto;
    echo "<br> <hr>";

    

    /*$arrayvalor1= [];
    print_r ($arrayvalor1);
    echo "<br>";
    $arrayvalor1[]=66;
    print_r ($arrayvalor1);
    echo "<br>";
    $arrayvalor1[]=68;
    print_r ($arrayvalor1);

*/

    function MCD($valor1, $valor2){

        if ($valor1 == 0) {
			return $valor2;
		}
		return MCD($valor2%$valor1, $valor1);
    }//Función recursiva. Euclides
    
    echo "El máximo común divisor de 3 y 6 es ". MCD(3,6);;
    echo "<br> <hr>";
    
     


     

    
  



;



    ?>
    </div>
    
</body>
</html>