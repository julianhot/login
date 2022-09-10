<?php 
	session_start();

	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>cuenta logeado</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="Style.css"></link>
	
</head>
<body>
	<div class="w3-container w3-black w3-center">
		<h1>BIENVENIDO A LA JUNGLA LML</h1>
	</div>
	<p>MENU</p>
		

			<ul class="nav">
				<li><a href="#home">Home</a></li>
				<li><a href="#news">News</a></li>
				<li><a href="#contact">Contact</a></li>
				<li><a href="#about">About</a></li>
			</ul>
		

	<form class="w3-container" action="controller_login.php" method="post">
		<input type="hidden" name="salir" value="salir">
		<button class="w3-btn w3-green">Salir</button>
	</form>

</body>
</html>