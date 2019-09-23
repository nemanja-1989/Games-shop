<?php
	
	require_once "DB/db.class.php";
	
	class userNav{
		public function showNav(){
			$query = "
				SELECT 
					`c`.`id_category`,
					`c`.`category_name`
						FROM `project14`.`category` `c`";
			DB::openConnection();
			$result = DB::select($query);
			//var_dump($result);
			echo "<ul>";
			foreach($result as $res){
				printf("
						<li><a href='games.php?id_category=%s'>%s</a></li>
				", $res["id_category"], $res["category_name"]);
			}
			echo "</ul>";
		}
	}
	$nav = new userNav();
	$nav->showNav();