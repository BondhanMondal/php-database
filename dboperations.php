<?php 

	include 'dbconnect.php';
	
	function register($firstname, $lastname, $gender, $dob, $religion, $presentaddress, $parmanentaddress, $phone, $email, $website, $username, $password) {
		$conn = connect();
		$stmt = $conn->prepare("INSERT INTO USERS (first_name, last_name, gender, dob, religion, present_address, parmanent_address, phone, email, website, username, password)
			Values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");

		$stmt->bind_param("ssssssssssss", $firstname, $lastname, $gender, $dob, $religion, $presentaddress, $parmanentaddress, 
			$phone, $email, $website, $username, $password);

		return $stmt->execute();
	}


	function login($username, $password) {
		$conn = connect();
		$stmt = $conn->prepare("SELECT * FROM USERS WHERE username = ? and password = ?");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$records = $stmt->get_result();
		return $records->num_rows === 1;
	}

?>