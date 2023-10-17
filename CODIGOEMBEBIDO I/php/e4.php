<?php

$matriz = array("a11" => 3, "a12" => 1, "a21" => 2, "a22" => 0);

foreach ($matriz as $key => $value) {
    echo $value . " ";
    if ($key == "a12") {
        echo "<br>";
    }
}

?>