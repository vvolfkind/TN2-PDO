<?php

function mysqlConnection($host, $db_name, $db_user, $db_pass, $port = null)
{
    if($port !== null) {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name . ';port=' . $port;
        try {
            $db = new PDO($dsn, $db_user, $db_pass);
            return $db;

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name;

    try {
        $db = new PDO($dsn, $db_user, $db_pass);
        return $db;

    } catch (PDOException $e) {
        return $e->getMessage();

    }
}
// $host, $db_name, $db_user, $db_pass, $port = null
$pdo = mysqlConnection('localhost', 'movies_db', 'root', '', '3306');
var_dump($pdo);
exit;
