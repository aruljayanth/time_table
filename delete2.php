<?php
session_start();
ob_start();

$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
$department_name=$_SESSION["department_name"];
$semester=$_SESSION["semester"];
$section=$_SESSION["section"];
$year=$_SESSION["year"];


?>



<html>
<head>
    <title>Student</title>
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
     //border='1' width='350px'
    echo "<table  class=\"table table-bordered\">";
    for($i=0;$i<=$row;$i++)
    {
 /*<span class="comments">//create row
 </span>*/
      echo "<tr>";
      echo "<th>";
      switch ($i) {
        case '1': echo"Monday";
          # code...
          break;
        case '2': echo"Tuesday";
        break;
        case '3': echo "Wednesday";
        break;
        case '4': echo "Thursday";
        break;
        case '5': echo "Friday";
        break;
        default:
          # code...
          break;
      }
      
      echo"</th>";
      for($j=1;$j<=$col;$j++)
      {
        if($i == '0'){
          echo "<td style=\"display:inline-block;width:25%;height:100px;text-align: center;
vertical-align: middle;\">";
 echo "<label>";
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
          echo "</label>";
          echo "</br>";
          echo "</td>";
        }
         else{    /* <span class="comments">//create column using td and close td
              </span>*/
              //$val="?i=".$i."&j=".$j."&dn=".$department_name."&year=".$year."&section=".$section."&semester=".$semester;
              $get_avail="SELECT avail FROM availability where department_name='$department_name' and year='$year' and semester='$semester' and section='$section' and slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_avail);
    $row = mysqli_fetch_assoc($get);
    if($row['avail']== "0"){

      echo "<td style=\"display:inline-block;width:25%;height:120px;background-color: #FFCC80;text-align: center;
vertical-align: middle;\">
      
      <label style=\" margin-top:25px;\">free</label></td>";
      
      }
      else{
    $get_details="SELECT * FROM timing where department_name='$department_name' and year='$year' and semester='$semester' and section='$section' and slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_details);
    $row = mysqli_fetch_assoc($get);
    $get_coursename="SELECT course_name from course where course_id='".$row['course_id']."'";
     $get1=mysqli_query($conn, $get_coursename);
    $row1 = mysqli_fetch_assoc($get1);
    $get_teachername="SELECT teacher_name from teacher where teacher_id='".$row['teacher_id']."'";
     $get2=mysqli_query($conn, $get_teachername);
    $row2 = mysqli_fetch_assoc($get2);
    
        echo "<td style=\"display:inline-block;width:25%;height:120px;background-color: #FFA726;text-align: center;
vertical-align: middle;\">";
       echo $row['course_id'];
       echo "<br>";
       echo $row1['course_name'];
       echo "<br>";
       echo $row2['teacher_name'];
       echo "<br>";
       echo $row['roomno'];
      echo "</td>";

      }

    }

     }                 /* <span class="comments">//close row
                       </span>*/
      echo "</tr>";
      
    }

     /*  <span class="comments">//close table
       </span>*/
    echo "</table>";  


    if(isset($_POST['submit'])){
            $sql = "DELETE FROM timing where section='$section' and semester='$semester' and year='$year' and department_name='$department_name'";
            $get10=mysqli_query($conn, $sql);


echo "<table  class=\"table table-bordered\">";
    for($i=0;$i<=$row;$i++)
    {
 /*<span class="comments">//create row
 </span>*/
      echo "<tr>";
      echo "<th>";
      switch ($i) {
        case '1': echo"Monday";
          # code...
          break;
        case '2': echo"Tuesday";
        break;
        case '3': echo "Wednesday";
        break;
        case '4': echo "Thursday";
        break;
        case '5': echo "Friday";
        break;
        default:
          # code...
          break;
      }
      
      echo"</th>";
      for($j=1;$j<=$col;$j++)
      {
        if($i == '0'){
          echo "<td style=\"display:inline-block;width:25%;height:100px;text-align: center;
vertical-align: middle;\">";
 echo "<label>";
          //echo $j;
          echo "<br>";
         /*
          switch ($j) {
            case '1': //echo "10:00 AM - 11:00 AM";
              # code...
              break;
            case '2': //echo "11:00 AM - 12:00 PM";
              # code...
              # code...
              break;
              case '3': //echo "02:00 PM - 03:00 PM";
              # code...
                # code...
                break;
                case '4': //echo "03:00 PM- 04:00 PM";
              # code...
            default:
              # code...
              break;
          }*/
          echo "</label>";
          echo "</br>";
          echo "</td>";
        }
         else{    /* <span class="comments">//create column using td and close td
              </span>*/
              //$val="?i=".$i."&j=".$j."&dn=".$department_name."&year=".$year."&section=".$section."&semester=".$semester;
              $get_avail="SELECT avail FROM availability where department_name='$department_name' and year='$year' and semester='$semester' and section='$section' and slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_avail);
    $row = mysqli_fetch_assoc($get);
    if($row['avail']== "0"){

      echo "<td style=\"display:inline-block;width:25%;height:120px;background-color: #FFCC80;text-align: center;
vertical-align: middle;\">
      
      <label style=\" margin-top:25px;\">free</label></td>";
      
      }
      else{
    $get_details="SELECT * FROM timing where department_name='$department_name' and year='$year' and semester='$semester' and section='$section' and slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_details);
    $row = mysqli_fetch_assoc($get);
    $get_coursename="SELECT course_name from course where course_id='".$row['course_id']."'";
     $get1=mysqli_query($conn, $get_coursename);
    $row1 = mysqli_fetch_assoc($get1);
    $get_teachername="SELECT teacher_name from teacher where teacher_id='".$row['teacher_id']."'";
     $get2=mysqli_query($conn, $get_teachername);
    $row2 = mysqli_fetch_assoc($get2);
    
        echo "<td style=\"display:inline-block;width:25%;height:120px;background-color: #FFA726;text-align: center;
vertical-align: middle;\">";
       echo $row['course_id'];
       echo "<br>";
       echo $row1['course_name'];
       echo "<br>";
       echo $row2['teacher_name'];
       echo "<br>";
       echo $row['roomno'];
      echo "</td>";

      }

    }

     }                 /* <span class="comments">//close row
                       </span>*/
      echo "</tr>";
      
    }

     /*  <span class="comments">//close table
       </span>*/
    echo "</table>";  






if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
  }        

    ?>
  </div>

    <div style="text-align:center"> 
    <form action="" method="POST"> 
    <input type="submit" value="Delete" name="submit" class="btn btn-primary" />  
    </div> 
  </form>

  </body>
  </html>
