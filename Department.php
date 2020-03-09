<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";

if (isset($_POST['submit'])){
    $conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

    $department_name = mysqli_real_escape_string($conn, $_REQUEST['d_id']);
    //$_SESSION['email']=$un;
    $b_name = mysqli_real_escape_string($conn, $_REQUEST['b_name']);
    $d_id = mysqli_real_escape_string($conn, $_REQUEST['d_name']);
    
    $sql = "INSERT INTO department (department_name, block, department_id) VALUES ('$department_name', '$b_name', '$d_id')";
    if(mysqli_query($conn, $sql)){
    echo "
      recorded";}
 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
}


ob_flush();
?>








<!DOCTYPE html>
<html lang="en">
<head>
	<title>Department</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="faculty.css">
    
     <style>
        * {
            font-family: 'Roboto Slab', serif;
        }

    body{

background-color: #01579B;
  background-repeat: no-repeat;
  background-size:cover;
  
}
.container{
  background-color: #B3E5FC;
}

    </style>
</head>
<body>
<div class="container">

		<h1 class="heading text-center" > Add Department Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" class="hello" ><strong>Enter the Particulars :</strong></label>
    <form action="" method="POST">
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="d_name">Department Name</label>
				<input type="text" class="form-control" name="d_name" placeholder="enter the Department Name" required>
				<br>
				</div> 
				<div class="form-group col-md-12">
				<label for="did">Department ID</label>
				<input type="text" class="form-control" name="d_id" placeholder="enter the Department ID" required>
				<br>
				</div> 
        <div class="form-group col-md-12">
        <label for="teacher_name">Block</label>
        <input type="text" class="form-control" name="b_name" placeholder="enter the Block Name" required>
        <br>
        </div> 


       <div class="modal-footer d-flex center-block justify-content-center">
        <input class="btn btn-default" type="submit" name="submit" value ="Add">
      </div>
            
        </div>
      </form>
    </div>
</body>
</html>