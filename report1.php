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

<!DOCTYPE html>
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
 
    </style>
</head>
<body>
	<div class="container">
		<h1 class="heading text-center" > Faculty Course Report </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" style="margin-bottom: 30px; text-align: center;" class="hello" ><strong>Teacher Name: <?php echo $teacher_name; ?></strong></label>
		<?php

		echo "<table class=\" table table-bordered\">";
		echo "<tr> <th>Course Name</th> <th> Credits </th></tr>";
		$akash="SELECT * FROM fac_course where teacher_id='$teacher_id'";
$get=mysqli_query($conn, $akash);

while($row = mysqli_fetch_assoc($get))
{ echo "<tr>";
  $o= $row['course_id'];
  $akash1="SELECT credits FROM course where course_id='$o'";
$get1=mysqli_query($conn, $akash1);
$row1 = mysqli_fetch_assoc($get1);
  $a= $row1['credits'];
  echo "<td> $o </td>";
  echo "<td> $a </td>";
  echo "</tr>";

}
		?>
	</div>
</body>
</html>