<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    $to="dcs0008@alu.medac.es";
    $from= "administrador@alu.medac.es";
    $subject= "Daw Suspendido";
    $message= "Has suspendido el curso Daw por no volver a asistir a clases";
    $headers="From:".$from ;


    mail($to,$subject,$message,$headers);
    ?>
</body>
</html>