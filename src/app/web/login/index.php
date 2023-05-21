<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_nif'])) { 
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
<body background="../images/fondo.jpg">
	 <div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
	 	<img src="../images/ignisus.png" style="width: 14rem"></img>
        <h1 class="text-center display-4" style="font-size: 2rem"><?=$_SESSION['user_full_name']?></h1>
        <a href="logout.php" class="btn btn-warning">Cerrar sesión</a>

	 </div>
</body>
</html>
<?php 
}else {
   header("Location: login.php");
}
 ?>
