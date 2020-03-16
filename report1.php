<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

$department_name=$_SESSION["department_name"];
$semester=$_SESSION["semester"];
$teacher_id=$_SESSION["teacher_id"];
$akash="SELECT teacher_name  FROM teacher where teacher_id='$teacher_id'";
$get=mysqli_query($conn, $akash);
$row = mysqli_fetch_assoc($get);
$teacher_name=$row['teacher_name'];
$akash="SELECT count(*)  FROM fac_course where teacher_id='$teacher_id'";
$get=mysqli_query($conn, $akash);

while($row = mysqli_fetch_assoc($get))
{
  $option= $row['count(*)'];
}
//$year=$_SESSION["year"];

?>

<!DOCTYPE HTML>
<html lang="en">
<html>
<head>
	<title>Time Table</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
      .container{
         font-size: 15px;
      }
      .hello1{
  font-size:15px;
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
  height: 100%;
  width: 100%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .si{
    margin-left: 35%;
    margin-right: 8%;
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
  margin-bottom: 250px;
      /* Add the blur effect */



  /* Full height */
  height: 10%;
  width: 90%;
  margin-left: 5%;
  padding-bottom: 9%;
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
		<h1 class="heading text-center" > <p style="color: black; padding-top: 5%;"> Faculty Course Report</p> </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" style="margin-bottom: 30px; text-align: center;" class="si" ><strong><p style="color: black; font-size: 30px;padding-top: 5%;text-align: center;">Teacher Name :  <?php echo $teacher_name; ?></p></strong></label>
		<?php

		echo "<table class=\" table table-bordered\">";
		echo "<p style='padding-left:5%;'><tr> <th><p style='color: white;'> Course Name </p></th> <th><p style='color: white;'> Credits </p></th></tr></p>";
		$akash="SELECT distinct(course_id) FROM fac_course where teacher_id='$teacher_id'";
$get=mysqli_query($conn, $akash);

while($row = mysqli_fetch_assoc($get))
{ echo "<tr>";
  $o= $row['course_id'];
  $akash1="SELECT credits FROM course where course_id='$o'";
$get1=mysqli_query($conn, $akash1);
$row1 = mysqli_fetch_assoc($get1);
  $a= $row1['credits'];
  echo "<td><p style='color: white;'> $o </p></td>";
  echo "<td><p style='color: white;'> $a </p></td>";
}

echo "</tr>";
		?>
	</div>
</body>
</html>
