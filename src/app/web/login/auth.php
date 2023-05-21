<?php
session_start();
include 'db_conn.php';

if (isset($_POST['nif']) && isset($_POST['password'])) {

	$nif = $_POST['nif'];
	$password = $_POST['password'];

	if (empty($nif)) {
		header("Location: login.php?error=Introduce tu NIF/DNI/NIE/TIE.");
	} else if (empty($password)) {
		header("Location: login.php?error=Introduce la contraseña&nif=$nif");
	} else {
		$stmt = $conn->prepare("SELECT * FROM users WHERE nif=?");
		$stmt->execute([$nif]);

		if ($stmt->rowCount() === 1) {
			$user = $stmt->fetch();

			$user_id = $user['id'];
			$user_nif = $user['nif'];
			$user_password = $user['password'];
			$user_full_name = $user['full_name'];

			if ($nif === $user_nif) {
				if (password_verify($password, $user_password)) {
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_nif'] = $user_nif;
					$_SESSION['user_full_name'] = $user_full_name;
					header("Location: index.php");
				} else {
					header("Location: login.php?error=Contraseña o NIF incorrecto&nif=$nif");
				}
			} else {
				header("Location: login.php?error=Contraseña o NIF incorrecto&nif=$nif");
			}
		} else {
			header("Location: login.php?error=Contraseña o NIF incorrecto&nif=$nif");
		}
	}
}
