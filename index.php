<!DOCTYPE html>
<html lang="en">
<head> 

	<link rel="stylesheet" href="css.css">
	<meta charset="UTF-8">
	<title>js Mind Map</title>
</head>
<body>
	<h2>Mind Map {proto}</h2>



	<div id="modal_div">
		
		<div id="params">

			<form action="create.php" method="post">

				<input name="node_name" id="node_name" type="text"  >
				<input  name="node_type" type="text" value="node">
				<input name="node_status"id="node_status" type="text" >
				<input name="node_create" type="submit" value="create">

			</form>
			
		</div>

	</div>
	<div id="modal_div2">


		<div class="params_subnode">

			<form action="addSubnode.php" method="post">

				<input name="subnode_name" id="subnode_name" type="text"  >
				<input  name="subnode_type" type="text" value="subnode">
				<input  name="parentId" id="parent_id" type="text" >
				<input name="subnode_status"id="subnode_status" type="text" >
				<input name="subnode_create" type="submit" value="create">

			</form>
			
		</div>
		



	</div>
	

	

	<div id="create_node">	CreateNode </div>

	<div id="view_map">




		<?php 
		error_reporting(E_ALL & ~E_DEPRECATED); 
		ini_set('display_errors', 'On'); 
		restore_error_handler (); 


		?>


		<?php 
		require 'db.php';


		$slctNode = "SELECT * FROM jsmap_db 
		WHERE `type` = 'node'
		ORDER BY `id`;";

		$assoc_res = $dbh->query($slctNode);

		while ( $nodeData = $assoc_res->fetch(PDO::FETCH_ASSOC)) {

			?>
			<ul class="view_node">
				<p class="view_node_name" ><?php echo ($nodeData['name']);  ?></p>
				<p class="view_status"><?php echo ($nodeData['status']);  ?></p>
				<p class="view_date" ><?php echo ($nodeData['date']);  ?></p>
				<p class="add_subnode">Add SubNode</p>
				<p><?php echo ($nodeData['id']);  ?></p>
				

				<?php 

				$parentId = $nodeData['id'];
				// Выборка подкатегорий
				$slctSubNode = "SELECT * FROM jsmap_db 
				WHERE `parent_id` = '$parentId'
				ORDER BY `id`;";
				$assoc_res2 = $dbh->query($slctSubNode);
				while ( $subNodeData = $assoc_res2->fetch(PDO::FETCH_ASSOC)) {

					?>

					<li>
						<?php  echo ($subNodeData['name']); ?>
					</li>

					<?php	
				} // Выборка подкатегорий		?>

				
				<a class="delete_node" href="delete.php?id=<?php echo ($nodeData['id']);?>">Delete</a>


			</ul>

			<?php  
		} 	$dbh = NULL; //  end connect                 	?>
	</div>


	<div style="font-size: 9px; position: fixed; bottom: 2%; right: 5%; background: #1F1F1F; width: 200px; padding: 10px; overflow-y: scroll; max-height: 120px; "  id="todo">
		<p style="font-size: 12px;">Project ToDo:</p> <br>
		<del>Перевести статус в цвет</del> <br>
		-иконка удаления, добавления<br>
		-редактирование нодов, обработчик<br>
		<del>-Todo list </del>	<br>
		-Cтатусы Li-шкам<br>
		-Интерфейс для Li-шек<br>
		lorem<br>
		lorem<br>
		lorem<br>
		lorem<br>
		lorem<br>
		lorem<br>
		lorem<br>
	</div>







	<script src="js.js"></script>
</body>
</html>