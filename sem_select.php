<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);


/*$get_department_name="SELECT department_name FROM department";
$get=mysqli_query($conn, $get_department_name);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
$option .= '<option value = "'.$row['department_name'].'" type="submit" name="submit3">'.$row['department_name'].'</option>';
}*/


if (isset($_POST['submit'])){


    //$teacher_id = mysqli_real_escape_string($conn, $_REQUEST['t_num']);
    //$_SESSION['teacher_id']=$teacher_id;
    //$course_id = mysqli_real_escape_string($conn, $_REQUEST['c_id']);
    //$_SESSION['course_id']=$course_id;
    //$sections = mysqli_real_escape_string($conn, $_REQUEST['section']);
    $semester = mysqli_real_escape_string($conn, $_REQUEST['semester']);
    $_SESSION['semester']=$semester;
    $get_department_name="SELECT * FROM student";
$get=mysqli_query($conn, $get_department_name);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
    if($semester=='1')
    {
      switch ($row['year']) {
        case '1':$semester1=1;
          # code...
          break;
          case '2': $semester1=3;
            # code...
            break;
          case '3': $semester1=5;
            # code...
            break;
            case '4': $semester1=7;
              # code...
              break;
        default:
          # code...
          break;
      }

$zero="0";
$nulll="null";
$department_name=$row['department_name'];
$section=$row['section'];
$year=$row['year'];
$room_no=$row['roomno'];
$block=$row['block'];
    for($i=1;$i<=5;$i=$i+1)
    {
      for($j=1;$j<=4;$j=$j+1)
      {
         $sql = "INSERT INTO avail_class VALUES ('$room_no', '$semester', '$j', '$i','$block','0')";
    if(mysqli_query($conn, $sql)){
    //echo "recorded";
    //header("Location:success.php");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  //echo "<script> window.alert(\"data already exists\")</script> ";
}



         $sql = "INSERT INTO availability VALUES ('$department_name', '$section', '$semester1', '$year', '$j', '$i','$zero','$nulll')";
    if(mysqli_query($conn, $sql)){
    //echo "recorded";
    header("Location:success.php");

    }

 else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  echo "<script> window.alert(\"data already exists\")</script> ";
}


      }
    }
  }
  else{
     switch ($row['year']) {
        case '1':$semester1=2;
          # code...
          break;
          case '2': $semester1=4;
            # code...
            break;
          case '3': $semester1=6;
            # code...
            break;
            case '4': $semester1=8;
              # code...
              break;
        default:
          # code...
          break;
      }
      $zero="0";
$nulll="null";
$department_name=$row['department_name'];
$section=$row['section'];
$year=$row['year'];
      for($i=1;$i<=5;$i++)
    {
      for($j=1;$j<=4;$j++)
      {
         $sql = "INSERT INTO avail_class VALUES ('$room_no', '$semester', '$j', '$i','$block','0')";
    if(mysqli_query($conn, $sql)){
    //echo "recorded";
    //header("Location:success.php");

    }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  //echo "<script> window.alert(\"data already exists\")</script> ";
}
         $sql = "INSERT INTO availability VALUES ('$department_name', '$section', '$semester1', '$year', '$j', '$i','$zero','$nulll')";
    if(mysqli_query($conn, $sql)){
    //echo "recorded";
    header("Location:success.php");

    }

 else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  echo "<script> window.alert(\"data already exists\")</script> ";
}


      }
    }


  }
   }
    header("Location:success.php");



}
mysqli_close($conn);
ob_flush();
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
  padding-bottom: 75%;
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
    margin-left: 8%;
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
  border-bottom: 25px;
  margin-bottom: 100px;
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
		<h1 class="s" style="margin-left: 40%;" > Add  Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" style="margin-bottom: 30px;" class="t1" ><strong>Enter the Particulars :</strong></label>
		<form name="forms" action="" method="POST">
		<div class="form-row" style="margin-top:-0.0002%;">

            <div class="si col-md-10">
                <label for="years">Semester</label>
                <select class="form-control" id="year" name="semester" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <option value="1">Odd Semester</option>
                  <option value="2">Even Semester</option>

                </select>

                <br>
                <br>
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
