<?php 
	include_once 'header.php';
 ?>



	<section class="main-container">
		<div class="main-wrapper">
			<?php  
				if (isset($_SESSION['u_id'])) {
					echo "Bienvenido ";		
					$id = 		$_SESSION['u_first'];	
					echo $id;
				}else{
					echo "No ha iniciado sesión!";
					
				}
			?>

		</div>
	</section>













<?php 
  include_once 'mapa.php';
	include_once 'footer.php';
?>