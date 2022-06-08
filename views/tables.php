<?php 
    require_once 'app/Controllers/TableController.php';

	use app\Controllers\TableController;

	$table = new TableController();
?>

<!DOCTYPE html>

<html lang="es">
	<head> 
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="">
		<meta name="keywords" content=""> 
		<title>Visualización de tabla</title> 
	</head>

	<body>
		<header>

		</header>

		<main>
			<table>
				<?php foreach($table->index() as $row): ?>
					<tr>
						<td><?= $row['numero']; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</main>

		<footer> 
		
		</footer> 
	</body>
</html>