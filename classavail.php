<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);


$get_block="SELECT distinct(block) FROM avail_classn";
$get=mysqli_query($conn, $get_block);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
$option .= '<option value = "'.$row['block'].'" type="submit" name="submit3">'.$row['block'].'</option>';
}


$get_block="SELECT distinct(slot) FROM avail_classn";
$get=mysqli_query($conn, $get_block);
$options = '';
while($row = mysqli_fetch_assoc($get))
{
$options .= '<option value = "'.$row['slot'].'" type="submit" name="submit3">'.$row['slot'].'</option>';
}


$get_block="SELECT distinct(day) FROM avail_classn";
$get=mysqli_query($conn, $get_block);
$options1 = '';
while($row = mysqli_fetch_assoc($get))
{
$options1 .= '<option value = "'.$row['day'].'" type="submit" name="submit3">'.$row['day'].'</option>';
}


if (isset($_POST['submit']))
{

    $block = mysqli_real_escape_string($conn, $_REQUEST['block']);
    $_SESSION['block']=$block;
    $day = mysqli_real_escape_string($conn, $_REQUEST['day']);
    $_SESSION['day']=$day;
    $slot = mysqli_real_escape_string($conn, $_REQUEST['slot']);
    $_SESSION['slot']=$slot;
    header("Location:classavail1.php");

}

mysqli_close($conn);
ob_flush();
?>


<!DOCTYPE HTML>
<html lang="en">
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
  padding-bottom: 1%;
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
    <h1 class="s" > Available Classrooms </h1>
    <hr size="20" width="75%" align="center" color="green">
    <label for="type" style="margin-bottom: 30px;" class="t1" ><strong>Enter the Particulars :</strong></label>
    <form name="forms" action="" method="POST">
    <div class="form-row" style="margin-top:-0.0002%;">
      <div class="si col-md-10">
                <label for="dname">Block</label>
                <select class="form-control" id="block" name="block" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $option; ?>
                </select>
                <br>
            </div>

            <div class="si col-md-10">
                <label for="d">Day</label>
                <select class="form-control" name="day" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $options1; ?>
                </select>
                <br>
            </div>

            <div class="si col-md-10">
                <label for="d">Slot</label>
                <select class="form-control" name="slot" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $options; ?>
                </select>
                <br>
                <br>
                <br>
            </div>

            <div class="form-group col-md-12">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit1" name="submit">Show</button>
      </div>
  </div>

        </div>
    </form>
</div>
</body>
</html>
