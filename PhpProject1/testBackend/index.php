<?php
/**
 * Created by PhpStorm.
 * User: karenlaguna
 * Date: 27/04/18
 * Time: 3:42 PM
 */

$url = "http://190.144.246.137/Webservices/ciudades.php";
$json = file_get_contents($url);
$obj = json_decode($json);

//var_dump($obj);


$array = json_decode($json);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>AeroLinea</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../testFrontend/Libreria/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../testFrontend/Libreria/bootstrap/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {
            height: 1500px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

            .row.content {
                height: auto;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4>Karen Laguna</h4>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#section1">Home</a></li>

            </ul>
            <br>

        </div>

        <form id="consultar">

            <div class="col-sm-9">
                <h4>
                    <small>Prueba Desarrollo</small>
                </h4>
                <hr>
                <h2>Aerolinea</h2>

                <p></p>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="usr">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="usr">Ciudad Origen:</label >
                        <select class="form-control" id="ciudad_origen" name="ciudad_origen" required>
                            <option value="">Seleccione...</option>
                            <?php

                            foreach ($array as $obj) {
                                $idciudades = $obj->idciudades;
                                $ciudad = $obj->ciudad;
                                ?>
                                <option value="<?php echo $idciudades ?>"><?php echo $ciudad ?></option>

                                <?php
                            }
                            ?>


                        </select>
                    </div>
                </div>
                <div class="col-sm-3">

                    <div class="form-group">
                        <label for="usr">Ciudad Destino:</label>
                        <select class="form-control" id="ciudad_destino"  name="ciudad_detino" required>
                            <option value="">Seleccione...</option>
                            <?php

                            foreach ($array as $obj) {
                                $idciudades = $obj->idciudades;
                                $ciudad = $obj->ciudad;
                                ?>
                                <option value="<?php echo $idciudades ?>"><?php echo $ciudad ?></option>

                                <?php
                            }
                            ?>


                        </select>
                    </div>
                </div>

                <div class="col-sm-3">

                    <div class="form-group">
                        <label for="usr">Cantidad Personas:</label>

                        <select class="form-control" id="ctidad_personas"  name="ctidad_personas" required>
                            <option value="">Seleccione...</option>
                            <?php for ($i = 1; $i <= 10; $i++) { ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>


                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" id="btn_buscar" class="btn btn-primary btn-block">Consultar</button>
                </div>
                <br><br>
        </form>


        <div class="form-group" id="resultado">

          Visualizaxion de la infomacion. 

        </div>
        <br><br>

    </div>
</div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

    <script src="../testBackend/Libreria/js/jquery-3.1.1.min.js" type="text/javascript"></script>

<script>


    $("#consultar").submit(function (e) {
        $('#resultado').html("<img src='img/cargando2.gif' width='250px' height='180px'>");
        $.ajax({
            type: "POST",


            url: "busqueda.php",
            data: $("#consultar").serialize(), // serializes the form's elements.
            success: function (respuesta) {
                $('#resultado').html(respuesta);
            }
        });
        e.preventDefault(); // avoid to execute the actual submit of the form.
    });




</script>


</body>
</html>