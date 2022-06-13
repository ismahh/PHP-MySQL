<?php
include("db_connect.php");

if(!empty(isset($_POST['email'])) && isset($_POST['email']))
{
   $email= $_POST['email'];
   checkEmail($conn, $email);
}




?>