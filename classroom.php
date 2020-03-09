<?php
session_start();
ob_start();
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
 // if (isset($_POST['s'])){
$akash="SELECT distinct block FROM department";
$get=mysqli_query($conn, $akash);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
  $option .= '<option value = "'.$row['block'].'">'.$row['block'].'</option>';
}
$akash="SELECT distinct roomno FROM classrooms where lab_class='1'" ;
$get=mysqli_query($conn, $akash);
$options = '';
while($row = mysqli_fetch_assoc($get))
{
  $options .= '<option value = "'.$row['roomno'].'">'.$row['roomno'].'</option>';
}
$akash="SELECT distinct semester FROM student";
$get=mysqli_query($conn, $akash);
$option1 = '';
while($row = mysqli_fetch_assoc($get))
{
  $option1 .= '<option value = "'.$row['semester'].'">'.$row['semester'].'</option>';
}
$akash="SELECT distinct year FROM student";
$get=mysqli_query($conn, $akash);
$options1 = '';
while($row = mysqli_fetch_assoc($get))
{
  $options1 .= '<option value = "'.$row['year'].'">'.$row['year'].'</option>';
}



if (isset($_POST['submit'])){
  $block = mysqli_real_escape_string($conn, $_REQUEST['block']);
    $_SESSION['block']=$block;
    $room_no = mysqli_real_escape_string($conn, $_REQUEST['room_no']);
    $_SESSION['room_no']=$room_no;
    $semester = mysqli_real_escape_string($conn, $_REQUEST['semester']);
    $_SESSION['semester']=$semester;
    $year = mysqli_real_escape_string($conn, $_REQUEST['year']);
    $_SESSION['year']=$year;
    header("location:classroom1.php");
  }


mysqli_close($conn);



ob_flush();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Class Room</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            font-family: 'Roboto Slab', serif;
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
    <h1 class="heading text-center" > Time Table Management System </h1>
    <hr size="20" width="80%" align="center" color="green">
    <!-- Trigger the modal with a button -->
    <form action="" method="POST">
    <div class="form-row">
            <div class="col-md-6"><div class="text-center">
  <button type="button" name="s" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal">Check Room Time Table</button></div></div>
  <div class="col-md-6"><div class="text-center">
  <button type="button" name="s1" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal1">Check Lab Time Table</button></div>
</div>
</div>
</form>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Enter</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <form action="" method="POST">
             
          <label for="dname">Block</label>
                <select class="form-control" id="d_name" name="block" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $option; ?>
                </select>
                <br>
              
              
                <label for="dname">Room No</label>
                <select class="form-control" id="d_name" name="room_no" placeholder="choose" required >
                  <option value="" disabled selected>Choose</option>
                  <?php echo $options; ?>
                </select>
                <br>
                <!--<label for="dname">Year</label>
                <select class="form-control" id="d_name" name="year" placeholder="choose" required >
                  <option value="" disabled selected>Choose</option>
                  <?php echo $options1; ?>
                </select>
                <br>-->
                <label for="dname">Semester</label>
                <select class="form-control" id="d_name" name="semester" placeholder="choose" required >
                  <option value="" disabled selected>Choose</option>
                  <?php echo $option1; ?>
                </select>
                <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-default" >View</button>
        </div>
      </div>
      </form>
          
    </div>
  </div>
</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Enter</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <?php
          $conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
          $akash="SELECT distinct block FROM department";
$get=mysqli_query($conn, $akash);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
  $option .= '<option value = "'.$row['block'].'">'.$row['block'].'</option>';
}




$akash="SELECT distinct roomno FROM classrooms where lab_class='0'" ;
$get=mysqli_query($conn, $akash);
$options = '';
while($row = mysqli_fetch_assoc($get))
{
  $options .= '<option value = "'.$row['roomno'].'">'.$row['roomno'].'</option>';
}


$akash="SELECT distinct semester FROM student";
$get=mysqli_query($conn, $akash);
$option1 = '';
while($row = mysqli_fetch_assoc($get))
{
  $option1 .= '<option value = "'.$row['semester'].'">'.$row['semester'].'</option>';
}

$akash="SELECT distinct year FROM student";
$get=mysqli_query($conn, $akash);
$options1 = '';
while($row = mysqli_fetch_assoc($get))
{
  $options1 .= '<option value = "'.$row['year'].'">'.$row['year'].'</option>';
}



if (isset($_POST['submit1'])){
  $block = mysqli_real_escape_string($conn, $_REQUEST['block']);
    $_SESSION['block']=$block;
    $room_no= mysqli_real_escape_string($conn, $_REQUEST['room_no']);
    $_SESSION['room_no']=$room_no;
    $semester = mysqli_real_escape_string($conn, $_REQUEST['semester']);
    $_SESSION['semester']=$semester;
    $year = mysqli_real_escape_string($conn, $_REQUEST['year']);
    $_SESSION['year']=$year;
    header("location:classroom1.php");
  }

          ?>
          <form action="" method="POST">
             
          <label for="dname">Block</label>
                <select class="form-control" id="d_name" name="block" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $option; ?>
                </select>
                <br>
              
              
                <label for="dname">Lab Name</label>
                <select class="form-control" id="d_name" name="room_no" placeholder="choose" required >
                  <option value="" disabled selected>Choose</option>
                  <?php echo $options; ?>
                </select>
                <br>
                <!--<label for="dname">Year</label>
                <select class="form-control" id="d_name" name="year" placeholder="choose" required >
                  <option value="" disabled selected>Choose</option>
                  <?php echo $options1; ?>
                </select>
                <br>-->
                <label for="dname">Semester</label>
                <select class="form-control" id="d_name" name="semester" placeholder="choose" required >
                  <option value="" disabled selected>Choose</option>
                  <?php echo $option1; ?>
                </select>
                <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="submit1" class="btn btn-default" >View</button>
        </div>
      </div>
      </form>
          
    </div>
  </div>
</div>
</body>
</html>