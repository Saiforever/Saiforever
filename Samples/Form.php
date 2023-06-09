<?php
	$firstName = $_POST['firstName'];
	$GoodName = $_POST['GoodName'];
	$Howmanypeople = $_POST['Howmanypeople'];
	$Dateandtimings= $_POST['Dateandtimings'];
	$MessageorSpecialrequirements= $_POST['MessageorSpecialrequirements'];

	// Database connection
	$conn = new mysqli('localhost','root','','Forms');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Booking cancled : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, GoodName, Howmanypeople, Dateandtimings, MessageorSpecialrequirements,) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $GoodName, $Howmanypeople, $Dateandtimings, $MessageorSpecialrequirements,);
		$execval = $stmt->execute();
		echo $execval;
		echo "Successfully Booked...";
		$stmt->close();
		$conn->close();
	}
?>