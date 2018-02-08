<?php
require_once 'core.inc.php';
require_once 'conection_database.php';
if(!loggedin())
{
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again'])&&isset($_POST['firstname'])&&isset($_POST['surname']))
  {
       $username=$_POST['username'];
       $password=$_POST['password'];
       $password_again=$_POST['password_again'];
       $firstname=$_POST['firstname'];
       $surname=$_POST['surname'];
         if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname))
         {
           $password_hash=md5($password);
            if($password!=$password_again)
            {
              echo 'passswords do not match';
            }
            else{
               $query="SELECT user_name FROM logging_user WHERE user_name='$username'";
               $query_run= mysqli_query($link,$query);
               $query_row=mysqli_num_rows($query_run);
               if($query_row==1)
               {
                 echo 'user already exist';
               }
               else if($query_row==0){
                        $query="INSERT INTO logging_user VALUES('','".mysqli_real_escape_string($link,$username)."','".mysqli_real_escape_string($link,$password_hash)."','".mysqli_real_escape_string($link,$firstname)."','".mysqli_real_escape_string($link,$surname)."')";

                         if($query_run= mysqli_query($link,$query))
                         {
                           echo 'login successful'   ;
                           header('Location: index.php ');
                         }
                         else{
                           mysqli_error($link);
                           }
                         }
            }
         }
         else{
             echo 'kindly fill all fields';
         }



  }
  else{
   echo 'please submit the data';
   }



}
else if(loggedin()){
 echo 'you \'re already log in';
}

?>
<form action="registration.php" method="POST">
       Username:<input type="text" name="username" maxlength="30" value="<?php if(isset($username)){echo $username;}?>"><br><br>
       password:<input type="password" name="password"><br><br>
      password_again:<input type="password" name="password_again"><br><br>
      firstname:<input type="text" name="firstname" maxlength="40" value="<?php if(isset($firstname)){echo $firstname;}?>"><br><br>
      surname:<input type="text" name="surname" maxlength="40" value="<?php if(isset($surname)){echo $surname;}?>"><br><br>
       <input type="submit" value="Submit">
     </form>
