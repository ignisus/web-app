<?php

#$hashed_password = password_hash('12345678', PASSWORD_DEFAULT);
#echo $hashed_password;
session_start();

if (!isset($_SESSION['user_id']) && !isset($_SESSION['user_nif'])) {
?>

	<!DOCTYPE html>
	<html lang="es">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cuenta Ignisus</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
		<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
		<body background="../img/fondo.jpg">
			<form class="p-5 rounded shadow" action="auth.php" method="post" style="width: 30rem">
				<h1 class="text-center pb-5 display-4">Cuenta Ignisus</h1>
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert">
						<?= htmlspecialchars($_GET['error']) ?>
					</div>
				<?php } ?>
				<div class="mb-3">
					<label for="exampleInputNif" class="form-label">NIF/DNI/NIE/TIE
					</label>
					<input type="nif" name="nif" value="<?php if (isset($_GET['nif'])) echo (htmlspecialchars($_GET['nif'])) ?>" class="form-control" id="exampleInputNif" aria-describedby="nifHelp">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Contraseña
					</label>
					<input type="password" class="form-control" name="password" id="exampleInputPassword1">
				</div>
				<button type="submit" class="btn btn-primary">ENTRAR
				</button>
			</form>
		</div>
	</body>

	</html>

<?php
} else {
	header("Location: index.php");
}
?>