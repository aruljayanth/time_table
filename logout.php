<?php

	session_start();
	ob_start();
	$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
    $un=$_SESSION["email"];
    $sql = "UPDATE signin set state='out' where emailid='$un'";
if(mysqli_query($conn, $sql)){
    //echo "Logout successful";
   header("Location:index.html");
}
    else{
    	echo "error:". mysqli_error($conn);
    }

	session_destroy();
	ob_flush();



?>



<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>logout</title>
</head>
<body>
<h1> logout successful</h1>
</body>
</html>
