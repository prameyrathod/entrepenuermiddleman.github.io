<?php
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$interest = $_POST['interest'];
	$message = $_POST['message'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','entreprenuerMiddleman');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into updateform(fullName, email, interest, message,  number) values( ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $fullName, $email, $interest, $message, $number);
		$execval = $stmt->execute();
		echo $execval;
		header("Location:requestLanding.html");
		$stmt->close();
		$conn->close();
	}
?>