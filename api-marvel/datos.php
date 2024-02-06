<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/estilos.css" />
         <link rel="shortcut icon" href="img/favicon.jpg" />
        <title>EJERCICIO MARVEL</title>
        <!-- Agrega Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  
    </head>
    <body>

    <?php
$clave_publica="0b071616448e4e60abf1b91475f3cf96";
$clave_privada="da49fb777144bea3bc36bd6037ea125c5ae2e6bc";
$ts=time();
$hash=md5($ts.$clave_privada.$clave_publica);
echo $hash;
$peticion=curl_init();



if (isset($_POST['personaje'])) {
  $id = $_POST['personaje'];
  $peticion = curl_init();
  curl_setopt($peticion,CURLOPT_URL,'https://gateway.marvel.com:443/v1/public/characters?ts='.$id);
  curl_setopt($peticion,CURLOPT_RETURNTRANSFER,true);
  $respuesta = curl_exec($peticion);
  if(curl_errno($peticion)){
      echo curl_errno($peticion);
  }else{

      $respuesta_decodificada = json_decode($respuesta, true);
      $numero_commics = count($respuesta_decodificada["data"]["results"][0]["name"]["items"]);
echo '<pre>;
var






      echo "<div class='form-container'>";
      echo "<p>Nombre del frikazo : " . $respuesta_decodificada["data"] . "</p>";
      echo "<p> : " . $respuesta_decodificada["results"] . "</p>";
      echo "<p>: " . $respuesta_decodificada["id"] . "</p>";
      
      

      curl_close($peticion);
  }
}
?>
<a href="index.php"class="btn">VOLVER</a>
        







    </body>
    </html>