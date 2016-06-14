<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<title>Ejemplo PHP MVC</title>
	<link href="public/libs/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="public/libs/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="public/libs/jquery/jquery-2.2.3.js"></script>
	<style type="text/css">
		input{
			margin-top: 5px;
			margin-bottom: 5px;
		}

		.right{
			float: right;
		}
	</style>
</head>
<body>
	<form action="<?php echo $helper->url('usuarios', 'crear') ?>" method="post" class="col-lg-5">
		<h3>Añadir usuario</h3>
		<hr />
		Nombre: <input type="text" name="nombre" class="form-control" />
		Apellido Paterno: <input type="text" name="ap" class="form-control" />
		Apellido Materno: <input type="text" name="am" class="form-control" />
		Email: <input type="text" name="email" class="form-control" />
		Contraseña: <input type="text" name="password" class="form-control" />
		Nivel: <input type="text" name="nivel" class="form-control" />
		<input type="submit" value="enviar" class="btn btn-success"/>
	</form>

	<div class="col-lg-7">
		<h3>Usuarios</h3>
		<hr />
	</div>

	<section class="col-lg-7 usuario" style="height: 400px; overflow-y:scroll">
	<?php foreach($allUsers as $user){ ?>
		<div class="row">
			<div class="col-lg-12">
				<?php echo $user->id.' - '.
					$user->nombre.' - '.
					$user->ap.' - '.
					$user->am.' - '.
					$user->email.' - '.
					$user->password.' - '.
					$user->nivel;
					$url = $helper->url('usuarios', 'borrar');
					?>
				<div class="right">
					<a href="<?php echo $url.'&id='.$user->id; ?>" class="btn btn-danger">Borrar</a>
				</div>
			</div>
		</div>
			<?php } ?>
	</section>

	<footer class="col-lg-12">
		<hr />
		Ejemplo PHP MYSQL
	</footer>
</body>
</html>