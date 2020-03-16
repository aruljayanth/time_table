<?php
session_start();
  ob_start();
  $conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

$day=$_SESSION['day'];
$slot=$_SESSION['slot'];
$block=$_SESSION['block'];



$get_block="SELECT distinct(roomno) FROM avail_classn WHERE day='$day' AND slot='$slot' and avail=0 and block='$block'";
$get=mysqli_query($conn, $get_block);
$options='';
$i=0;

echo '<body class="bg1-image">';
echo '<div class="bg-image" style=" margin-left:5%; margin-right:10%; margin-top:5%; padding-bottom:40%; height:95%; padding-top:3%">';
echo '<p style="text-align:center;font-size:50px;">Available Rooms</p><br><br>';
echo '<div style=" padding-bottom:1%; width:10%;margin-left:44%;margin-right:44%;">';
while($row = mysqli_fetch_assoc($get))
{
    $options = '<p style= "color:white;margin-bottom: 5%;font-size:30px; text-align:center;">'.$row['roomno'].'</p>';

    echo $options;
    $i++;

}
echo '</div>';
echo '<p style="text-align:center;font-size:20px;color:white;"><strong>Available Rooms Count :  '.$i.'</strong></p><br><br><br>';
echo '<div class="col-md-6"><div class="text-center">
  <button type="submit" style="margin-left:95%;" class="btn btn-info btn-lg" id="abcd" name="submit"><a href="index1.php">Home</a></button></div></div>';
echo '</div>';

echo '</body>';

mysqli_close($conn);
ob_flush();
?>



<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Availability</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
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
        .bg1-image {
  /* The image used */
  background-image: url("images/c2.jpg");

      /* Add the blur effect */



  /* Full height */
  padding-bottom: 50%;
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

      <style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>
</head>
<body>

</body>
</html>
