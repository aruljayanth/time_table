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
    <style>
        * {
            font-family: 'Roboto Slab', serif;
        }

        .form-group button{
        	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
        }
.bg1-image {
  /* The image used */
  background-image: url("images/c2.jpg");
  
      /* Add the blur effect */
 
  
  
  /* Full height */
  height: 100%; 
  width: 100%;
  position:relative;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
        .bg-image {
  /* The image used */
  background-image: url("images/b.png");
  border-radius: 50px;
  
      /* Add the blur effect */
 
  
  
  /* Full height */
  height: 10%; 
  width: 90%;
  margin-left: 5%;
  margin-bottom: 5%;
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
    	
		<h1 class="heading text-center" style="color: black; padding-top: 5%;"> Time Table Management System </h1>
		<hr size="20" width="80%" align="center" color="green">
		<div class="form-row" style="margin-left: 9%;">

            <div class="form-group col-md-4" class="card"  >
            	<button onclick="location.href = 'student.php';" class="float-left submit-button" ><figure><img src="images/st.png" class="img-circle" class="card-img-top" width="200" height="200" /><br></br><figcaption class="text-center"><b><p style="font-size: 20px; color: white;">Student</p></b>  </figcaption></figure></button></div>
            <div class="form-group col-md-4">
                <button onclick="location.href = 'report.php';" class="float-left submit-button" ><figure><img src="images/cr.jpg" class="img-circle" class="card-img-top" width="200" height="200" /><br></br><figcaption class="text-center"> <b><p style="font-size: 20px; color: white;">Faculty-Course</p></b></figcaption></figure></button></div>
            <div class="form-group col-md-4">
            	<button type="button" onclick="location.href = 'teacher.php';" class="float-left submit-button"><figure><img src="images/t.png" class="img-circle" width="200" height="200" /><br></br> <figcaption class="text-center"> <b><p style="font-size: 20px; color: white;">Faculty</p></b></figcaption></figure></button></div>
            </div>

            	<div class="form-row" style="margin-left: 9%">
            		<div class="form-group col-md-4">
            	<button type="button" onclick="location.href = 'admin.php';" class="float-left submit-button"><figure><img src="images/admin_image.jpg" class="img-circle" width="200" height="200" /><br></br> <figcaption class="text-center"> <b><p style="font-size: 20px; color: white;">Admin</p></b></figcaption></figure></button></div>
            <div class="form-group col-md-4">
                <button type="button" onclick="location.href = 'feedback.php';" class="float-left submit-button"><figure><img src="images/st.png" class="img-circle" width="200" height="200" /><br></br><figcaption class="text-center"> <b><p style="font-size: 20px; color: white;">Feedback</p></b></figcaption></figure></button></div>
            	
            <div class="form-group col-md-4">
                <button type="button" onclick="location.href = 'classavail.php';" class="float-left submit-button"><figure><img src="images/cr.jpg" class="img-circle" width="200" height="200" /><br></br><figcaption class="text-center">  <b><p style="font-size: 20px; color: white;">Class Availability</p></b></figcaption></figure></button></div>
            	</div>
                </div>


</body>
</html>