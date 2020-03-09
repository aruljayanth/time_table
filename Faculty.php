<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

if (isset($_POST['submit'])){
    

    $teacher_id = mysqli_real_escape_string($conn, $_REQUEST['t_num']);
    //$_SESSION['email']=$un;
    $teacher_name = mysqli_real_escape_string($conn, $_REQUEST['t_name']);
    $max_credit = mysqli_real_escape_string($conn, $_REQUEST['m_credits']);
    $department_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);
    
    $sql = "INSERT INTO teacher (teacher_id, teacher_name, max_credit, department_name) VALUES ('$teacher_id', '$teacher_name', '$max_credit', '$department_name')";
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
    

    $teacher_id = mysqli_real_escape_string($conn, $_REQUEST['t_num']);
    //$_SESSION['email']=$un;
    $teacher_name = mysqli_real_escape_string($conn, $_REQUEST['t_name']);
    $max_credit = mysqli_real_escape_string($conn, $_REQUEST['m_credits']);
    $department_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);
    
    $sql = "INSERT INTO teacher (teacher_id, teacher_name, max_credit, department_name) VALUES ('$teacher_id', '$teacher_name', '$max_credit', '$department_name')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
		header("Location:Faculty.php");

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
</style>
</head>
<body>
<div class="container">
		<h1 class="heading text-center" > Add Faculty Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" class="hello" ><strong>Enter the Particulars :</strong></label>
		<form action="" method="POST">
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="t_no">Teacher's ID</label>
				<input type="text" class="form-control" name="t_num" placeholder="enter the Teacher Id" required>
				<br>
				</div> 
				<div class="form-group col-md-12">
				<label for="teacher_name">Teacher's Name</label>
				<input type="text" class="form-control" name="t_name" placeholder="enter the Teacher Name" required>
				<br>
				</div> 

            <div class="form-group col-md-6">
                <label for="dname">Department Name</label>
                <select class="form-control" name="d_name" placeholder="choose" required>
                	<option value="" disabled selected>Choose</option>
                	<?php echo $option; ?>
                </select>
                <br>
                
            </div>
            <div class="form-group col-md-6">
                <label for="mcredits">Maximum Credits</label>
                <input type="text" class="form-control" name="m_credits" placeholder="Enter Maximum Credits"
                     required>
                <br>
                
            </div>
            
         
         <div class="form-group col-md-6">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Save</button>
      </div></div>
      <div class="form-group col-md-6">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit1">Add more</button>
      </div>
  </div></div>
        </div>
    </form>
    </div>
</body>
</html>