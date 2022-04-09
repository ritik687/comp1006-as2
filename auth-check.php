<?php
// authentication check to prevent anonymous users from changing data.
//if nothing in the session  means no session exists that means our user hasn't logged in. If session is empty, user has not logged in.
// this is just checking whether we need to call session start.
if(session_status() == PHP_SESSION_NONE){
  session_start();
} 

// if no username session var, redirect to login
if(empty($_SESSION['username']))
{
  header('location:login.php');
}
?>