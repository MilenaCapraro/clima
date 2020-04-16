<?php
require './Classes/OpenWheatherApi.php';
$openWheater = new OpenWheatherApi();
$clima = $openWheater->getClima();
?>

<html>
    <head>
        <title>Brusque Notícias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/layout.css" rel="stylesheet" type="text/css">

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    </head>
    <body style="background-color: #F5F5F5">

        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Portal de Notícias</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Clima</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" >Previsões do Tempo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mais</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="#">Avisos</a>
                                <a class="dropdown-item" href="#">Chuvas</a>
                                <a class="dropdown-item" href="#">Entre em contato</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-md-0">
                        <input class="form-control" type="text" placeholder="Pesquise">
                    </form>
                </div>
            </nav>
        </header>
        <br>
        <!--Fim do menu-->

        <main role="main">
            <ul mr-auto>
                <span>Visitas <?php echo $clima->visitas?></span>
            </ul>
               
            
            <div class="container-fluid text-center" >
                <h3>Tempo real em <?php echo $clima->cidade ?></h3>
                <h4>Código da cidade - <?php echo $clima->codCidade ?></h4>
                
                <div class="container">
                    <div class="card" >

                        <div class="card" style="background-color: #C0E5F6">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p id="a">Temperatura:</p>
                                </div>
                                <br>

                                <div class="col col-md-4">
                                    <img class="rounded-circle" width="100" height="100" src="img/c.png"/>   
                                    <h2><?php echo $clima->getTemperaturaCelsius() ?>ºC</h2>
                                    <h2>Celcius</h2>
                                </div>

                                <div class="col col-md-4">
                                    <img class="rounded-circle" width="100" height="100" src="img/f.png"/>   
                                    <h2><?php echo $clima->getTemperaturaFahrenheit() ?>ºF</h2>
                                    <h2>Fahrenheit</h2>
                                </div>

                                <div class="col col-md-4">
                                    <img class="rounded-circle" width="100" height="100" src="img/k.png"/>   
                                    <h2><?php echo $clima->temperatura ?>º</h2>
                                    <h2>Kelvin</h2>
                                </div>
                            </div>
                        </div>

                        <div class="card" style="background-color:#C0E5F6">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <p id="a">Descrição do clima: <?php echo $clima->descricao ?></p>
                                </div>
                                <br>

                                <div class="col col-md-4 ">
                                    <img class="rounded-circle" width="100" height="100" src="img/umidade.png"/>   
                                    <h2><?php echo $clima->humidade ?>%</h2>
                                    <h2>Umidade</h2>
                                </div>

                                <div class="col col-md-4 ">
                                    <img class="rounded-circle" width="100" height="100" src="img/pressao.png"/>   
                                    <h2><?php echo $clima->pressao ?>%</h2>
                                    <h2>Pressão do ar:</h2>
                                </div>

                                <div class="col col-md-4 ">
                                    <img class="rounded-circle" width="100" height="100" src="img/vento.png">   
                                    <h2><?php echo $clima->velocidadeVento ?>km/h</h2>
                                    <h2>Velocidade do vento:</h2>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </body>
</html>
