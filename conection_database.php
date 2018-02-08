<?php
$conn_error="sry! try again later";
$mysqli_host="localhost";
$mysqli_user="root";
$mysqli_pass="";
$mysqli_db="database";

$link=@mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass);
if($link)
{
  $query=@mysqli_select_db($link,$mysqli_db);
  if($query)
  {
   //echo 'cool';
  }

}



?>