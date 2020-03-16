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
<!DOCTYPE HTML>
<html lang="en">
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

.bg1-image {
  /* The image used */
  background-image: url("images/c2.jpg");

      /* Add the blur effect */



  /* Full height */
  padding-bottom: 7%;
  height: 50%;
  width: 100%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .s{
    margin-left: 40%;
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
  padding-top: 10%;
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

		<form name="forms" action="" method="POST">
		<div class="form-row">
				<div class="si  col-md-10" style="padding-bottom: 5%;">
                <label for="dname">Section</label>
                <select class="form-control" name="section" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $option; ?>
                </select>
                <br>
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
