<?php

$matriz1= array(
                array(1,0), 
                array(0,1)
            );

$matriz2= array(
                array(0,1),
                array(1,0));

$resulMatriz= array(
                array(), 
                array());



for ($i=0; $i < count($matriz1); $i++) { 
    for ($j=0; $j <count($matriz1) ; $j++) { 

        $res= $matriz1[$i][$j]+ $matriz2[$i][$j];
        array_push($resulMatriz[$i], $res );
    }
   
}



for ($i=0; $i < 2; $i++) { 
    foreach ($resulMatriz[$i] as $key => $value) {
        echo $value;
        if($key==1){
            echo "<br>";
        }
    }
}


?>