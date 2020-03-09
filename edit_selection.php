<?php 
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

  
$get_department_name="SELECT department_name FROM department";
$get=mysqli_query($conn, $get_department_name);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
$option .= '<option value = "'.$row['department_name'].'" type="submit" name="submit3">'.$row['department_name'].'</option>';
}


if (isset($_POST['submit'])){
    

    //$teacher_id = mysqli_real_escape_string($conn, $_REQUEST['t_num']);
    //$_SESSION['teacher_id']=$teacher_id;
    //$course_id = mysqli_real_escape_string($conn, $_REQUEST['c_id']);
    //$_SESSION['course_id']=$course_id;
    //$sections = mysqli_real_escape_string($conn, $_REQUEST['section']);
    $year = mysqli_real_escape_string($conn, $_REQUEST['year']);
    $_SESSION['year']=$year;
    $department_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);
    $_SESSION['department_name']=$department_name;
    header("Location:edit_selection2.php");

    
    
}
mysqli_close($conn);
ob_flush();
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
		<h1 class="heading text-center" > Add  Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" style="margin-bottom: 30px;" class="hello" ><strong>Enter the Particulars :</strong></label>
		<form name="forms" action="" method="POST">
		<div class="form-row" style="margin-top:-0.0002%;">
			<div class="form-group col-md-6">
                <label for="dname">Department Name</label>
                <select class="form-control" id="d_name" name="d_name" placeholder="choose" required>
                	<option value="" disabled selected>Choose</option>
                	<?php echo $option; ?>
                </select>
                <br>

                
            </div>
            <div class="form-group col-md-6">
                <label for="years">Year</label>
                <select class="form-control" id="year" name="year" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <option value="1">first</option>
                  <option value="2">second</option>
                  <option value="3">third</option>
                  <option value="4">fourth</option>
                </select>
                
                <br>
                
            </div>
            <div class="form-group col-md-12">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit1" name="submit">Next</button>
      </div>
  </div>
            
        </div>
    </form>
</div>
</body>
</html>
