<?php
session_start();
if (isset($_POST['add'])) {
	echo $_SESSION['u_id'];
	include_once 'dbh.inc.php';
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$lat = 0.0 +mysqli_real_escape_string($conn, $_POST['lat']);
	$lng = 0.0 +mysqli_real_escape_string($conn, $_POST['lng']);
	//Error handlers
	//Check for empty fields
	
	
	if (empty($name) || empty($lat) || empty($lng) ) {
		header ("Location: ../admin.php?admin=empty ");
		exit();
	} else {
		
		$id = $_SESSION['u_id'];
		$lat = floatval(str_replace(',', '.', $lat));
		$lng = floatval(str_replace(',', '.', $lng));
		
		$sql = "INSERT INTO institution 
		(institution_name,institution_lat,institution_lng,user_id) 			
		VALUES ('$name',$lat,$lng,$id);";
		mysqli_query($conn, $sql);
		header ("Location: ../admin.php?admin=success");
		exit();
		
	}
} else {
	header ("Location: ../admin.php");
	exit();
}
