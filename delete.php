<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Del</title>
</head>
<body>



	<?php 
	error_reporting(E_ALL & ~E_DEPRECATED); 
	ini_set('display_errors', 'On'); 
	restore_error_handler (); 


	?>


	<?php 

	require 'db.php';

	$id = $_GET['id'];


	$del = "DELETE FROM jsmap_db WHERE `id`='$id';";
	$dbh->query($del);


	$dbh = NULL;  //Закрыл соединение
	header('Location: http://host2/index.php');
	?> 




</body>
</html>