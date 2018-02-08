<?php
// inorder  to check wheather the user is logged in successfully or not
require_once 'core.inc.php';
require_once 'conection_database.php';
if(loggedin()){
  $firstname=getuserfield('firstname');
  $lastname=getuserfield('surname');
  // echo getuserfield('firstname');
 echo 'You \'re logged in '.$firstname.' '.$lastname.' <a href="logout.php">LOG OUT</a>';
}else
{
  //session_destroy();
 require 'login.php';

}




?>