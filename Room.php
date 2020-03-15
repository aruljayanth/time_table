<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

if (isset($_POST['submit'])){
    

    $room_id = mysqli_real_escape_string($conn, $_REQUEST['r_num']);
    //$_SESSION['email']=$un;
    $block_name = mysqli_real_escape_string($conn, $_REQUEST['b_name']);
    $lab_class=0;
    if(isset($_POST['optradio']))
    {
     echo "You have selected :".$_POST['optradio'];
     if($_POST['optradio']==="Class_Room")
     {
     	$lab_class=0;
     }
     else $lab_class=1;  //  Displaying Selected Value
     }
    
    $sql = "INSERT INTO classrooms (roomno, block, lab_class) VALUES ('$room_id', '$block_name', '$lab_class')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
		header("Location:success.php");

		}

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}
$akash="SELECT distinct department_name FROM department";
$get=mysqli_query($conn, $akash);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
	$option .= '<option value = "'.$row['department_name'].'">'.$row['department_name'].'</option>';
}


if (isset($_POST['submit1'])){
    

    $room_id = mysqli_real_escape_string($conn, $_REQUEST['r_num']);
    //$_SESSION['email']=$un;
    $block_name = mysqli_real_escape_string($conn, $_REQUEST['b_name']);
    $lab_class=0;
    if(isset($_POST['optradio']))
    {
     echo "You have selected :".$_POST['optradio'];
     if($_POST['optradio']==="Class_Room")
     {
     	$lab_class=0;
     }
     else $lab_class=1;  //  Displaying Selected Value
     }
    
    $sql = "INSERT INTO classrooms (roomno, block, lab_class) VALUES ('$room_id', '$block_name', '$lab_class')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
		header("Location:Room.php");

		}

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}
mysqli_close($conn);



ob_flush();
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>Faculty</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="faculty.css">
    <style type="text/css">
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
  padding-bottom: 1%;
  height: 50%; 
  width: 100%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .s{
    margin-left: 10%;
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
  border-bottom: 25px;
  margin-bottom: 100px;
      /* Add the blur effect */
 
  
  
  /* Full height */
  height: 10%; 
  width: 90%;
  margin-left: 5%;
  padding-top: 1%;
  margin-top: 5%;
  padding-bottom: 1%;
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
		<h1 class="s text-center" > Add Room Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" class="t1" ><strong>Enter the Particulars :</strong></label>
		<form action="" method="POST">
		<div class="form-row">
			<div class="si col-md-10">
				<label for="t_no">Room No:</label>
				<input type="text" class="form-control" name="r_num" placeholder="enter the Room No" required>
				<br>
				</div> 
				<div class="si col-md-10">
				<label for="teacher_name">Block :</label>
				<input type="text" class="form-control" name="b_name" placeholder="enter the Block Name" required>
				<br>
				</div>
				<div class="si col-md-5">
				<label for="type" class="t1" ><strong>Select the Class Type:</strong></label> 
				<div  name="radio" class="si">
                <label><input type="radio" name="optradio" value="Class_Room" checked>Class Room</label>
						</div>
				<div class="si">
  				<label><input type="radio" name="optradio" value="Lab">Lab</label>
				</div>
			</div>
				<div class="form-group col-md-6">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Save</button>
      </div></div>
      <div class="form-group col-md-6">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit1" name="submit1">Add more</button>
      </div>
  </div>
</div>
</form>
</div>
</body>
</html>