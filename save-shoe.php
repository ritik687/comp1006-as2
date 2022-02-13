<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
     <title>Saving Movie Details......</title>
   

</head>
<body>
    <?php
    
    // capture form inputs from the POST array and store each one in variable
    $shoeName = $_POST['shoeName'];
    //echo "Movie shoeName: $shoeName"; 
    
    $size = $_POST['size'];

    $brandId = $_POST['brandId'];

    //input validations
    $ok= "true";

    if(empty(trim($shoeName)))
    {
        echo "Shoe Name is Required";
        $ok=false;

    }

    else if(strlen($shoeName) > 100)
    {
      echo "Please enter Shoe Name less than 100 characters";
      $ok= false;
    }

    else if(empty(trim($size)))
    {
      echo "Size is Required";
      $ok = false;
    }

    else if(!is_numeric($size))
    {
      echo "Size must be 3.5 or greater";
      $ok=false;
    }
 
     



                if($ok=true)
                {
    
                    // $db= new PDO('mysql:host=172.31.22.43;dbname=Ram200495974','Ram200495974', 'y4O4M_hDnR');
                    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// debugging
                  
                    require "database.php";


                    
                    /* setup an SQL INSERT command with placeholders for our three values : indicates a placeholder  or parameter*/
                    $sql = "INSERT INTO shoes(shoeName,  size, brandId) VALUES(:shoeName,  :size, :brandId)";
                   





                    //creating a command object using our db connection & SQL command from above.....
                    
                    $cmd = $db->prepare($sql);



                    
                    // populate each field with the matching value from the variables 
                    
                    $cmd->bindParam(':shoeName',$shoeName, PDO::PARAM_STR,100);// specify the data type that is STring of no more than 100 characters
                    
                    $cmd->bindParam(':size',$size, PDO::PARAM_STR); // there is nothing decimal in this case, we have to str only
                    $cmd->bindParam(':brandId',$brandId, PDO::PARAM_INT);





                    //execute the command to save the movie permanently to our db table
                    $cmd->execute();


                    // disconnect is important beacuse sometime server overload happens 
                    $db = null;


                    // show a confirmation message 
                    
                    echo "Shoe Saved";

                    // // bonus point work
                    header("Location: shoes.php");   
                    //this header fuction will redirect to the other page. If we mention the correct location. It will not show the confirmation message.       
                }

     
        
    ?>
    
    <br>
    <a href="shoes.php">Click here to display all the movies</a>
    
</body>
</html>