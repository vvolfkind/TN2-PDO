<?php

require 'helpers.php';
require 'MySQL.php';

// PARAMETROS
$mi_host = "127.0.0.1";
$mi_puerto = "3306";
$mi_base_de_datos = "movies_db";
$mi_username = "root";
$mi_password = "";
// END PARAMETROS

$pdo = MySQL::connect($mi_host, $mi_base_de_datos, $mi_username, $mi_password, $mi_puerto);


//dd($pdo);

