<?php
// access the current session

session_start(); // its initializing the data means session is already started on the server but if we want  to access the data we need to call session_start(); 

// clear all session data
session_unset();//  removed or frees up any session varying. Right now we are using only one that is the username, so this function sets that to a null value 

// get rid of the session 
session_destroy();// before using the sessin_destroy, its safer to make sure you remove any session variables before deleting the object. 

// redirect to login.
header('location:login.php');
?>