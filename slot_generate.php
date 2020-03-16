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
.bg1-image {
  /* The image used */
  background-image: url("images/c2.jpg");
  
      /* Add the blur effect */
 
  
  
  /* Full height */
  padding-bottom: 7%;
  height: 50%; 
  width: 100%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .s{
    margin-left: 10%;
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
    color: black;
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
  padding-bottom: 6%;
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
		<h1 class="s text-center" > Add Slot Details </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label class="t1" style="margin-left: 15%"><strong>Enter the Particulars :</strong></label>
		<form action="" method="POST">
			
		<div class="form-row">
			<div class="si col-md-10">
			<label for="t_no" style="margin-left: 15%;font-size: 20px;padding-bottom: 3%">No of slots:</label></div>
				<div class="si col-md-8">
				<input type="number" style="margin-left: 20%" class="si col-md-10" name="n_slot" id="n" min="1" max="4" placeholder="Enter the no of slots" required>
				</div> 
        <div style="margin-left: 50%;padding-top: 5%">
        <button class="btn btn-default" type="button" name="submit" onclick="addMoreRows()">Next</button>
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
        	 window.location="success1.php";
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