<?php
/**
 * Created by PhpStorm.
 * User: karenlaguna
 * Date: 28/04/18
 * Time: 8:23 PM
 */

function connectDB(){

    $server = "localhost";
    $user = "usuariok";
    $pass = "P@ss0102";
    $bd = "prueba_karen";

    $conexion = mysqli_connect($server, $user, $pass,$bd);

    if($conexion){

    }else{

    }

    return $conexion;
}

function disconnectDB($conexion){

    $close = mysqli_close($conexion);

    if($close){

    }else{

    }

    return $close;
}



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