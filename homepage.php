<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	
</head>
<body>
	<h1>Welcome, <?php 
		if(isset($_SESSION['username'])){
			echo $_SESSION['username'];
		}

	?>
		
	</h1>

	<a href="logout.php">Logout</a>

</body>
</html>