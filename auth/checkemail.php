<?php
include("db_connect.php");

if(!empty(isset($_POST['email'])) && isset($_POST['email']))
{
   $email= $_POST['email'];
   checkEmail($conn, $email);
}


function checkEmail($conn, $email)
{
  $query = "SELECT email FROM users WHERE email='$email'";
  $result = $conn->query($query);
  if ($result->num_rows > 0) 
  {
    echo "<span style='color:red'>This Email is alredy exists </span>";
  }
  else
  {
    echo "<span style='color:green'>This Email is available </span>";
  }
}