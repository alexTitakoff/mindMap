<?php header('Location: http://examples.cs06028-wordpress.tw1.ru/mindmap/index.php'); ?>

<?php 
error_reporting(E_ALL & ~E_DEPRECATED); 
ini_set('display_errors', 'On'); 
restore_error_handler (); 


?>



<?php 
	if(isset($_POST['subnode_create']))    #если кнопка нажата
	{
		require 'db.php';


		$subnode_name = trim($_POST['subnode_name']);
		$subnode_status = trim($_POST['subnode_status']);
		$subnode_type = trim($_POST['subnode_type']);
		$parentId = trim($_POST['parentId']);


		$insrt = "INSERT INTO jsmap_db (`name`, `status`, `type`, `parent_id` ) 
		VALUES ('$subnode_name', '$subnode_status', '$subnode_type','$parentId');";
		$dbh->query($insrt);



		$dbh = NULL;  //Закрыл соединение
		
	}



	?>


