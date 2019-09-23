<?php
	require_once "DB/db.class.php";
	class Games{
		public static function openGames(){
			$query = "
				SELECT 
					`g`.`game_title`,
					`g`.`game_description`,
					CONCAT(
					`g`.`price`, ' ', 
					`g`.`valute`) AS `prices`,
					`g`.`image`,
					`g`.`id_category`,
					`c`.`id_category`,
					`c`.`category_name`
						FROM `project14`.`games` `g` JOIN `project14`.`category` `c`
					ON `g`.`id_category`=" . $_GET['id_category'];
			DB::openConnection();
			$result = DB::select($query);
			//var_dump($result);
			foreach($result as $res){
				printf("
					<div id='games1'>	
						<p>%s</p>
						<p>%s</p>
						<img src='%s'>
						<p>%s</p>
					</div>
				", $res["game_title"], $res["game_description"], $res["image"], $res["prices"]);
			}
		}
	}
	