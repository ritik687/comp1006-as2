<?php
/**this is the hidden page, the users will never see this page so we dont actually even need our header */

// capture login form inputs
  $username =$_POST['username'];
  $password =$_POST['password'];

// connect
    require 'includes/database.php';

// fetch the user based on the username
$sql = "SELECT * FROM registeredUsers WHERE  username = :username";
  $cmd = $db->prepare($sql);
  $cmd->bindparam(':username',$username,PDO::PARAM_STR, 50);
  $cmd->execute();
  $user = $cmd->fetch();

// if user is not found, display login page with error at the top of the login.
if(!$user)
{
  $db =null;
  // not only we are redirecting to the login page but also passing a parameter so that we can display the error message on the login page.
  header('location:login.php?invalid=true');

}

else{

  // if username found, use a built-in php method to hash and compare passwords
  // if passwords dont match, display login page with error
  if(!$password = password_verify($password, $user['password']))
  {
    $db=null;
    header('location:login.php?invalid=true');

  }
  else
  {
    // if passwords match, store user identity in a SESSION OBJECT; redirect user to the movies page
    //we must call session_start() before using sessin variables in PHP
    session_start();
    $_SESSION['username']= $username;
    $db = null;
    header('location:shoes.php');

  }
}



?>