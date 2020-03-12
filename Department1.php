<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);

if (isset($_POST['submit'])){



    $department_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);

    $sql = "DELETE FROM department where department_name='$department_name'";
    if(mysqli_query($conn, $sql)){
    echo "deleted";
        header("Location:success.php");

        }

 else{
    //echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    echo "<script>";
    echo "window.alert(\"enter the valid Teacher ID\")";
    echo "</script>";
}}
$akash="SELECT distinct department_name FROM department";
$get=mysqli_query($conn, $akash);
$option = '';
while($row = mysqli_fetch_assoc($get))
{
    $option .= '<option value = "'.$row['department_name'].'">'.$row['department_name'].'</option>';
}


if (isset($_POST['submit1'])){


    $teacher_id = mysqli_real_escape_string($conn, $_REQUEST['t_num']);
    //$_SESSION['email']=$un;
    $teacher_name = mysqli_real_escape_string($conn, $_REQUEST['t_name']);
    $max_credit = mysqli_real_escape_string($conn, $_REQUEST['m_credits']);
    $department_name = mysqli_real_escape_string($conn, $_REQUEST['d_name']);

    $sql = "DELETE FROM department where department_name='$department_name'";
    if(mysqli_query($conn, $sql)){
    echo "deleted";
        header("Location:Department1.php");

        }

 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

}}

mysqli_close($conn);
ob_flush();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Department</title>
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
        <h1 class="heading text-center" > Remove Department Details </h1>
        <hr size="20" width="75%" align="center" color="green">
        <label for="type" class="hello" ><strong>Enter the Particulars :</strong></label>
        <form action="" method="POST">
        <div class="form-row">


            <div class="form-group col-md-12">
                <label for="dname">Department Name</label>
                <select class="form-control" name="d_name" placeholder="chose" required>
                    <option value="" disabled selected>Choose</option>
                    <?php echo $option; ?>
                </select>
                <br>

            </div>



         <div class="form-group col-md-6">
            <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit">Remove</button>
      </div></div>
      <div class="form-group col-md-6">
      <div class=" modal-footer d-flex center-block justify-content-center ">
        <button class="btn btn-default" type="submit" name="submit1">Remove more</button>
      </div>
  </div></div>
        </div>
    </form>
    </div>
</body>
</html>
