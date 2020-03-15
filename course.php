<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
if($conn->connect_error)
    die("not connected:".$conn->connect_error);
if (isset($_POST['submit'])){
    $course_name = mysqli_real_escape_string($conn, $_REQUEST['c_name']);
    //$_SESSION['email']=$un;
    $c_id = mysqli_real_escape_string($conn, $_REQUEST['c_id']);
    $d_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);
    $year = mysqli_real_escape_string($conn, $_REQUEST['year']);
    $sem = mysqli_real_escape_string($conn, $_REQUEST['semester']);
    $credit = mysqli_real_escape_string($conn, $_REQUEST['credit']);
    
    $sql = "INSERT INTO course (course_id, course_name, department_name, year, credits, semester) VALUES ('$c_id', '$course_name', '$d_name', '$year', '$credit', '$sem')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:success.php");

    }
 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}

$akash="SELECT department_name FROM department";
$get=mysqli_query($conn, $akash);

$option = '';

 while($row = mysqli_fetch_assoc($get))
{
  $option .= '<option value = "'.$row['department_name'].'">'.$row['department_name'].'</option>';
}
if (isset($_POST['submit1'])){
    $course_name = mysqli_real_escape_string($conn, $_REQUEST['c_name']);
    //$_SESSION['email']=$un;
    $c_id = mysqli_real_escape_string($conn, $_REQUEST['c_id']);
    $d_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);
    $year = mysqli_real_escape_string($conn, $_REQUEST['year']);
    $sem = mysqli_real_escape_string($conn, $_REQUEST['semester']);
    $credit = mysqli_real_escape_string($conn, $_REQUEST['credit']);
    
    $sql = "INSERT INTO course (course_id, course_name, department_name, year, credits, semester) VALUES ('$c_id', '$course_name', '$d_name', '$year', '$credit', '$sem')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
    header("Location:course.php");

    }
 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}}

// Close connection
mysqli_close($conn);



ob_flush();
?>






<!DOCTYPE html>
<html lang="en">
<head>
	<title>Courses</title>
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
  padding-bottom:1%;
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
    </style>
</head>
<body class="bg1-image">
<div class="bg-image">
		<h1 class="s" > Add Course Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" class="t1" ><strong>Enter the Particulars :</strong></label>
    <form action="" method="POST">
		<div class="form-row">
			<div class="si col-md-10">
				<label for="cid">Course ID</label>
				<input type="text" class="form-control" name="c_id" placeholder="enter the Course ID" required>
				<br>
				</div> 
				<div class="si col-md-10">
				<label for="cname">Course Name</label>
				<input type="text" class="form-control" name="c_name" placeholder="enter the Course Name" required>
				<br>
				</div> 
        <div class="si col-md-10">
        <label for="dname">Department Name</label>
        <select class="form-control" name="d_name"  required>
          <option value="" disabled selected>Choose</option>
                  <?php echo $option; ?>
                </select>
        <br>
        </div> 
        <div class="si col-md-10">
        <label for="years">Year</label>
        <input type="text" class="form-control" name="year" placeholder="enter the Year" required>
        <br>
        </div> 
        <div class="si col-md-10">
        <label for="credits">Credits</label>
        <input type="text" class="form-control" name="credit" placeholder="enter the Credits" required>
        <br>
        </div> 
        <div class="si col-md-10">
        <label for="sem">Semester</label>
        <input type="text" class="form-control" name="semester" placeholder="choose" required>
        <br>
        </div> 
            <div class="form-group col-md-6">
            <div class="modal-footer d-flex center-block justify-content-center">
        <button class="btn btn-default" type="submit" name="submit">Save</button>
      </div></div>
      <div class="form-group col-md-6">
        <div class="modal-footer d-flex center-block justify-content-center">
        <button class="btn btn-default" type="submit1" name="submit1">Add More</button>
      </div></div>

        </div>
      </form>
    </div>
</body>
</html>