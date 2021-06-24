<?php require_once "../lib/db.php" ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Actualizar Estudiante</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/formUpdate.css">
</head>
<body>
	<?php
		$db = new DB("localhost", "root", "", "dbcolegio");
		$data = mysqli_fetch_row($db->getStudent($_GET['doc']));
	?>
	<div class="container">
		<form class="form" action="../">
			<input type="number" style="display: none" name="doc" value=<?php print $data[0] ?>>
			<select name="docType" class="input">
				<option value="default">Tipo de documento</option>
				<option value="TI" <?php $data[1] == "TI" ? "selected" : "" ?>>TI</option>
				<option value="CC" <?php $data[1] == "CC" ? "selected" : "" ?>>CC</option>
			</select>
			<input type="text" class="input" name="name" placeholder="Nombre" value=<?php print $data[2] ?>>
			<input type="text" class="input" name="lastName" placeholder="Apellido" value=<?php print $data[3] ?>>
			<input type="number" class="input" name="age" placeholder="Edad" value=<?php print $data[4] ?>>
			<button class="btnRegister" name="update">Actualizar</button>
		</form>
	</div>
</body>
</html>