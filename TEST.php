<?php
session_start();
ob_start();

$conn = new mysqli("localhost:3306","root","","timetable");
    if($conn->connect_error)
    die("not connected:".$conn->connect_error);


$sql = "INSERT INTO timing VALUES ('A203', 'AB3', '1', '1','CSE100','15CSE405', 'CSE', 'A','4','0','7')";
  if(mysqli_query($conn, $sql)){
echo "recorded";}


?>