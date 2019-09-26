<?php

  require_once 'conection.php';

  $db->beginTransaction();

  try {
    $db->exec("INSERT INTO movies (id, title, rating, awards, release_date, length, genre_id)
    VALUES (NULL, :title, :rating, :awards, :release_date, :length, :genre_id)");

    $db->commit();

  } catch (\Exception $e) {

    $db->rollBack();
    echo "Error:" . $e->getMessage();
  }


 ?>
