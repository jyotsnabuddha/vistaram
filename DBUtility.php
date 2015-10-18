<?php
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
