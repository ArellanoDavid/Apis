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
        <div class="container">
        <div class="row">
    <?php
$clave_publica="0b071616448e4e60abf1b91475f3cf96";
$clave_privada="da49fb777144bea3bc36bd6037ea125c5ae2e6bc";
$ts=time();
$hash=md5($ts.$clave_privada.$clave_publica);
echo $hash;
$peticion=curl_init();
curl_setopt($peticion,CURLOPT_URL,'https://gateway.marvel.com:443/v1/public/characters/'.$id.'?ts='.$ts.'&apikey='.$clave_publica.'&hash='.$hash.'');
    

curl_setopt($peticion,CURLOPT_RETURNTRANSFER,true);
$respuesta=curl_exec($peticion);

if(curl_errno($peticion)){
    echo curl_errno($peticion);
}else{
    $respuesta_decodificada = json_decode($respuesta, true);
    $numero_comics = count($respuesta_decodificada["data"]["results"][0]["comics"]["items"]);
    echo '<pre>';
    var_dump($respuesta_decodificada);
    '</pre>';
  
    
    echo'<div class="col-12 col-lg-6 mt-5">
    <h3 class="text-center">Comics de '. $respuesta_decodificada["data"]["results"]["0"]["thumbnail"]["path"].'.'.$respuesta_decodificada["data"]["results"]["0"]["thumbnail"]["extension"]'
    <h1 class="my-4"> Nombre del personaje : </h1>
    <form action="datos.php" method="post">
    <select name="personaje" class="form-select">';

    for($i=0; $i < $limite; $i++){

       echo '<option value="'.$respuesta_decodificada["data"]["results"][$i]["id"].'">'.$respuesta_decodificada["data"]["results"][$i]["name"].'</option>';
 
}

echo '</select>
<div class="d-grid gap-2 mt-3">
<button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>
</div>';
curl_close($peticion);
}
?>

<div class="col"></div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>




     
            