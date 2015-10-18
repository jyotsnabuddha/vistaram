<?php
<<<<<<< HEAD
	$servername = "server103.microhosting.in:3306";
	$username = "vistaram";
	$password = "fc0RiT072j";
/*
// Create connection
	$conn = new mysqli($servername, $username, $password);

// Check connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}	 
	echo "Connected successfully";
  */
        try {
    	$conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    	// set the PDO error mode to exception
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	echo "Connected successfully"; 
    	}
   	catch(PDOException $e)
    	{
    	echo "Connection failed: " . $e->getMessage();
    	}

?>
=======
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
>>>>>>> c4b236b1c61157b69256e52e631bcf39aee6bafc
