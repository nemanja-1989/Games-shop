<?php
	
	require_once "DB/config.php";
	class DB{
		public static $mysqli;
		
		public static function openConnection(){
			self::$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		}
		public static function closeConnection(){
			self::$mysqli->close();
		}
		public static function insert($query, $params){
			$stmt = self::$mysqli->prepare($query);
			if($stmt === false){
				printf("[MYSQL] Error: %d, %s", self::$mysqli->errno, self::$mysqli->error);
				echo "<br><br>";
			}
			call_user_func_array(array($stmt, 'bind_param'), $params);
			$stmt->execute();
			if(self::$mysqli->error){
				printf("[MYSQL] Error: %d, %s", self::$mysqli->errno, self::$mysqli->error);
				echo "<br><br>";
			}else{
				printf("Inserted rows is: %d", self::$mysqli->affected_rows);
				echo "<br><br>";
			}
			$stmt->close();
		}
		public static function lastInsertedID(){
			return self::$mysqli->insert_id;
		}
		public static function update($query, $params = array()){
			$stmt = self::$mysqli->prepare($query);
			if($stmt === false){
				printf("[MYSQL] Error: %d, %s", self::$mysqli->errno, self::$mysqli->error);
			}
			call_user_func_array(array($stmt, 'bind_param'), $params);
			$stmt->execute();
			if(self::$mysqli->errno){
				printf("[MYSQL] Error: %d, %s", self::$mysqli->errno, self::$mysqli->error);
				echo "<br><br>";
			}else{
				printf("Updated rows is: %d", self::$mysqli->affected_rows);
				echo "<br><br>";
			}
		}
		public static function select($query, $params = array()){
			$stmt = self::$mysqli->prepare($query);
			if($stmt === false){
				printf("[MYSQL] Error: %d, %s", self::$mysqli->errno, self::$mysqli->error);
				echo "<br><br>";
			}
			@call_user_func_array(array($stmt, 'bind_param'), $params);
			$stmt->execute();
			if(self::$mysqli->errno){
				printf("[MYSQL] Error: %d, %s", self::$mysqli->errno, self::$mysqli->error);
				echo "<br><br>";
			}else{
				$resultDB = $stmt->get_result();
				if($resultDB->num_rows == 0){
					printf("Please check your credentials!");
				}else{
					while($row = $resultDB->fetch_array(MYSQLI_ASSOC)){
						$result[] = $row;
					}
				}
			}
			return isset($result) ? $result : array();
		}
	}