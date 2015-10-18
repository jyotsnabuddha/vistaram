<?php
	require_once('DBUtility.php');
	/**
	* Use this function to query the db and compare the passed in user and password 
	*
	*/
	function validateUser($username, $password){
		$_SESSION['VALID_USER'] = false;
		$_SESSION['USER_LOGGED_IN'] = null;
		if(DBUtility::validateUserAndPassword($username, $password)){
			$_SESSION['VALID_USER'] = true;
			$_SESSION['USER_LOGGED_IN'] = $username;
			return true;
		} 
		return false;
	}
	
	
	session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];
		if(!validateUser($username, $password)){
			header("Location:login.html");
			exit;
		}  else {
			header("Location:home.php");
			exit;
		}
	
	} else {
		header("Location:login.html");
		exit;
	}
?>