<?php
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$feedback = $_POST['feedback'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','entreprenuerMiddleman');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into feedback(fullName, email, gender, feedback,  number) values( ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $fullName, $email, $gender, $feedback, $number);
		$execval = $stmt->execute();
		echo $execval;
		header("Location:landing.html");
		$stmt->close();
		$conn->close();
	}
?>