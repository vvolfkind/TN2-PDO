<?php

class Connector
{
    public static function make($host, $db_name, $username, $password, $port = null)
    {
        if($port !== null) {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name . ';port=' . $port;

            try {
                $pdo = new PDO($dsn, $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                return $pdo;

            } catch (PDOException $e) {
                //die('No pude conectarme' . $e->getMessage());
                die('Error');
            }
        }
        $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name;

        try {
            $db = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $db;

        } catch (PDOException $e) {
            //die('No pude conectarme' . $e->getMessage());
                die('Error');

        }

    }

}

