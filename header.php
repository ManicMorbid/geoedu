<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login system</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<header id="header" class="">
		<nav>
			<div class="main-wrapper">
				<ul>
					<a href="#">
						<img src="img/geologo.jpg" width="250" height="50" alt="geologo">
					</a>
				</ul>
				<ul>
					<li><a href="index.php" title="">Inicio | </a>
					
						<?php
						if (isset($_SESSION['u_id'])) {
							echo '
							<a href="admin.php" title="">Administrar</a>';
						}
						?>
					</li>
				</ul>
				<div class="nav-login">
					<?php
						if (isset($_SESSION['u_id'])) {
							echo '
							
								
							
								<form action="includes/logout.inc.php" method="POST">
									<button type="submit" name = "submit">Salir</button>
									
									
								</form>
									'
								;

						} else {
							echo 	'<form action="includes/login.inc.php" method="POST">
									<input type="text" name="uid" placeholder="Nombre de Usuario">
									<input type="password" name="pwd" placeholder="Contraseña">
									<button type="submit" name="submit">Entrar</button>
									</form>
									<a href="signup.php">Registrarse</a>';
						}
					?>
				</div>
			</div>
		</nav>
	</header><!-- /header -->