<?php
	$firstName = $_POST['firstName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $teamName = $_POST['teamName'];
    $members = $_POST['members'];
    $membersName = $_POST['membersName'];
    $membersEmail = $_POST['membersEmail'];
    $ieeeName = $_POST['ieeeName'];
    $ieeeId = $_POST['ieeeId'];

	// Database connection
	$conn = new mysqli('localhost','root','','testpes');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ".$conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName,phoneNumber,email,teamName,members,membersName,memebersEmail,ieeeName,ieeeId) values(?, ?, ?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("sissssssi", $firstName,$phoneNumber,$email,$teamName,$members,$membersName,$memebersEmail,$ieeeName,$ieeeId);
	    $stmt->execute();
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>  