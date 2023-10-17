<?php

$num1= $_POST['num1'];
$num2= $_POST['num2'];
$num3= $_POST['num3'];
$num4= $_POST['num4'];
$num5= $_POST['num5'];


$arraynum= array($num1,$num2,$num3,$num4,$num5);
$longitud=count($arraynum);
$mayor=0;
for ($i=0; $i < $longitud ; $i++) { 
    if($mayor<$arraynum[$i]){
        $mayor=$arraynum[$i];
       
    
}
}
echo $mayor;

?>