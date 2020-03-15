<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

if (isset($_POST['submit'])){
    

    $course_id = mysqli_real_escape_string($conn, $_REQUEST['t_num']);
    //$_SESSION['email']=$un;
    $teacher_name = mysqli_real_escape_string($conn, $_REQUEST['t_name']);
    $max_credit = mysqli_real_escape_string($conn, $_REQUEST['m_credits']);
    $department_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);
    
    $sql = "DELETE FROM course where course_id='$course_id'";
    if(mysqli_query($conn, $sql)){
    echo "deleted";
		header("Location:success.php");

		}

 else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    echo "<script>";
    echo "window.alert(\"enter the valid Teacher ID\")";
    echo "</script>";
}}
$akash="SELECT distinct department_name FROM department";
$get=mysqli_query($conn, $akash);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
	$option .= '<option value = "'.$row['department_name'].'">'.$row['department_name'].'</option>';
}


if (isset($_POST['submit1'])){
    

    $teacher_id = mysqli_real_escape_string($conn, $_REQUEST['t_num']);
    //$_SESSION['email']=$un;
    
    $department_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);
    
    $sql = "DELETE FROM course where course_id='$teacher_id'";
    if(mysqli_query($conn, $sql)){
    echo "deleted";
		header("Location:course1.php");

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
  padding-bottom: 10%;
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
		<h1 class="s" > Remove Course Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" class="t1" ><strong>Enter the Particulars :</strong></label>
		<form action="" method="POST">
		<div class="form-row">
			<div class="si col-md-10">
				<label for="t_no">Course ID</label>
				<input type="text" class="form-control" name="t_num" placeholder="Enter the Course Id" required>
				<br>
				</div>

            <div class="si col-md-10">
                <label for="dname">Department Name</label>
                <select class="form-control" name="d_name" placeholder="choose" required>
                	<option value="" disabled selected>Choose</option>
                	<?php echo $option; ?>
                </select>
                <br>
                
            </div>
            
            
         
         <div class="form-group col-md-6">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Remove</button>
      </div></div>
      <div class="form-group col-md-6">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit1">Remove more</button>
      </div>
  </div>
        </div>
    </form>
    </div>
</body>
</html>