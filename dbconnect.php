<?php 

	function connect() {
		$conn = new mysqli("localhost", "bondhan", "123456", "wtm");
		if($conn->connect_errno) {
			die("Connection failed due to" . $conn->connect_error);
		}

		return $conn;
	}


?>