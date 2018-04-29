<?php
include_once('confi.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){


// Get data


$fecha = $_POST['fecha'] ;
$ciudad_origen = $_POST['ciudad_origen'] ;
$ciudad_detino = $_POST['ciudad_detino'] ;
$ctidad_personas = $_POST['ctidad_personas'] ;


    $sql = "SELECT * FROM prueba_karen.vista_categoria where ciudad_origen = $ciudad_origen and ciudad_destino = $ciudad_detino and date(fecha_salida) = '$fecha'";

    function getArraySQL($sql){
        //Creamos la conexión con la función anterior
        $conexion = connectDB();

        //generamos la consulta

        mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

        if(!$result = mysqli_query($conexion, $sql)) die(); //si la conexión cancelar programa

        $rawdata = array(); //creamos un array

        //guardamos en un array multidimensional todos los datos de la consulta
        $i=0;

        while($row = mysqli_fetch_array($result))
        {
            $rawdata[$i] = $row;
            $i++;
        }

        disconnectDB($conexion); //desconectamos la base de datos

        return $rawdata; //devolvemos el array
    }

    $myArray = getArraySQL($sql);
    echo json_encode($myArray);



//var_dump($obj);


    $array = json_decode($myArray);


}
?>


<div class="col-sm-3">
    <div class="form-group">
        <label for="usr">Ciudad Origen:</label >

        <?php

        foreach ($array as $obj) {
            $idcategoria_trayectos = $obj->idcategoria_trayectos;

            ?>
            <?php echo $idcategoria_trayectos ?>

            <?php
        }
        ?>


    </div>
</div>




