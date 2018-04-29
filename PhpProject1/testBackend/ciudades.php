<?php
/**
 * Created by PhpStorm.
 * User: karenlaguna
 * Date: 27/04/18
 * Time: 2:46 PM
 */

include_once('confi.php');

$sql = "SELECT * FROM prueba_karen.ciudades;"; //ejemplo frutería: SELECT id_fruta,nombre_fruta,cantidad FROM tabla_fruta;



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
?>