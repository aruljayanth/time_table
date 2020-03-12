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


echo '<div style="background-color: #87CEEB; margin-left:10%; margin-right:10%; margin-top:5%; margin-bottom:5%; height:95%; padding-top:3%">';
echo '<p style="text-align:center;font-size:50px;">Available Rooms:</p><br><br>';
echo '<div style="background-color:white; width:10%;margin-left:44%;margin-right:44%;">';
while($row = mysqli_fetch_assoc($get))
{
    $options = '<p style= "font-size:30px; text-align:center;">'.$row['roomno'].'</p>';
    
    echo $options;
    
}
echo '</div>';
echo '</div>';

mysqli_close($conn);
ob_flush();
?>



<html>
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