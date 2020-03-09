<?php
session_start();
ob_start();

$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
$block=$_SESSION["block"];
$semester=$_SESSION["semester"];
//$section=$_SESSION["section"];
$year=$_SESSION["year"];
$room_no=$_SESSION["room_no"];


?>



<!--<html>
<head>
    <title>Room Details</title>
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
      </style>
</head>
<body>
  <div class="container">
    <?php
     $row=5;
 /*<span class="comments">//get number of columns inputted through text box
 </span>*/
$col=4;
     /*<span class="comments">//create a table in php 
     </span>*/
    echo "<table border='1' width='350px'>";
    for($i=1;$i<=$row;$i++)
    {
 /*<span class="comments">//create row
 </span>*/
      //echo "<tr>";
      echo "<tr>";
      //echo "<th>";
      
      switch ($i) {
        case '1': echo "<th>";
        echo"Monday";echo"</th>";
          # code...
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
          # code...
          break;
      }
      
      for($j=1;$j<=$col;$j++)
      {
             /* <span class="comments">//create column using td and close td
              </span>*/
              //$val="?i=".$i."&j=".$j."&dn=".$department_name."&year=".$year."&section=".$section."&semester=".$semester;
              /*$get_avail="SELECT avail FROM avail_teacher where department_name='$department_name' and teacher_id='$teacher_id' and  slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_avail);
    $row = mysqli_fetch_assoc($get);
    if($row['avail']== "0"){

      echo "<div style=\"display:inline-block;width:25%;height:100px;overflow:scroll;text-align: center;
vertical-align: middle;\">
      
      <label style=\"text-align: center;
vertical-align: middle;\">free</label></div>";
      
      }
      else{*/
    $get_details="SELECT * FROM timing where roomno='$room_no'   and block='$block' and slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_details);
    $row = mysqli_fetch_assoc($get);

    $get_coursename="SELECT course_name from course where course_id='".$row['course_id']."'";
     $get1=mysqli_query($conn, $get_coursename);
    $row1 = mysqli_fetch_assoc($get1);
    $get_teachername="SELECT teacher_name from teacher where teacher_id='".$row['teacher_id']."'";
     $get2=mysqli_query($conn, $get_teachername);
    $row2 = mysqli_fetch_assoc($get2);
    
        echo "<div style=\"display:inline-block;width:25%;height:100px;overflow:scroll;text-align: center;
vertical-align: middle;\">";
       echo $row['course_id'];
       echo "<br>";
       echo $row1['course_name'];
       echo "<br>";
       echo $row2['teacher_name'];
       echo "<br>";
       echo $row['department_name'];
       echo "-";
       echo $row['section'];
      echo "</div>";

      
    //}
                      /* <span class="comments">//close row
                       </span>*/
      echo "</tr>";
      
    }}
     /*  <span class="comments">//close table
       </span>*/
    echo "</table>";  
    ?>
  </div>
  </body>
  </html>
-->



<!DOCTYPE html>
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
        <style type="text/css">
    body{

background-color: #01579B;
  background-repeat: no-repeat;
  background-size:cover;
  
}
.container{
  background-color: #B3E5FC;
}
</style>
      </style>
</head>
<body>
  <div class="container">
    <?php
     $row=5;
 /*<span class="comments">//get number of columns inputted through text box
 </span>*/
$col=4;
     /*<span class="comments">//create a table in php 
     </span>*/
    echo "<table class=\" table table-bordered\">";
    //$row=number_format($row)-2;
    //echo $row;
    for($i=0;$i<=$row;$i++)
    {
 /*<span class="comments">//create row
 </span>*/

      echo "<tr>";
      //echo "<th>";
      
      switch ($i) {
        case '1': echo "<th>";
        echo"Monday";echo"</th>";
          # code...
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
          # code...
          break;
      }
      
      
      for($j=1;$j<=$col;$j++)
      {
             /* <span class="comments">//create column using td and close td
              </span>*/
              //$val="?i=".$i."&j=".$j."&dn=".$department_name."&year=".$year."&section=".$section."&semester=".$semester;
              if($i == '0'){
          echo "<th style=\"display:inline-block;width:25%;height:100px;text-align: center;
vertical-align: middle;\">";
           echo "<label style=\"margin-top:25px;\">";
          echo $j;
           echo "<br>";
         
          switch ($j) {
            case '1': echo "10:00 AM - 11:00 AM";
              # code...
              break;
            case '2': echo "11:00 AM - 12:00 PM";
              # code...
              # code...
              break;
              case '3': echo "02:00 PM - 03:00 PM";
              # code...
                # code...
                break;
                case '4': echo "03:00 PM- 04:00 PM";
              # code...
            default:
              # code...
              break;
          }
          //echo "</label>";
          echo "</label>";
          echo "</th>";
        }
              else{
                if($semester%2==0){$semester1=2;}
                else{$semester1=1;}

              $get_avail="SELECT avail FROM avail_class where room_no='$room_no' /*and semester='$semester1'*/ and block='$block' and  slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_avail);
    $row = mysqli_fetch_assoc($get);
    if($row['avail']== "0"){

      echo "<td style=\"display:inline-block;width:25%;height:120px;text-align: center;
vertical-align: middle;background-color: #FFCC80;\">
      
      <label style=\"text-align: center;
vertical-align: middle; margin-top:25px;\">NOT ALLOTED</label></td>";
      
      }
      else{
    $get_details="SELECT * FROM timing where roomno='$room_no'    and slot='$j' and day='$i'";
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
       //echo ;
       echo "<br>";
       echo $row2['teacher_name'];
      echo "</td>";

      
    }
                      /* <span class="comments">//close row
                       </span>*/
                     }
                   }

      echo "</tr>";
      
    }
     /*  <span class="comments">//close table
       </span>*/
    echo "</table>";  
    ?>
  </div>
  </body>
  </html>
