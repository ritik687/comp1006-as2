<?php 

$server = '172.31.22.43';
$dbName ='Ram200495974';
$user ='Ram200495974';
$pass ='y4O4M_hDnR';


try{
  // this block will run this if any error, then shift to the catch block
  $db = new PDO("mysql:host=$server;dbname=$dbName", $user, $pass);

  // debugging
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "<p>Successfully connected to the Database ".$dbName."</p>";

}
catch(PDOException $e)
{
    echo "Connection failed".$e->getMessage();
}

// since file is all PHP (no HTML), closing php tag is optional 