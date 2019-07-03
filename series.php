<?php

  require_once "conection.php";

  $stmt = $db->prepare("SELECT title, id FROM series");
  $stmt->execute();

  $series = $stmt->fetchAll(PDO::FETCH_ASSOC);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Series</title>
  </head>
  <body>
    <div class="">
      <h2>Listado de Series</h2>
      <ul>
        <?php foreach ($series as $oneSerie): ?>
          <li><a href="serie.php?id=<?=$oneSerie["id"]?>"><?=$oneSerie["title"] ?></a><br></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </body>
</html>
