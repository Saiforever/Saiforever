<?php
   $fullname = $_POST['fullname'];
   $howmanypeople = $_POST['number'];
   $dateandtimings= $_POST['date'];
   $specialrequirements= $_POST['specialrequirements'];
   
   // Database connection
   $conn = new mysqli('localhost','root','','bookings');
   if($conn->connect_error){
   	echo "$conn->connect_error";
   	die("Booking cancled : ". $conn->connect_error);
   } else {
   
   	$stmt = $conn->prepare("insert into tables(fullname, number, date, message) 
   	values(?, ?, ?, ?)");
   	$stmt->bind_param("siis", $fullname, $howmanypeople, $dateandtimings, $specialrequirements);
   	$execval = $stmt->execute();
      $stmt = $conn->prepare("select id tables where id =" ) ;
   	echo "Successfully Booked...";
      // echo "<a href='viewTableInvioce.html?id=$_GET['id']>Continue Bookings</a>";
   	$stmt->close();
   	$conn->close();
   }
   ?>