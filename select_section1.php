<?php

	session_start();
  ob_start();
  $conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
    //$teacher_id=$_SESSION["teacher_id"];
    $department_name=$_SESSION["department_name"];
    //$course_id=$_SESSION["course_id"];
    $year=$_SESSION["year"];
    $get_section="SELECT distinct section FROM student where department_name='$department_name' and year='$year'";
    $get=mysqli_query($conn, $get_section);
    $option = '';
	while($row = mysqli_fetch_assoc($get))
	{
	$option .= '<option value = "'.$row['section'].'" >'.$row['section'].'</option>';
	}
  $options='';
  switch ($year) {
    case "1":
        $options .= '<option value = "1" >'."1".'</option>';
        $options .= '<option value = "2" >'."2".'</option>';

        break;
    case "2":
        $options .= '<option value = "3" >'."3".'</option>';
        $options .= '<option value = "4" >'."4".'</option>';
        break;
    case "3":
        $options .= '<option value = "5" >'."5".'</option>';
        $options .= '<option value = "6" >'."6".'</option>';
        break;
    case "4":
    $options .= '<option value = "7" >'."7".'</option>';
        $options .= '<option value = "8" >'."8".'</option>';

      # code...
      break;
    
}

  
 // header("Location:generate.php?dept=$department_name&year=$year&semester=$semester&section=$section");
  if(isset($_REQUEST['submit']))
  {
    $section = mysqli_real_escape_string($conn, $_REQUEST['section']);
    $_SESSION['section']=$section;
  $semester = mysqli_real_escape_string($conn, $_REQUEST['semester']);
  $_SESSION['semester']=$semester;
  header("Location:table.php");
  /*<span class="comments">//get number of rows inputted through text box
  </span>*/
  /*$row=5;
 
$col=4;
     
    echo "<table border='1' width='350px'>";
    for($i=1;$i<=$row;$i++)
    {
 
      echo "<tr>";
      for($j=1;$j<=$col;$j++)
      {
             
              $val="?i=".$i."&j=".$j."&dn=".$department_name."&year=".$year."&section=".$section."&semester=".$semester;
              $get_avail="SELECT avail FROM availability where department_name='$department_name' and year='$year' and semester='$semester' and section='$section' and slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_avail);
    $row = mysqli_fetch_assoc($get);
    if($row['avail']== "0"){

      echo "<div style=\"display:inline-block;width:25%;height:100px;overflow:scroll;\"><form method=\"POST\">
      <input type=\"text\" value=$val name=\"valz\" style=display:none;>
      <input type=submit name=\"submit1\" value="."Add"."></form></div>";
      
      }
      else{
    $get_details="SELECT * FROM time where department_name='$department_name' and year='$year' and semester='$semester' and section='$section' and slot='$j' and day='$i'";
    $get=mysqli_query($conn, $get_details);
    $row = mysqli_fetch_assoc($get);
    $get_coursename="SELECT course_name from course where course_id='".$row['course_id']."'";
     $get1=mysqli_query($conn, $get_coursename);
    $row1 = mysqli_fetch_assoc($get1);
    $get_teachername="SELECT teacher_name from teacher where teacher_id='".$row['teacher_id']."'";
     $get2=mysqli_query($conn, $get_teachername);
    $row2 = mysqli_fetch_assoc($get2);
    
        echo "<div style=\"display:inline-block;width:25%;height:100px;overflow:scroll;\">";
       echo $row['course_id'];
       echo "<br>";
       echo $row1['course_name'];
       echo "<br>";
       echo $row2['teacher_name'];
       echo "<br>";
       echo $row['roomno'];
      echo "</div>";

      }
    }
                      
      echo "</tr>";
      
    }
     
    echo "</table>";  */
  }

if(isset($_REQUEST['submit1'])){
  $val=$_POST['valz'];

$site="allocation.php".$val;
        header("Location: $site");
}
  /*if(isset($_POST['submit1']))
      {
        
        
      }*/

	
mysqli_close($conn);
ob_flush();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Allocate</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="faculty.css">
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
   
</head>
<body>
	<div class="container">
		
		<form name="forms" action="" method="POST">
		<div class="form-row">
				<div class="form-group col-md-6">
                <label style="font-size: 25px;" for="d">Section</label>
                <select class="form-control" name="section" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $option; ?>
                </select>
                <br>
            </div>

            <div class="form-group col-md-6">
                <label style="font-size: 25px;" for="d">Semester</label>
                <select class="form-control" name="semester" placeholder="choose" required>
                  <option value="" disabled selected>Choose</option>
                  <?php echo $options; ?>
                </select>
                <br>
            </div>
            <div class="form-group col-md-12">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Next</button>
      </div></div>
      
</div>
</form>
</div>

</body>
</html>
