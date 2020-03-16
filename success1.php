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
  padding-bottom: 0%;
  height: 100%; 
  width: 100%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .si{
    margin-left: 30%;
    margin-right: 8%;
    align-content: center;
    font-style: bold;
    font-size: 15px;
    color: white;
  }
        .bg-image {
  /* The image used */
  background-image: url("images/b.png");
  border-radius: 50px;
  border-bottom: 25px;
  margin-bottom: 35px;
      /* Add the blur effect */
 
  
  
  /* Full height */
  height: 10%; 
  width: 90%;
  margin-left: 5%;
  padding-top: 1%;
  margin-top: 5%;
  padding-bottom: 1%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  .col{
    background-color : #ffd500;
    font-style: bold;
  }
    </style>
</head>
<body class="bg1-image">
	<div class="bg-image">
    <h1 class="heading text-center" ><p style="color: black;"> Time Table Management System </h1>
    <hr size="20" width="80%" align="center" color="green">


<nav class="bg-image">
  <div class="si">
    <div>
      <a><p style="color: black;font-size: 300%;">Timetable Generator<br></p></a>
    </div>
    <ul style ="margin-right: 50%;margin-left:1px;margin-top: 5%;">
    <li class="col" style="border-radius: 50px;margin-right: 50%;padding-left: 5%" id=abc><a href="Faculty_course.php"><p style="color: white;font-size: 150%;">Assign Courses</p></a></li>
      <li class="col" style="border-radius: 50px;margin-right: 50%;padding-left: 5%" id=abc1><a href="section_generate.php"><p style="color: white;font-size: 150%;">Generate Section</p></a></li>
      <li class="col" style="border-radius: 50px;margin-right: 50%;padding-left: 5%" id=abc2><a href="slot_generate.php"><p style="color: white;font-size: 150%;">Generate Slots</p></a></li>
      <li class="col"style="border-radius: 50px;margin-right: 50%;padding-left: 5%" id=abc3><a href="edit_selection.php"><p style="color: white;font-size: 150%;">Edit Slots</p></a></li>
      <li class="col"style="border-radius: 50px;margin-right: 50%;padding-left: 5%" id=abc4><a href="delete1.php"><p style="color: white;font-size: 150%;">Delete Table</p></a></li>
      <li class="col" style="border-radius: 50px;margin-right: 50%;padding-left: 5%" id=abc5><a href="timetable_generate.php"><p style="color: white;font-size: 150%;">Generate Table</p></a></li>
      <li class="col" style="border-radius: 50px;margin-right: 50%;padding-left: 5%" id=abc6><a href="index1.php"><p style="color: white;font-size: 150%;">Logout</p></a></li>
    </ul>
  </div>
</nav>
</div>
</body>
</html>