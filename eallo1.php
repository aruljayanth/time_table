<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

$department_name=$_GET['dn'];
$_SESSION['department_name']=$department_name;
$year=$_GET['year'];
$_SESSION['year']=$year;
$slot_id=$_GET['j'];
$_SESSION['slot_id']=$slot_id;
$day_id=$_GET['i'];
$_SESSION['day_id']=$day_id;
$semester=$_GET['semester'];
$_SESSION['semester']=$semester;
$section=$_GET['section'];
$_SESSION['section']=$section;
$akash="SELECT distinct course_id FROM course where department_name='$department_name' and semester='$semester'";
$get=mysqli_query($conn, $akash);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
	$option .= '<option value = "'.$row['course_id'].'">'.$row['course_id'].'</option>';
}
$blocks="SELECT distinct block FROM department";
$get=mysqli_query($conn, $blocks);
$options = '';
while($row = mysqli_fetch_assoc($get))
{
	$options .= '<option value = "'.$row['block'].'">'.$row['block'].'</option>';
}

if (isset($_POST['submit'])){
    //$teacher_id = mysqli_real_escape_string($conn, $_REQUEST['teacher']);
$course_id = mysqli_real_escape_string($conn,$_REQUEST['courseid']);
$_SESSION['course_id']=$course_id;

$teachers="SELECT teacher_id FROM fac_course where section='$section' and department_id='$department_name' and year='$year' and course_id='$course_id'";

$get=mysqli_query($conn, $teachers);
$row = mysqli_fetch_assoc($get);
$r=$row['teacher_id'];

$teachers1="INSERT INTO timing VALUES('A102','AB3','$slot_id' ,'$day_id','$r','$course_id','$department_name','$section','$year','0','$semester')";

//$teachers1="INSERT INTO timing VALUES('A102','AB3','1','','CSE102','15CSE380','CSE','A','1','0','1')";

$get0=mysqli_query($conn, $teachers1);

$block= mysqli_real_escape_string($conn,$_REQUEST['block']);
$_SESSION['block']=$block;


while($row = mysqli_fetch_assoc($get))
{    $r=$row['teacher_id'];
     $_SESSION['teacher_id']=$r;
}
$class_lab=mysqli_real_escape_string($conn,$_REQUEST['class_lab']);
$_SESSION['class_lab']=$class_lab;
header("Location: eall02.php");
}
//echo $r;
mysqli_close($conn);
ob_flush();
 ?>



<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>allocation</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="faculty.css">
    <style>
    	.container{
         font-size: 20px;
    	}
    	.hello1{
 	font-size:20px;

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
		<h1 class="heading text-center" > Add The Slot </h1>
		<hr size="20" width="75%" align="center" color="green">
		<div>
		<label class="hello1"> Day:&nbsp;&nbsp </label><label><?php echo $day_id; ?></label></div>

		<div>
		<label class="hello1"> Slot:&nbsp;&nbsp </label><label><?php echo $slot_id; ?></label></div>
		<div>
		<label class="hello1"> Department Name:&nbsp;&nbsp </label><label><?php echo $department_name; ?></label></div>
		<div>
		<label class="hello1"> Section:&nbsp;&nbsp </label><label><?php echo $section; ?></label></div>
		<div>
		<label class="hello1"> Semester:&nbsp;&nbsp </label><label><?php echo $semester ?></label></div>
		<div>
		<label class="hello1"> Year:&nbsp;&nbsp </label><label><?php echo $year; ?></label></div>

		<label for="type"  ><strong>Enter the Particulars :</strong></label>
		<form action="" method="POST">
		<div class="form-row">
			<div class="form-group col-md-6">
                <label for="dname">Course Id</label>
                <select class="form-control" name="courseid" placeholder="choose" required>
                	<option value="" disabled selected>Choose</option>
                	<?php echo $option; ?>
                </select>
                <br>

            </div>
            <div class="form-group col-md-6">
                <label for="dname">Class/Lab:</label>
                <select class="form-control" name="class_lab" placeholder="choose" required>
                	<option value="" disabled selected>Choose</option>
                	<option value="1">Class</option>
                	<option value="0">Lab</option>
                </select>
                <br>

            </div>

               <div class="form-group col-md-12">
                <label for="dname">Block</label>
                <select class="form-control" name="block" placeholder="choose" required>
                	<option value="" disabled selected>Choose</option>
                	<?php echo $options; ?>
                </select>
                <br>

            </div>



            <div class="form-group col-md-12">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Save</button>
      </div>
  </div>
		</div>
	</form>
</div>

</body>
</html>
