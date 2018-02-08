<?php
require_once 'conection_database.php';
require_once 'core.inc.php';
if(isset($_POST['username'])&& isset($_POST['password']))
{
   $username=$_POST['username'];
   $password=$_POST['password'];

   if(!empty($_POST['username'])&&!empty($_POST['password']))
  {
          global $link;
         $password_hash=md5($password);
        // echo $password_hash;
        $query="SELECT id FROM logging_user WHERE user_name='$username' AND password='$password_hash'";

       //  $query="SELECT id FROM logging_user WHERE user_name='".mysqli_real_escape_string($link,$username)."' AND password='".mysqli_real_escape_string($link,$password_hash)."'";
         $query_run=mysqli_query($link,$query);
         $query_row=mysqli_num_rows($query_run);
          if($query_row==0)
            {
              echo 'invalid login';
            }
          else if($query_row==1)
            {
             $row=mysqli_fetch_array($query_run,MYSQLI_ASSOC);
             $_SESSION['user_id']=$row['id'];
             header('Location: index.php');
            }
  }
  else{
   echo 'please fill all the fields';
  }

}
else{
 echo'kindly submmit data';
}

?>

<form action="<?php echo $current_file ?>" method="POST">
   Enter Username :<input type="text" name="username">
   Enter Password :<input type="password" name="password">
   <input type="submit" value="log In">
</form>