<?php
	
	include 'dboperations.php';
	$username = $password = "";
	$usernameErr = $passwordErr = "";
	$flag = false;
	$successfulMessage = $errorMessage = "";


	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (empty($username)) {
			$usernameErr = "Field can not be enpty";
			$flag = true;
		}
		if (empty($password)) {
			$passwordErr = "Field can not be enpty";
			$flag = true;
		}
		if(!$flag)
		{
			$res = login($username, $password);
			if($res) {
			$successfulMessage = "Sucessfully saved.";
			session_start();
			$_SESSION['username'] = $username;
			header("Location: homepage.php");
			}
			else {
			$errorMessage = "Login Failed";
			}

		}


	}


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<h1>Login Form</h1>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<fieldset>
			<legend>Account Information</legend>
			<table>

				<tr>
				<td><label for="username">Username<span style="color: red;">*</span>: </label></td>
				<td><input type="text" name="username" id="username"></td>
				<td><span style="color: red;"><?php echo $usernameErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="password">Password<span style="color: red;">*</span>: </label></td>
				<td><input type="password" name="password" id="password"></td>
				<td><span style="color: red;"><?php echo $passwordErr; ?></span></td>
			</tr>
			</table>
			<input type="submit" name="login" value="LOGIN">
			<a href="form_submission.php">REGISTER</a>
		</fieldset>
		<br>
		<span style="color: green"><?php echo $successfulMessage; ?></span>
		<span style="color: red"><?php echo $errorMessage; ?></span>
	</form>


	<?php
	
		/*$fileData = read();
		echo "<br><br>";
		$fileDataExplode = explode("\n", $fileData);



		echo "<ol>";
		for($i = 0; $i < count($fileDataExplode) - 1; $i++) {
		$temp = json_decode($fileDataExplode[$i]);
		echo "<li>" . "First Name: " . $temp->firstname . " Last Name: " . $temp->lastname . "</li>";
		}
		echo "</ol>";*/



		function read() {
		$file = fopen(filepath, "r");
		$fz = filesize(filepath);
		$fr = "";
		if($fz > 0) {
		$fr = fread($file, $fz);
		}
		fclose($file);
		return $fr;
		}
		?>

</body>
</html>