<?php


class Connector
{
    public static function make($host, $db_name, $username, $password, $port = null)
    {
        if($port !== null) {
            // si llega un port 
            $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name . ';port=' . $port;
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=movies_db;port=3306", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                return $pdo;

            } catch (PDOException $e) {
                die('No pude conectarme' . $e->getMessage());
            }
        }
        // sin port 
        $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name;

        try {
            $db = new PDO($dsn, $db_user, $db_pass);
            return $db;

        } catch (PDOException $e) {
            return $e->getMessage();

        }

    }

}

var_dump(Connector::make('localhost', 'movies_db', 'root', '', '3306'));
