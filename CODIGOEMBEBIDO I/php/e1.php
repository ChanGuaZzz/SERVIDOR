<?php

$precio= $_POST['preciototal'];

if($precio>100){
    echo "envio: gratis";
}elseif($precio>75){

echo "envio: 1,95€";
}elseif($precio>50){

    echo "envio: 2,95€";
}else{
    echo "envio: 3,95";
}


?>