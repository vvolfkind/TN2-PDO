<?php

require 'loader.php';

if($_POST) {

    $query = $pdo->prepare("SELECT * FROM movies WHERE title = ?");
    $query->bindValue(1, $_POST['title']);
    $query->execute();

    $movie = $query->fetch(PDO::FETCH_ASSOC);

    if(!$movie) {

        $date = date_create($_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day']);
        $date = date_format($date, "Y-m-d H:i:s");

        $statement = $pdo->prepare("INSERT INTO movies (title, rating, awards, length, release_date) VALUES (?, ?, ?, ?, ?)");

        $statement->bindValue(1, $_POST['title']);
        $statement->bindValue(2, $_POST['rating']);
        $statement->bindValue(3, $_POST['awards']);
        $statement->bindValue(4, $_POST['length']);
        $statement->bindValue(5, $date);

        $statement->execute();

        header('Location: pelicula.php?id=' . $pdo->lastInsertId());
        exit;

    } else {
        
    }


    

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Pelicula</title>

</head>

<body>
    <form class="form" method="post" action="">
        <div>
            <label>Titulo</label>
            <input type="text" name="title">
        </div>
        <div>
            <label>Rating</label>
            <input type="text" name="rating">
        </div>
        <div>
            <label>Premios</label>
            <input type="text" name="awards">
        </div>
        <div>
            <label>Duracion</label>
            <input type="text" name="length">
        </div>
        <div>
            <label>Fecha de Estreno</label> <br>
            <i>Año: </i>
            <select name="year">
                <?php for ($i = 2018; $i >= 1920; $i--) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php }?>
            </select>
            <i>Mes: </i>
            <select name="month">
                <?php for ($i = 1; $i < 13; $i++) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php }?>
            </select>
            <i>Día: </i>
            <select name="day">
                <?php for ($i = 1; $i < 32; $i++) {?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php }?>
            </select>
        </div>
        <button type="submit">Guardar película</button>
    </form>
</body>

</html>