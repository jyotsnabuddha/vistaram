<?php

	/**
	* Use this function to query the db and compare the passed in user and password 
	*
	*/
	function validateUser($username, $password){
		if($username == "venkat" && $password == "12345"){
			$_SESSION['VALID_USER'] = true;
			$_SESSION['USER_LOGGED_IN'] = $username;
			return true;
		} 
		return false;
	}
	
	
	session_start();
	
	if(!$_SESSION[VALID_USER]){
		$username = $_POST["username"];
		$password = $_POST["password"];
		if(!validateUser($username, $password)){
			header("Location:login.php");
			exit;
		}
	} else {
		header("Location:home.php");
		exit;
	}
?>