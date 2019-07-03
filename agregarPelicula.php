<?php

	require_once 'conection.php';

	$query = $db->prepare("SELECT name, id FROM genres");
	$query->execute();
	$genres = $query-> fetchAll(PDO::FETCH_ASSOC);

	if ($_POST != []) {
		require_once 'guardar.php';
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
	<form method="post">
		<div>
			<label>Titulo</label>
			<input type="text" name="title" >
		</div>
		<div>
			<label>Rating</label>
			<input type="text" name="rating" >
		</div>
		<div>
			<label>Premios</label>
			<input type="text" name="awards" >
		</div>
		<div>
			<label>Duracion</label>
			<input type="text" name="leght" >
		</div>
		<div>
			<label>Fecha de Estreno</label> <br>
			<i>Año: </i>
			<select name="year">
				<?php for ($i=2018; $i >= 1920; $i--) { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
			<i>Mes: </i>
			<select name="month">
				<?php for ($i=1; $i < 13; $i++) { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
			<i>Día: </i>
			<select name="day">
				<?php for ($i=1; $i < 32; $i++) { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select><br>
			<i>Género: </i>
			<select name="genre_id">
				<?php foreach ($genres as $oneGenre): ?>
					<option value="<?php echo $oneGenre['id']; ?>"><?php echo $oneGenre['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<button type="submit">Guardar película</button>
	</form>
</body>

</html>
