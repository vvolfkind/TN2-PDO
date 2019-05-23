<?php

require 'tryCatch.php';

$query = "SELECT movies.title FROM movies INNER JOIN genres ON movies.genre_id = genres.id WHERE genres.name LIKE 'Drama'";
$statement = $pdo->prepare($query);
$statement->execute();

$movies = $statement->fetchAll(PDO::FETCH_ASSOC);

var_dump($movies);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="genres.php">Volver</a>
</body>
</html>
