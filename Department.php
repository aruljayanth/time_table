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
.bg1-image {
  /* The image used */
  background-image: url("images/c2.jpg");
  
      /* Add the blur effect */
 
  
  
  /* Full height */
  padding-bottom: 75%;
  height: 50%; 
  width: 100%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .s{
    margin-left: 30%;
    margin-right: 8%;
    align-content: center;
    font-style: bold;
    font-size: 60px;
    color: black;
  }
  .t1{
    margin-left: 4%;
    margin-right: 8%;
    font-style: bold;
    font-size: 30px;
    color: black;
  }
  .si{
    margin-left: 8%;
    margin-right: 10%;
    align-content: center;
    font-style: bold;
    font-size: 15px;
    color: white;
  }
        .bg-image {
  /* The image used */
  background-image: url("images/b.png");
  border-radius: 50px;
  margin-bottom: 50px;
      /* Add the blur effect */
 
  
  
  /* Full height */
  height: 10%; 
  width: 90%;
  margin-left: 5%;
  padding-top: 1%;
  margin-top: 5%;
  padding-bottom: 10%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
    </style>
</head>
<body class="bg1-image">
<div class="bg-image">

		<h1 class="s" > Add Department Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" class="t1" ><strong>Enter the Particulars :</strong></label>
    <form action="" method="POST">
		<div class="form-row">
			<div class="si col-md-10">
				<label for="d_name">Department Name</label>
				<input type="text" class="form-control" name="d_name" placeholder="Enter the Department Name" required>
				<br>
				</div> 
				<div class="si col-md-10">
				<label for="did">Department ID</label>
				<input type="text" class="form-control" name="d_id" placeholder="Enter the Department ID" required>
				<br>
				</div> 
        <div class="si col-md-10">
        <label for="teacher_name">Block</label>
        <input type="text" class="form-control" name="b_name" placeholder="Enter the Block Name" required>
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