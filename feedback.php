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

    //$email = mysqli_real_escape_string($conn, $_REQUEST['email']);

    //$email1 = "https://maheshcr7.000webhostapp.com/mail.php?mail="+$email;

    //header("Location:select_section.php");    
$sql = "INSERT INTO feed (name,state,feedback) VALUES ('$teacher_id', '$state', '$course_id')";

if ($conn->query($sql) === TRUE)
{
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $email1);
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    // curl_exec($ch);
    // curl_close($ch);
    echo "";

} else 
{
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
}
.bg1-image {
  /* The image used */
  background-image: url("images/c2.jpg");
  
      /* Add the blur effect */
 
  
  
  /* Full height */
  padding-bottom: 1%;
  height: 20%; 
  width: 100%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .s{
    margin-left: 8%;
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
  padding-bottom: 10%;
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
		<h1 class="s text-center" > Feedback </h1>
		<hr size="20" width="75%" align="center" color="green">
		<label for="type" class="t1"  ><strong>Enter the details :</strong></label><br><br>
		<form name="forms" action="" method="POST">
	
		<div class="si col-md-10">
				<label for="dname" id="name">Name</label><br>
                  <input class="form-control" type="text" id="n1" name="name" placeholder="Name" required><br>
                <br>
				</div>

<div class="si col-md-10">
                <label for="dname">Student/Teacher </label>
                <select class="form-control" id="state" name="state" required>
					<option value="" disabled selected >Choose</option>
                	<option value="Student">Student</option>
                	<option value="Teacher">Teacher</option>				
                </select>
                <br>
                <br>
            </div>

<div class="si col-md-10">
        <label for="dname">Email</label><br>
                  <input class="form-control" type="Email" id="n0" name="email" placeholder="Email" required><br>
                <br>
        </div>

		<div class="si col-md-10">
				<label for="dname">Feedback</label><br>
                  <input class="form-control" type="text" id="n1" name="feed1" placeholder="Feedback" required><br>
                <br>
				</div>
       

				<div style="text-align: center;">
					<input class="btn btn-default" id="s" type="submit" name="submit" onclick="f1()">
				</div>
						
    </form>
    <script type="text/javascript">
    	function f1()
    	{
        var name=document.getElementById('name').value;
        var state=document.getElementById('state').value;
        var email=document.getElementById('n0').value;
        var feed=document.getElementById('n1').value;
      var email1 = "https://maheshcr7.000webhostapp.com/mail1.php?mail="+email+"&name="+name+"&state="+state;
        var xhr = new XMLHttpRequest();
        xhr.open('GET',email1, true);
        xhr.send();
    		alert('Thank you for your valuable feedback');
    	}
    </script>
</body>
</html>

<!--
<input type="text" id="n1" name="name"><br>
		<input type="text" id="f1" name="feed"><br>
		<input type="submit" name="sub">