<?php
	session_start();
	
	if(!$_SESSION['VALID_USER']){
		header("Location:login.html");
		exit;
	}
?>

<html>
	
	<body>
		<h1>Welcome to Vistaram</h1>
		
		<h2> Welcome <?php $_SESSION['USER_LOGGED_IN'] ?>!</h2>
		
		<h2>This site is under construction</h2>
		
	</body>

</html>