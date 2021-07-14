<?php

	include 'dboperations.php';

	$firstName = $lastName = $gender = $dob = $religion = "";
	$present_address = $parmanent_address = $phone = $email = $website = "";
	$username = $password = "";
	$firstNameErr = $lastNameErr = $genderErr = $dobErr = $religionErr = $emailErr = $usernameErr = $passwordErr = "";
	$flag = false;
	$successfulMessage = $errorMessage = "";

	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		//$gender = $_POST['gender'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$religion = $_POST['religion'];
		$present_address = $_POST['present_address'];
		$parmanent_address = $_POST['parmanent_address'];
		$phone = $_POST['Phone'];
		$email = $_POST['email'];
		$website = $_POST['website'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (empty($firstName)) {
			$firstNameErr = "Field can not be enpty";
			$flag = true;
		}
		if (empty($gender)) {
			$genderErr = "Field can not be enpty";
			$flag = true;
		}
		if (empty($lastName)) {
			$lastNameErr = "Field can not be enpty";
			$flag = true;
		}
		if (empty($dob)) {
			$dobErr = "Field can not be enpty";
			$flag = true;
		}
		if (empty($religion)) {
			$religion = "Field can not be enpty";
			$flag = true;
		}
		if (empty($email)) {
			$emailErr = "Field can not be enpty";
			$flag = true;
		}
		if (empty($username)) {
			$usernameErr = "Field can not be enpty";
			$flag = true;
		}
		if (empty($password)) {
			$passwordErr = "Field can not be enpty";
			$flag = true;
		}
		if(!$flag) {
		
		$res = register($firstName, $lastName, $gender, $dob, $religion, $present_address, $parmanent_address, $phone, $email, $website, $username, $password);
		if($res) {
		$successfulMessage = "Sucessfully saved.";
		}
		else {
		$errorMessage = "Error while saving.";
		}
		}


	}


	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}



	function write($content) {
	$file = fopen(filepath, "w");
	$fw = fwrite($file, $content . "\n");
	fclose($file);
	return $fw;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
	<h1>Registration Form</h1>
</head>
<body>
	
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<fieldset>
		<legend>Basic Information</legend>
		<table>
			<tr>
				<td><label for="firstname">First Name<span style="color: red">*</span>: </label></td>
				<td><input type="text" name="firstname" id="firstname"></td>
				<td><span style="color: red"><?php echo $firstNameErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="lastname">Last Name<span style="color: red">*</span>: </label></td>
				<td><input type="text" name="lastname" id="lastname"></td>
				<td><span style="color: red"><?php echo $lastNameErr; ?></span></td>

			</tr>
			<tr>
				<td><label for="gender">Gender<span style="color: red">*</span>: </label></td>
				<td>
					<input name="gender" value="Male" type="radio">Male
					<input name="gender" value="Female" type="radio">Female
					<input name="gender" value="Other" type="radio">Other
				</td>
				<td><span style="color: red"><?php echo $genderErr; ?></span></td>
			</tr>
			<tr>
				<td><label for = "dob">DOB<span style="color: red">*</span>: </label></td>
				<td><input type="date" name="dob" id="dob"></td>
				<td><span style="color: red"><?php echo $dobErr; ?></span></td>
			<tr>
					<td><label for="religion">Religion<span style="color: red">*</span>: </label></td>
					<td>
						<select name="religion">
							<option value="hindu">Hindu</option>
							<option value="muslim">Muslin</option>
							<option value="other">Other</option>
						</select>
					</td>
					<td><span style="color: red"><?php echo $religionErr; ?></span></td>
				</tr>
			</tr>
		</table>
	</fieldset>

	<fieldset>
		<legend>Contact Information</legend>
		<table>
			<tr>
				<td><label for="present_address">Present Address</label></td>
				<td><input type="textarea" name="present_address" id="present_address"></td>
				<td></td>
			</tr>
			<tr>
				<td><label for="parmanent_address">Parmanent Address</label></td>
				<td><input type="textarea" name="parmanent_address" id="parmanent_address"></td>
				<td></td>
			</tr>
			<tr>
				<td><label for="Phone">Phone</label></td>
				<td><input type="Phone" name="Phone" id="Phone"></td>
				<td></td>
			</tr>
			<tr>
				<td><label for="email">Email<span style="color: red">*</span>: </label></td>
				<td><input type="email" name="email" id="email"></td>
				<td><span style="color: red"><?php echo $emailErr; ?></span></td>

			</tr>
			<tr>
				<td><label for="website">Personal Website Link</label></td>
				<td><input type="website" name="website" id="website"></td>
				<td></td>

			</tr>
		</table>
	</fieldset>

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
	</fieldset>

	<input type="submit" name="submit" value="REGISTER">
	<a href="login-form.php">Login</a>
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

			