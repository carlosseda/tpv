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
				<?php foreach($product->index() as $row): ?>
					<tr>
						<td><?= $row['nombre']; ?></td>

						<?php if($row['precio'] > 2): ?>
							<td style="background-color:red"><?= $row['precio']; ?></td>
						<?php else: ?>
							<td style="background-color:green"><?= $row['precio']; ?></td>
						<?php endif; ?>
						
					</tr>
				<?php endforeach; ?>
			</table>
		</main>

		<footer> 
		
		</footer> 
	</body>
</html>