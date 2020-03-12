<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "timetable";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])){
    

    $teacher_id = mysqli_real_escape_string($conn, $_REQUEST['name']);

    $course_id = mysqli_real_escape_string($conn, $_REQUEST['feed1']);

    $state = mysqli_real_escape_string($conn, $_REQUEST['state']);

    //header("Location:select_section.php");    
$sql = "INSERT INTO feed (name,state,feedback)
VALUES ('$teacher_id', '$state', '$course_id')";

if ($conn->query($sql) === TRUE) {
    echo "";

} else {
    echo "";
}
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Faculty</title>
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
}</style>
</head>
<body>
<div class="container">
		<h1 class="heading text-center" > Feedback </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type"  ><strong>Enter the details :</strong></label><br><br>
		<form name="forms" action="" method="POST">
	
		<div class="form-group col-md-12">
				<label for="dname">Name</label><br>
                  <input class="form-control" type="text" id="n1" name="name"><br>
                <br>
				</div>

<div class="form-group col-md-12">
                <label for="dname">Student/Teacher : </label>
                <select class="form-control" name="state" placeholder="choose" required>
					<option value="" disabled selected>Choose</option>
                	<option value="Student">Student</option>
                	<option value="Teacher">Teacher</option>				
                </select>
                <br>
            </div>

		<div class="form-group col-md-12">
				<label for="dname">Feedback</label><br>
                  <input class="form-control" type="text" id="n1" name="feed1"><br>
                <br>
				</div>

				<div style="text-align: center;">
					<input id="s" type="submit" name="submit" onclick="f1()">
				</div>
						
    </form>
    <script type="text/javascript">
    	function f1()
    	{
    		alert('Thank you for your feedback')
    	}
    </script>
</body>
</html>

<!--
<input type="text" id="n1" name="name"><br>
		<input type="text" id="f1" name="feed"><br>
		<input type="submit" name="sub">