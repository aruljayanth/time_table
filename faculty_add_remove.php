<?php
session_start();
  ob_start();
  $conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
if (isset($_POST['submit'])){
  header("Location: Faculty.php");
  }
  if (isset($_POST['submit1'])){
  header("Location: Faculty1.php");
  }
mysqli_close($conn);
ob_flush();

?>


<html>
<head>
    <title>Teacher</title>
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
  <button type="submit" class="btn btn-info btn-lg" id="abcd" name="submit">Add Details</button></div></div>
  <div class="col-md-6"><div class="text-center">
  <button type="submit" class="btn btn-info btn-lg"  name="submit1">Remove Details</button></div>
</div>


</form>
  
</div>
</body>
</html>