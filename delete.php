<?php 	header('Location:http://examples.cs06028-wordpress.tw1.ru/mindmap/index.php'); ?>




<?php 
error_reporting(E_ALL & ~E_DEPRECATED); 
ini_set('display_errors', 'On'); 
restore_error_handler(); 





	if(isset($_GET['id']))    #если кнопка нажата
	{
		require'db.php';

		$id = $_GET['id'];


		$del = "DELETE FROM jsmap_db WHERE `id`='$id';";
		$dbh->query($del);


	$dbh = NULL;  //Закрыл соединение
	
}
?> 
<script type="text/javascript">
	// location.replace("http://examples.cs06028-wordpress.tw1.ru/mindmap/index.php");
</script>



