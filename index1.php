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
    </style>
</head>
<body>
    <div class="container">
		<h1 class="heading text-center" > Time Table Management System </h1>
		<hr size="20" width="80%" align="center" color="green">
		<div class="form-row" style="margin-left: 30px;">

            <div class="form-group col-md-3" class="card"  >
            	<button onclick="location.href = 'student.php';" class="float-left submit-button" ><figure><img src="images/st.png" class="img-circle" class="card-img-top" width="200" height="200" /><br></br><figcaption class="text-center"> Student </figcaption></figure></button></div>
            <div class="form-group col-md-3">
                <button onclick="location.href = 'report.php';" class="float-left submit-button" ><figure><img src="images/cr.jpg" class="img-circle" class="card-img-top" width="200" height="200" /><br></br><figcaption class="text-center"> Faculty-Course </figcaption></figure></button></div>
            <div class="form-group col-md-3">
            	<button type="button" onclick="location.href = 'teacher.php';" class="float-left submit-button"><figure><img src="images/t.png" class="img-circle" width="200" height="200" /><br></br> <figcaption class="text-center"> Teacher</figcaption></figure></button></div>
            <div class="form-group col-md-3">
            	<button type="button" onclick="location.href = 'admin.php';" class="float-left submit-button"><figure><img src="images/admin_image.jpg" class="img-circle" width="200" height="200" /><br></br> <figcaption class="text-center"> Admin</figcaption></figure></button></div></div>
            	<div class="form-row" style="margin-left: 100px; margin-right: 30px;">
            <div class="form-group col-md-4">
            	<button type="button" onclick="location.href = 'classroom.php';" class="float-left submit-button"><figure><img src="images/cr.jpg" class="img-circle" width="200" height="200" /><br></br><figcaption class="text-center"> ClassRoom </figcaption></figure></button></div>
            <div class="form-group col-md-4">
                <button type="button" onclick="location.href = 'feedback.php';" class="float-left submit-button"><figure><img src="images/st.png" class="img-circle" width="200" height="200" /><br></br><figcaption class="text-center"> Feedback </figcaption></figure></button></div>
            	
            	<div class="form-group col-md-4">
                <button type="button" onclick="location.href = 'classavail.php';" class="float-left submit-button"><figure><img src="images/cr.jpg" class="img-circle" width="200" height="200" /><br></br><figcaption class="text-center"> Class Availability </figcaption></figure></button></div>
            	</div>
                </div>


</body>
</html>