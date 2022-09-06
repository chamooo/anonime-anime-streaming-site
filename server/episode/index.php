<?php 
    require($_SERVER['DOCUMENT_ROOT'] . '/configs/connect.php');

    $id = $_GET['id'];
    $sql = "SELECT episode.title, episode.number, episode.src, id_movie 
    FROM episode
    JOIN movie ON id_movie = movie.id
    WHERE id_movie = $id";

    $result = $conn->query($sql);

    $data = $result->fetch_all();

    echo json_encode($data);
    