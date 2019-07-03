<?php

  require_once "conection.php";

  $stmt = $db->prepare(
    "SELECT series.title, COUNT(*) AS episodes_count
    FROM series
    INNER JOIN seasons AS s ON series.id = s.serie_id
    INNER JOIN episodes AS e ON e.season_id = s.id
    WHERE series.id = :id
    GROUP BY s.serie_id
    ");

  $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt->execute();

  $serie = $stmt->fetch(PDO::FETCH_ASSOC);
  //echo "<pre>";
  //var_dump($serie);
  //echo "</pre>";

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title><?= $serie['title'] ?></title>
   </head>
   <body>
     <div class="">
       <h2><?= $serie['title'] ?></h2>
       <ul>
         <li>Cantidad de Episodios: <?= $serie['episodes_count'] ?></li>
       </ul>
     </div>
   </body>
 </html>
