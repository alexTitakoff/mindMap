<!DOCTYPE html>
<html lang="en">
<head> 

	<link rel="stylesheet" href="css.css">
	<meta charset="UTF-8">
	<title>js Mind Map</title>
	

</head> 
<body>
	
	<h2>Mind Map {proto} ver 0.4.0</h2>



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


		<div id="params_subnode2">

			<form action="addSubnode.php" method="post">
				
				<p>enter nodeName</p>
				<input name="subnode_name" id="subnode_name" type="text"  >
				<input  name="subnode_type" type="hidden" value="subnode">
				
				<input  name="parentId" id="parent_id" type="hidden" ><br>
				<p>select a status of the process</p>
				<select name="subnode_status"id="subnode_status">
					
					<option value="b_onlearn">onlearn</option>
					<option value="a_inuse">inuse</option>
					<option value="inplans">inplans</option>  

				</select> <br><br>
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
				<p class="add_subnode">add <span>+</span> </p>
				<p class="id_node" ><?php echo ($nodeData['id']);  ?></p>
				

				<?php 

				$parentId = $nodeData['id'];
				// Выборка подкатегорий
				$slctSubNode = "SELECT * FROM jsmap_db 
				WHERE `parent_id` = '$parentId'
				ORDER BY  `status` ASC ;";
				$assoc_res2 = $dbh->query($slctSubNode);
				while ( $subNodeData = $assoc_res2->fetch(PDO::FETCH_ASSOC)) {

					?>

					<li class="subnode" >
						<div class="li_circle" ></div>
						<p class="subnode_status"><?php  echo ($subNodeData['status']); ?></p>

						<p class="subnode_name" ><?php  echo ($subNodeData['name']); ?></p>

						<div class="subnode_menu">
							<p class="subnode_status_inner" >Status: <?php  echo ($subNodeData['status']); ?></p><br>
							<?php  echo ($subNodeData['descr']); ?>	<br>
							<a class="delete_subnode" href="delete.php?id=<?php  echo ($subNodeData['id']); ?>">Delete Node</a>
						</div>

						
					</li>

					<?php	
				} // Выборка подкатегорий		?>

				
				<a class="delete_node" href="delete.php?id=<?php echo ($nodeData['id']);?>"></a>


			</ul>

			<?php  
		} 	$dbh = NULL; //  end connect                 	?>
	</div>


	

	<!-- To-DO -->
	<div style="font-size: 11px; position: fixed; bottom: 2%; right: 5%; background: #1F1F1F; width: 200px; padding: 10px; overflow-y: scroll; max-height: 120px; "  id="todo">
		<style >

			.inproc {
				color: #F6C63E;
			}
		</style>
		<p style="font-size: 12px;">Project ToDo:</p> <br>
		
		
		
		<span>-Редактировании в одноименном окне</span><br>
		<span class="inproc">-Editing Subnode <br>

			<del>___-добавить лейблы<br></del>
			___-появление аинимашка<br>
			<del>___-селект</del>

		</span><br>
		
		<span>-Редизайн окошек добавления
			--закрытие
			--лэблы
			--селекты
			--input под описание
		</span><br>
		<span>---Подумать над проблемой плавного появления и увеличения высоты</span><br>
		<del>-Интерфейс для Li-шек<br>
			-иконка удаления, добавления<br>
			-разворачивание описания
		</del><br>
		<del>-Sublime ssh, подключение</del><br>
		<del>Перевести статус в цвет</del> <br>		
		<del>-Todo list </del>	<br>
		<del>-Cтатусы Li-шкам</del><br>
		<del>-кружочки Li-шкаv</del><br>

		<del>-Фишка выборки, чтобы освоенное было сверху</del><br>
		
		
		
	</div>
	<!-- To-DO -->






	<script src="js.js"></script>
</body>
</html>