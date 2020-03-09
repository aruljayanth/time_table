<?php
session_start();
ob_start();
//echo "<h2>One step away to enter the world ---Stay Connected</h2>";
$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);
if (isset($_POST['submit'])){
	$no_of_slots = mysqli_real_escape_string($conn, $_REQUEST['n_slot']);
echo $no_of_slots;
}

mysqli_close($conn);
ob_flush();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Time Table</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
		<h1 class="heading text-center" > Add Slot Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" class="hello" ><strong>Enter the Particulars :</strong></label>
		<form action="" method="POST">
			
		<div class="form-row">
			<div class="form-group col-md-12">
			<label for="t_no">No of slots:</label></div>
				<div class="form-group col-md-8">
				<input type="number" class="form-control" name="n_slot" id="n" placeholder="enter the no of slots" required>
				</div> 
				<div class="form-group col-md-4">
      <div class="center-block justify-content-center">
        <button class="btn btn-default" type="button" name="submit" onclick="addMoreRows()">Next</button>
      </div>
  </div>

		</div>
	</form>
	<form id="slots">

		
	</form>
	<table id="tbl_id" style="text-align:center" align="center" valign="top">
        
    </table>
</div>
<script>

function addMoreRows() {
		window.flag=0;
        var rowsAdded = document.getElementById('n').value;
        slot(1,rowsAdded);

        if(window.flag==1)
        {
        	 window.location="success.php";
        }
      }
      
      function slot(x,rowsAdded){

      	if(x<=rowsAdded)
      	{
      		document.getElementById("slots").innerHTML="";

document.getElementById("slots").insertAdjacentHTML("afterbegin", `slot ${x} <input type="text"> <input type="text">
	<input type="submit" onclick="slot(${x+1},${rowsAdded})">
	<br/>`);
}
else if(x>rowsAdded){
window.flag=1;}

 
      
      }


    </script>

</body>
</html>