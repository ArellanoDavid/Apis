<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilos.css" />
        <link rel="shortcut icon" href="img/favicon.jpg" />
        <title>EJERCICIO IP</title>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
       
          
    </head>
    <body>
    <?php

    if (isset($_POST['ip'])) {
      $ip = $_POST['ip'];
      $peticion = curl_init();
      curl_setopt($peticion,CURLOPT_URL,'http://ipwho.is/' .$ip);
      curl_setopt($peticion,CURLOPT_RETURNTRANSFER,true);
      $respuesta = curl_exec($peticion);
      if(curl_errno($peticion)){
          echo curl_errno($peticion);
      }else{
          $respuesta_decodificada = json_decode($respuesta, true);
          echo "<div class='form-container'>";
          echo "<p>Continente de la ip : " . $respuesta_decodificada["continent"] . "</p>";
          echo "<p>El pais es : " . $respuesta_decodificada["country"] . "</p>";
          echo "<p>La ciudad es : " . $respuesta_decodificada["city"] . "</p>";
          
          echo "IP : {$_SERVER['REMOTE_ADDR']}";
          echo "<br>";
          echo "<br>";
          echo "<img class='flag-img' src=" . $respuesta_decodificada["flag"]["img"] . ">";
          echo "</div>";

          curl_close($peticion);
      }
    }
    ?>
    <a href="index.php"class="btn">VOLVER</a>
            
    </body>
    </html>