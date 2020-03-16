<?php
session_start();
	ob_start();
	$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
$department_name=$_SESSION["department_name"];
$year=$_SESSION["year"];
$slot_id=$_SESSION["slot_id"];
$day_id=$_SESSION["day_id"];
$semester=$_SESSION["semester"];
$section=$_SESSION["section"];
$block=$_SESSION["block"];
$course_id=$_SESSION["course_id"];
$teacher_id=$_SESSION["teacher_id"];
$class_lab=$_SESSION["class_lab"];

$akash="SELECT distinct roomno FROM classrooms where lab_class='$class_lab' and block='$block' order by roomno";
$get=mysqli_query($conn, $akash);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
	$option .= '<option value = "'.$row['roomno'].'">'.$row['roomno'].'</option>';
}

if (isset($_POST['submit'])){
    //$teacher_id = mysqli_real_escape_string($conn, $_REQUEST['teacher']);
$room_no = mysqli_real_escape_string($conn,$_REQUEST['room_no']);
$sql = "INSERT INTO time VALUES ('$room_no', '$block', '$slot_id', '$day_id', '$teacher_id', '$course_id', '$department_name', '$section', '$year', '$class_lab', '$semester')";
    if(mysqli_query($conn, $sql)){
    //echo "recorded";

  // header("Location:select_section1.php");

    }
 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$sql1="UPDATE avail_teacher set avail= '1'where department_name='$department_name' and teacher_id='$teacher_id' and  slot='$slot_id' and day='$day_id'";
if(mysqli_query($conn, $sql1)){
    //echo "recorded";

   //header("Location:select_section1.php");

    }
 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
if($semester%2==0){$s=2;}
else {$s=1;}
$sql1="UPDATE avail_class set avail= '1'where room_no='$room_no' and block='$block' and semester='$s' and  slot='$slot_id' and day='$day_id'";
if(mysqli_query($conn, $sql1)){
    //echo "recorded";

   //header("Location:select_section1.php");

    }
 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
$sql1="UPDATE availability set avail='1' where department_name='$department_name' and section='$section' and semester='$semester' and year='$year' and slot='$slot_id' and day='$day_id'";
if(mysqli_query($conn, $sql1)){
    //echo "recorded";

   header("location:table.php");

    }
 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


}

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

	<label for="type"  ><strong>Enter the Particulars :</strong></label>
		<form action="" method="POST">
		<div class="form-row">
			<div class="form-group col-md-12">
                <label for="dname">Room/lab Number:</label>
                <select class="form-control" name="room_no" placeholder="choose" required>
                	<option value="" disabled selected>Choose</option>
                	<?php echo $option; ?>
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
