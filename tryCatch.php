<?php
echo '<pre>';

function mysqlConnection($host, $db_name, $db_user, $db_pass, $port = null)
{
    if($port !== null) {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name . ';port=' . $port;
        try {
            $db = new PDO($dsn, $db_user, $db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $db;

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name;

    try {
        $db = new PDO($dsn, $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $db;

    } catch (PDOException $e) {
        return $e->getMessage();

    }
}

// $host, $db_name, $db_user, $db_pass, $port = null
$pdo = mysqlConnection('localhost', 'movies_db', 'root', '', '3306');
// $query = $pdo->prepare('SELECT movies.title, movies.rating, genres.name
//                         from movies
//                         right join genres on genres.id = movies.genre_id
//                         order by movies.rating desc');

// $query->execute();
// $result = $query->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result);


