<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>create</title>
</head>
<body>


	<?php 
	error_reporting(E_ALL & ~E_DEPRECATED); 
	ini_set('display_errors', 'On'); 
	restore_error_handler (); 


	?>


	<?php 
	if(isset($_POST['node_create']))    #если кнопка нажата
	{
		require 'db.php';


		$node_name = trim($_POST['node_name']);
		$node_status = trim($_POST['node_status']);
		$node_type = trim($_POST['node_type']);


		$insrt = "INSERT INTO jsmap_db (`name`, `status`, `type`) 
		VALUES ('$node_name', '$node_status', '$node_type');";
		$dbh->query($insrt);



		$dbh = NULL;  //Закрыл соединение
		header('Location: http://host2/index.php');
	}



	?>

</body>
</html>