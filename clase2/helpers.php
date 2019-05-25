<?php

function dd($param)
{
    echo '<pre>';
    die(var_dump($param));
}

function updateMovie($data, $pdo)
{
    $allowed = ["title","rating","awards","length","genre_id"];
    $params = [];

    $setStr = "";

    foreach ($allowed as $key) {
        if (isset($data[$key]) && $key != "id") {
            $setStr .= "`$key` = :$key,";
            $params[$key] = $data[$key];
        }
    }

    $setStr = rtrim($setStr, ",");

    $params['id'] = $data['id'];

    $pdo->prepare("UPDATE movies SET $setStr WHERE id = :id")->execute($params);


}