<?php

	require_once 'app/Controllers/TableController.php';

	use app\Controllers\TableController;

	$table = new TableController();
	$tables = $table->index();

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
				<?php foreach($tables as $table_element): ?>
					<tr>
						<?php if($table_element['estado'] > 0): ?>
							<td style="background-color:red"><?= $table_element['numero']; ?></td>
						<?php else: ?>
							<td style="background-color:green"><?= $table_element['numero']; ?></td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			</table>
		</main>

		<footer> 
		
		</footer> 
	</body>
</html>