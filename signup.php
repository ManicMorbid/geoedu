<?php 
	include_once 'header.php';
 ?>



	<section class="main-container">
		<div class="main-wrapper">
			<h2>Signup</h2>
			<form class="frm" action="includes/signup.inc.php" method="POST">
				<input type="text" name="first" placeholder="Nombres">
				<input type="text" name="last" placeholder="Apellidos">
				<input type="text" name="email" placeholder="E-mail">
				<input type="text" name="uid" placeholder="Nombre de usuario">
				<input type="password" name="pwd" placeholder="Contraseña">
				<input type="text" name="pos" placeholder="Cargo/Posición">
				<button type="submit" name="submit">Registrarse</button>
			</form>
		</div>
	</section>

<?php 
	include_once 'footer.php';
?>