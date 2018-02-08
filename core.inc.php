<?php
require_once 'conection_database.php';
ob_start();
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
  if(isset($_SERVER['HTTP_REFERER']))
  {
    $http_referer=$_SERVER['HTTP_REFERER'];

  }
   function loggedin(){
    if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
    return true;
    }
    else{
     return false;
    }

}
//it is made to fetch data of specific fields in order to show user has been logged in his account
function getuserfield($field)
{
  global $link;
 $query="SELECT $field FROM logging_user WHERE id='".$_SESSION['user_id']."'";
 if( $query_run=mysqli_query($link,$query))
 {
   $row= mysqli_fetch_array($query_run, MYSQLI_ASSOC);
   if($row[$field])
   {
     $count=$row[$field];
    return $count;
   }


 }

}

?>