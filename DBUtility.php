<?php
	class DBUtility {
		
		public static function get_db(){
			$servername = "localhost";
			$username = "root";
			$password = "";

			// Create connection
			$conn = new mysqli($servername, $username, $password);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			echo "Connected successfully\n";

			return $conn;

		}
	
		
		public  static function validateUserAndPassword($username, $password){

			$sql="SELECT id FROM vistaram_schema.admin WHERE username='$username' and password='$password'";
			$result=mysqli_query(DBUtility::get_db(), $sql);
			$count=mysqli_num_rows($result);
			if($count==1)
			{
				return true;
			}
			else
			{
			 //$error="Your Login Name or Password is invalid";
				return false;
			}
			
		}
		
		/*public static function validateUserAndPassword($userName, $password){
			
			if(count_chars(trim($userName)) == 0 || count_chars(trim($userName)) == 0){
				return false;
			}
			
			if($username == "venkat" && $password == "12345"){
				return true;
			}
			return false;
		}*/
	
	}
	
	//write code here to test
	
	if(DBUtility::validateUserAndPassword("aditya","312269")){
		echo "Success\n";
	} else {
		echo "Failure\n";
	}
?>	