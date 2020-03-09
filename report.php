<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

  

if (isset($_POST['submit'])){
    

    $teacher_id = mysqli_real_escape_string($conn, $_REQUEST['t_num']);
    $_SESSION['teacher_id']=$teacher_id;
    
    $department_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);
    $_SESSION['department_name']=$department_name;
    $semester = mysqli_real_escape_string($conn, $_REQUEST['sem']);
    $_SESSION['semester']=$semester;
    
    header("Location:report1.php");

    
    
}
$akash="SELECT distinct teacher_name,teacher_id FROM teacher order by teacher_name";
$get=mysqli_query($conn, $akash);
$options = '';
while($row = mysqli_fetch_assoc($get))
{
  $options .= '<option value = "'.$row['teacher_id'].'">'.$row['teacher_name']." (".$row['teacher_id'].")".'</option>';
}
$akash="SELECT distinct semester FROM student order by semester";
$get=mysqli_query($conn, $akash);
$options1 = '';
while($row = mysqli_fetch_assoc($get))
{
  $options1 .= '<option value = "'.$row['semester'].'">'.$row['semester'].'</option>';
}


$get_department_name="SELECT department_name FROM department";
$get=mysqli_query($conn, $get_department_name);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
$option .= '<option value = "'.$row['department_name'].'" type="submit" name="submit3">'.$row['department_name'].'</option>';
}



/*if(isset($department_name)){
  if(isset($year)){
    $section="SELECT distinct  section FROM student where department_name='$department_name' and year='$year'";
if($get=mysqli_query($conn, $section)){
$options = '';
while($row = mysqli_fetch_assoc($get))
{
  $options .= '<option value = "'.$row['section'].'">'.$row['section'].'</option>';
}
}
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($conn); 
} 
}
}*/


mysqli_close($conn);



ob_flush();
?>



<!DOCTYPE html>
<html>
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
		<h1 class="heading text-center" > Add  Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" class="hello" ><strong>Enter the Particulars :</strong></label>
		<form name="forms" action="" method="POST">
		<div class="form-row">
			
				


            <div class="form-group col-md-12">
                <label for="dname">Department Name</label>
                <select class="form-control" id="d_name" name="d_name" placeholder="choose" required>
                	<option value="" disabled selected>Choose</option>
                	<?php echo $option; ?>
                </select>
                <br>

                
            </div>
            <div class="form-group col-md-12">
        <label for="t_no">Teacher's Name</label>
        <select class="form-control" id="d_name" name="t_num" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $options; ?>
                </select>
                <br>
        </div> 
        <div class="form-group col-md-12">
        <label for="t_no">Semester</label>
        <select class="form-control" id="d_name" name="sem" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $options1; ?>
                </select>
                <br>
        </div> 
            <div class="form-group col-md-12">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit1" name="submit">Next</button>
      </div>
  </div>
            
            
         
         </div>
        </div>
    </form>
    </div>
</body>
</html>