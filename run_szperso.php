#! /usr/local/bin/php

<?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 29/9/2016
 * Time: 8:47 AM
 *
 * Script encargado de la ejecución del servicio remoto para vínculo con SZPERSO. Toma como
 * parámetros la dirección del servicio y el nombre del archivo a usar para la escritura del log.
 *
 * Nótese que este script PHP está pensado para su uso desde consola.
 *
 * Ejemplo: php -v run_szperso http://desa.ucab.edu.ve/szperso/employees.json log.html
 *
 * @param null $argv[1] Dirección del servicio a consultar. Debe ser un archivo JSON.
 * @param null $argv[2] Nombre del archivo a usar como registro.
 */

//$direccion_json = $argv[1];
//$nombre_archivo = $argv[2];

//Parte de acceso a webservice
//$service_url = $direccion_json;
//var_dump($direccion_json);

$service_url = 'https://desa.ucab.edu.ve/szperso/employees.json';

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
curl_close($curl);
$obj = json_decode($curl_response);

var_dump($curl_response);
var_dump($obj);