<?php

	session_start();
	ob_start();
	$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
    $teacher_id=$_SESSION["teacher_id"];
    $department_name=$_SESSION["department_name"];
    $course_id=$_SESSION["course_id"];
    $year=$_SESSION["year"];
    $get_section="SELECT distinct section FROM student where department_name='$department_name' and year='$year'";
    $get=mysqli_query($conn, $get_section);
    $option = '';
	while($row = mysqli_fetch_assoc($get))
	{
	$option .= '<option value = "'.$row['section'].'" >'.$row['section'].'</option>';
	}
	if (isset($_POST['submit'])){
    $section = mysqli_real_escape_string($conn, $_REQUEST['section']);
    $sql = "INSERT INTO fac_course (section, course_id,teacher_id,department_id, year) VALUES ('$section', '$course_id', '$department_name', '$teacher_id', '$year')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
		header("Location:success1.php");

		}

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}
if (isset($_POST['submit1'])){
    $section = mysqli_real_escape_string($conn, $_REQUEST['section']);
    $_SESSION['section']=$section;
    $sql = "INSERT INTO fac_course (section, course_id,  teacher_id,department_id, year) VALUES ('$section', '$course_id', '$teacher_id', '$department_name', '$year')";
    if(mysqli_query($conn, $sql)){
    echo "recorded";
		header("Location:Faculty_course.php");

		}

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}
mysqli_close($conn);
ob_flush();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Allocate</title>
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
		
		<form name="forms" action="" method="POST">
		<div class="form-row">
				<div class="form-group col-md-12">
                <label for="dname">Section</label>
                <select class="form-control" name="section" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $option; ?>
                </select>
                <br>
                
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
