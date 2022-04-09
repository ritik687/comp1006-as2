<?php
$title = "Saving your information...";
require 'includes/header.php';


// capture form inputs
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

$ok = true;

// validate inputs
if(empty($username)){
  echo '<p class = "alert alert-warning"> Username is required.</p>';
  $ok = false;
}

if(empty($email)){
  echo '<p class = "alert alert-warning"> Email is required.</p>';
  $ok = false;
}

if(empty($password)){
  echo '<p class = "alert alert-warning"> Password is required.</p>';
  $ok = false;
}

if($password != $confirm){
  echo '<p class = "alert alert-warning"> Passwords do not match.</p>';
  $ok = false;
}


if($ok){

// connect
  require 'includes/database.php';

// check for duplicate user
  $sql = "SELECT * FROM registeredUsers WHERE  username = :username";
  $cmd = $db->prepare($sql);
  $cmd->bindparam(':username',$username,PDO::PARAM_STR, 50);
  $cmd->execute();
  $user = $cmd->fetch(); // because we are getting only back at the most, so we will use fetch. Fetch is only returning one record or none.

  // we are going to check whether the above query return the user or not [$user = $cmd->fetch();] . if this query return the user our user will not be null means if username doesnot exist in the database, this variable $user should be null
  if($user){
     echo '<p class = "alert alert-warning">User already exists.</p>';
     // we are not going to use $ok because we are just going to stop right here
     $db = null;
     exit(); // this will stop executing this block of PHP code.
  }



// hash password-- using the hashing algorithm  e.g. Password1234 => 98asdhfhf78445jh93jkdjfljkl93849jlfkl
// this password_hash algorithm doing two things hashing as well as salting when the two users enters the same password with different usernames.
    $password = password_hash($password,PASSWORD_DEFAULT);

// save new user
  /* Now we only need to insert into the username and password field, we dont have to save the confirm value that just to ensure the user typed their password in properly twice. We are not saving the password twice so we are just going to insert the username and password. In salting a random string is added onto the user password before it hashes it, so this guaranteed that all the passwords are unique.  */
  $sql = "INSERT INTO registeredUsers(username,email,password) VALUES(:username,:email, :password)";
  $cmd = $db->prepare($sql);
  $cmd->bindParam(':username',$username,PDO::PARAM_STR,50);
  $cmd->bindParam(':email',$email,PDO::PARAM_STR,50);
  $cmd->bindParam(':password',$password,PDO::PARAM_STR,255);
  $cmd->execute();

// disconnect
 $db = null;
 echo '<p class= "alert alert-danger">Registration Saved</p>';
 /* now try to check in the database the passwords records, they are all hashed. If the usernames are different with the same passwords. But the hashed passwords will be different means getting unique hash value for each.*/

// redirect to login
header('location:login.php');

}

?>

</body>
</html>