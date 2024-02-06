<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EJERCICIO PAISES</title>
        <!-- Agrega Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
       
          


        
        <style>
            .card {
                border: 1px solid black;
                background-color: #D3D3D3;
                margin-bottom: 20px; 
            }
            .card-body {
                padding: 20px; 
            }
            .card-title {
                text-align: center; 
                animation: fadeIn 2s; 
            }
            .card-img-top {
                width: 100%; 
                margin-bottom: 10px; 
            }
            .card-img-top {
                transition: all 0.5s ease;
            }
            .card-img-top:hover {
                transform: scale(1.1); /* Aumenta un poco el tamaño de la imagen al pasar el cursor */
            }
            @keyframes fadeIn {
                from {opacity: 0;}
                to {opacity: 1;}
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center my-4">Países del Mundo</h1>
            <div class="row">
                <?php
                $url = 'https://restcountries.com/v3/all';
                $data = file_get_contents($url);
                $countries = json_decode($data, true);

                if ($countries) {
                    foreach ($countries as $country) {
                        ?>
                      
                        <div class="col-sm-12 col-md-6 mb-4 col-lg-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $country['name']['common'] ?></h5>
                                    <img class="card-img-top" src="<?= $country['flags'][0] ?>" alt="<?= $country['name']['common'] ?>">
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No se pudieron cargar los datos de los países.";
                }
                ?>
            </div>
        </div>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

       
       