<?php
    
    $title='Saving Shoe details....';
    require 'includes/header.php';

    
    // capture form inputs from the POST array and store each one in variable
    $shoeName = $_POST['shoeName'];
    //echo "Movie shoeName: $shoeName"; 
    
    $size = $_POST['size'];

    $brandId = $_POST['brandId'];
    $colorId =$_POST['colorId'];

    $shoeId = $_POST['shoeId'];

    
  
    
    /* this shoeId will be null while inserting but not null while updating. 
       Whats the scenario is, when we add a new shoe, the shoeId= null; Go to the view page source of the shoe-form.php. It will display the shoeId="".   When we Click any shoe on the shoes page, this shoeId="number".
    */

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
    
                  
                    require "includes/database.php";


                    
                    // if we have shoeId then update, if null then insert it
                    if(empty($shoeId))
                    {
                    /* setup an SQL INSERT command with placeholders for our three values : indicates a placeholder  or parameter*/
                    $sql = "INSERT INTO shoes(shoeName,size,brandId,colorId) VALUES(:shoeName,:size,:brandId,:colorId)";
                    }

                    else{

                      $sql = "UPDATE shoes SET shoeName=:shoeName, size=:size, brandId= :brandId, colorId=:colorId WHERE shoeId= :shoeId";
                      //make sure u should have the where clause. and also number of tokens in the update statement should match the no of parameters that we binding
                    }
                   





                    //creating a command object using our db connection & SQL command from above.....
                    
                    $cmd = $db->prepare($sql);



                    
                    // populate each field with the matching value from the variables 
                    
                    $cmd->bindParam(':shoeName',$shoeName, PDO::PARAM_STR,100);// specify the data type that is STring of no more than 100 characters
                    
                    $cmd->bindParam(':size',$size, PDO::PARAM_STR); // there is nothing decimal in this case, we have to str only
                    $cmd->bindParam(':brandId',$brandId, PDO::PARAM_INT);
                    $cmd->bindParam(':colorId',$colorId, PDO::PARAM_INT);

                    if(!empty($shoeId))
                    {
                      $cmd->bindParam(':shoeId',$shoeId,PDO::PARAM_INT);
                    }





                    //execute the command to save the movie permanently to our db table
                    $cmd->execute();


                    // disconnect is important beacuse sometime server overload happens 
                    $db = null;


                    // show a confirmation message 
                    
                    echo "Shoe Saved";

                    // // bonus point work
                    // header("Location: shoes.php");   
                    //this header fuction will redirect to the other page. If we mention the correct location. It will not show the confirmation message.       
                }

     
        
    ?>
    
    <br>
    <a href="shoes.php">Click here to display all the movies</a>
    
</body>
</html>