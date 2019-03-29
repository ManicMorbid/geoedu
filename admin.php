<?php 
	include_once 'header.php';
 ?>



	<section class="main-container">
		<div class="main-wrapper">
			<h2>Administrar</h2>
			<form class="frm" action="includes/admin.inc.php" method="POST">
				<input type="text" name="name" placeholder="Nombre">
				<input type="text" name="lat" placeholder="Latitud">
				<input type="text" name="lng" placeholder="Longitud">
				<button type="submit" name="add">Agregar</button>
			</form>
		</div>
	</section>


<?php 
	echo $_SESSION['u_id'];
	include_once 'footer.php';
?>