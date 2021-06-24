<?php require_once "lib/db.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Miguel Ángel Vargas Beltrán">
	<title>CRUD con PHP</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
	$db = new DB("localhost", "root", "", "school");
	$db->setTable("students");

	$cases = [
		"register" => $db->setStudent($_GET['doc'], $_GET['docType'], $_GET['name'], $_GET['age']),
		"update" => $db->updateStudent($_GET['doc'], $_GET['docType'], $_GET['name'], $_GET['age']),
		"delete" => $db->deleteStudent($_GET['doc'])
	];

	// isset($cases[$_GET['method']]) ? $cases[$_GET['method']] : null;
	$cases["register"];

?>
	<div class="container">
		<h2 class="title">Registrar estudiante</h2>
		<form class="form">
			<input type="text" class="input" name="doc" placeholder="Documento">
			<select name="docType" class="input">
				<option value="default">Tipo de documento</option>
				<option value="TI">TI</option>
				<option value="CC">CC</option>
			</select>
			<input type="text" class="input" name="name" placeholder="Nombre">
			<input type="text" class="input" name="age" placeholder="Edad">
			<button class="btnRegister" name="method" value="register">Registrar</button>
		</form>
		<h2 class="title">Registros</h2>
		<div class="studentsGroup">
			<?php
				foreach(mysqli_fetch_all($db->getEstudents()) as $student) {
					?>
						<div class="student">
							<h2 class="doc"><?php print $student[0] ?></h2>
							<h2 class="docType"><?php print $student[1] ?></h2>
							<h2 class="name"><?php print $student[2] ?></h2>
							<h2 class="age"><?php print $student[3] ?></h2>
								<a href="./updateStudent/?doc=<?php echo $student[0] ?>" class="btn btnUpdate">Actualizar</a>
								<a href="./?method=delete&doc=<?php echo $student[0] ?>" class="btn btnDelete">Borrar</a>
						</div>
					<?php
				}
				$db->close();
			?>
		</div>
	</div>
</body>
</html>