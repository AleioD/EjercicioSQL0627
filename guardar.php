<?php

  try {
    $stmt = $db->prepare(
    "INSERT INTO movies (id, title, rating, awards, release_date, length, genre_id)
    VALUES (NULL, :title, :rating, :awards, :release_date, :length, :genre_id)");

    $stmt->bindValue(':title',  $_POST['title'], PDO::PARAM_STR);
    $stmt->bindValue(':rating',  $_POST['rating'], PDO::PARAM_INT);
    $stmt->bindValue(':awards',  $_POST['awards'], PDO::PARAM_INT);
    $stmt->bindValue(':release_date',  $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"], PDO::PARAM_STR);
    $stmt->bindValue(':length',  $_POST['leght'], PDO::PARAM_INT);
    $stmt->bindValue(':genre_id',  $_POST['genre_id'], PDO::PARAM_STR);

    $stmt->execute();

    header('location: agregarPelicula.php');

  } catch (PDOException $e) {
    echo $e;
  }
