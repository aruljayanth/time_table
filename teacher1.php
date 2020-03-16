<?php
session_start();
ob_start();

$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
$department_name=$_SESSION["department_name"];
$semester=$_SESSION["semester"];

$year=$_SESSION["year"];
$teacher_id=$_SESSION["teacher_id"]


?>



<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Teacher</title>
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
  padding-bottom: 80%;
  height: 50%;
  width: 100%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .s{
    margin-left: 15%;
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
  padding-top: 1%;
  margin-top: 5%;
  padding-bottom: 20%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
      </style>
</head>
<body class="bg1-image">
  <div class="container">
    <?php
     $row=5;

$col=4;
    echo "<table class=\" table table-bordered\">";
    for($i=0;$i<=$row;$i++)
    {

      echo "<tr>";

      switch ($i) {
        case '1': echo "<th>";echo"Monday";echo"</th>";
        break;
        case '2': echo "<th>"; echo"Tuesday";echo"</th>";
        break;
        case '3': echo "<th>"; echo "Wednesday";echo"</th>";
        break;
        case '4': echo "<th>"; echo "Thursday";echo"</th>";
        break;
        case '5': echo "<th>"; echo "Friday";echo"</th>";

        break;
        case '6': exit(0);
        default:echo "<th>"; echo "</th>";

          break;
      }


      for($j=1;$j<=$col;$j++)
      {
              if($i == '0'){
          echo "<th style=\"display:inline-block;width:25%;height:100px;text-align: center;
vertical-align: middle;\">";
           echo "<label style=\"margin-top:25px;\">";
          echo $j;
           echo "<br>";

          switch ($j) {
            case '1': echo "10:00 AM - 11:00 AM";
              break;
            case '2': echo "11:00 AM - 12:00 PM";
              break;
              case '3': echo "02:00 PM - 03:00 PM";
                break;
                case '4': echo "03:00 PM- 04:00 PM";
            default:
              break;
          }
          echo "</label>";
          echo "</th>";
        }
              else{
              $get_avail="SELECT avail FROM avail_teacher where department_name='$department_name' and teacher_id='$teacher_id' and  slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_avail);
    $row = mysqli_fetch_assoc($get);
    if($row['avail']== "0"){

      echo "<td style=\"display:inline-block;width:25%;height:120px;text-align: center;
vertical-align: middle;background-color: #FFCC80;\">

      <label style=\"text-align: center;
vertical-align: middle; margin-top:25px;\">free</label></td>";

      }
      else{
    $get_details="SELECT * FROM timing where department_name='$department_name'  and teacher_id='$teacher_id' and slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_details);
    $row = mysqli_fetch_assoc($get);

    $get_coursename="SELECT course_name from course where course_id='".$row['course_id']."'";
     $get1=mysqli_query($conn, $get_coursename);
    $row1 = mysqli_fetch_assoc($get1);
    $get_teachername="SELECT teacher_name from teacher where teacher_id='".$row['teacher_id']."'";
     $get2=mysqli_query($conn, $get_teachername);
    $row2 = mysqli_fetch_assoc($get2);

        echo "<td style=\"display:inline-block;width:25%;height:120px;text-align: center;
vertical-align: middle;background-color: #FFA726;\">";
       echo $row['course_id'];
       echo "<br>";
       echo $row1['course_name'];
       echo "<br>";
       echo $row['department_name'];
       echo "-";
       echo $row['section'];
       echo "  ";
       echo "year :".$row['year'];
       echo "<br>";
       echo $row['roomno'];
      echo "</td>";


    }

                     }
                   }

      echo "</tr>";

    }
    echo "</table>";
    ?>
  <div style="text-align: center;">
     <form method="post">
    <input class="btn btn-default" id="down" type="submit" name="download" value="Download" onclick="f()">
    </form>
  </div>
  </div>
  <script type="text/javascript">
    function f()
    {
      window.print()
    }
  </script>
  </body>
  </html>
