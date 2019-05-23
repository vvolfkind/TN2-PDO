<?php

require 'tryCatch.php';

$query = "SELECT * FROM genres";
$pollo = $pdo->prepare($query);
$pollo->execute();

$generos = $pollo->fetchAll(PDO::FETCH_ASSOC);


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
    <div class="container">
    <h2>Peliculas por Genero</h2>
        <ul>
            <?php foreach($generos as $genero): ?>
            <li>
                <a href="genero_<?=strtolower($genero['name']) ?>.php"><?=$genero['name'] ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>