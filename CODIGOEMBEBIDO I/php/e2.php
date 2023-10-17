<?php

$precio= $_POST['preciototal'];
switch (true) {
    case $precio>100:
       echo "envio: gratis";
        break;
    case $precio>75:
       echo "envio: 1,95€";
        break;
    
    case $precio>50:
       echo "envio: 2,95€";
        break;
                
    default:
    echo "envio: 3,95";
        break;
} 
?>