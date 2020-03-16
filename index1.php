<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Time Table</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="style3.css">
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


  padding-bottom: 2%;
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
  /*background-image: url("images/b.png");*/
  background-color: black;
  border-radius: 50px;
  height: 10%;
  width: 90%;
  margin-left: 5%;
  margin-bottom: 5%;
  padding-bottom: 20%;
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

		<h1 class="heading text-center" style="color: white; padding-top: 3%;"> Time Table Management System </h1>
		<hr size="20" width="80%" align="center" color="green">
		<div class="form-row" style="margin-left: 9%;">

            <div class="form-group col-md-4" class="card" style="padding-bottom: 20%" >
            	<a id="ab" onclick="location.href = 'student.php';" class="float-left submit-button" ><figure><img src="images/st.png" alt=" " class="img-circle" class="card-img-top" width="200" height="200" /><br></br><figcaption class="text-center"><strong><p style="font-size: 20px; color: white;">Student</p></strong>  </figcaption></figure></a></div>
            <div class="form-group col-md-4">
                <a id="ab1" onclick="location.href = 'report.php';" class="float-left submit-button" ><figure><img src="images/cr.jpg" alt=" " class="img-circle" class="card-img-top" width="200" height="200" /><br></br><figcaption class="text-center"> <strong><p style="font-size: 20px; color: white;">Faculty-Course</p></strong></figcaption></figure></a></div>
            <div class="form-group col-md-4">
            	<a id="ab2" type="button" onclick="location.href = 'teacher.php';" class="float-left submit-button"><figure><img src="images/t.png" alt=" " class="img-circle" width="200" height="200" /><br></br> <figcaption class="text-center"> <strong><p style="font-size: 20px; color: white;">Faculty</p></strong></figcaption></figure></a></div>
            </div>

            	<div class="form-row" style="margin-left: 9%">
            		<div class="form-group col-md-4">
            	<a id="ab3" type="button" onclick="location.href = 'admin.php';" class="float-left submit-button"><figure><img src="images/admin_image.jpg" alt=" " class="img-circle" width="200" height="200" /><br></br> <figcaption class="text-center"> <strong><p style="font-size: 20px; color: white;">Admin</p></strong></figcaption></figure></a></div>
            <div class="form-group col-md-4">
                <a id="ab4" type="button" onclick="location.href = 'feedback.php';" class="float-left submit-button"><figure><img src="images/st.png" alt=" " class="img-circle" width="200" height="200" /><br></br><figcaption class="text-center"> <strong><p style="font-size: 20px; color: white;">Feedback</p></strong></figcaption></figure></a></div>

            <div class="form-group col-md-4">
                <a id="ab5" type="button" onclick="location.href = 'classavail.php';" class="float-left submit-button"><figure><img src="images/cr.jpg" alt=" " class="img-circle" width="200" height="200" /><br></br><figcaption class="text-center">  <strong><p style="font-size: 20px; color: white;">Class Availability</p></strong></figcaption></figure></a></div>
            	</div>
                </div>


</body>
</html>
