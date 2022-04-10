<?php
    //authentication check. this will not give access to the user who has not logged in.
    require 'includes/auth-check.php';
    $title='Saving Shoe details....';
    require 'includes/header.php';

    try
    {
    // capture form inputs from the POST array and store each one in variable
    $shoeName = $_POST['shoeName'];
    //echo "Movie shoeName: $shoeName"; 
    
    $size = $_POST['size'];

    $brandId = $_POST['brandId'];
    $colorId =$_POST['colorId'];

    $shoeId = $_POST['shoeId'];

    $image= $_FILES['image']; // this is not null so uploaded movie poster if any available.

    
  
    
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


        //validating image uploading
        if(!empty($image['name'])){
          // get the file name
          $name = $image['name'];

          // get the temp location
          $tmpName = $image['tmp_name'];

          //check the file if it is png or jpg/jpeg. this image/jpeg is for both jpg or jpeg.

          if((mime_content_type($tmpName)!="image/png") && (mime_content_type($tmpName) !="image/jpeg"))
          {
              echo 'Image must be in .png or .jpg format';
              $ok=false;
          }


          // if the file valid, generate a unique name using the session object to prevent overwriting. We dont wanna overwrite any file that alrady exists with the same name.
          // this gives us the unique id of each browser session. we will just append this on to the beginning of file name.
          // eg. poster.png => a3445f34asdf-poster.png
          // two users cant share the same session_id.
          $name =session_id().'-'.$name;

          // move from cache to img with the new unique name
          move_uploaded_file($image['tmp_name'],'imageDirectory/'.$name);

        }
        else
        {
          // now new image uploaded. If this shoe already has an image attached, keep the name so it does not get deleted 
          $name=$_POST['currentImage'];
        }
    
     



                if($ok=true)
                {
    
                  
                    require "includes/database.php";


                    
                    // if we have shoeId then update, if null then insert it
                    if(empty($shoeId))
                    {
                    /* setup an SQL INSERT command with placeholders for our three values : indicates a placeholder  or parameter*/
                    $sql = "INSERT INTO shoes(shoeName,size,brandId,colorId,image) VALUES(:shoeName,:size,:brandId,:colorId,:image)";
                    }

                    else{

                      $sql = "UPDATE shoes SET shoeName=:shoeName, size=:size, brandId= :brandId,image=:image, colorId=:colorId WHERE shoeId= :shoeId";
                      //make sure u should have the where clause. and also number of tokens in the update statement should match the no of parameters that we binding
                    }
                   





                    //creating a command object using our db connection & SQL command from above.....
                    
                    $cmd = $db->prepare($sql);



                    
                    // populate each field with the matching value from the variables 
                    
                    $cmd->bindParam(':shoeName',$shoeName, PDO::PARAM_STR,100);// specify the data type that is STring of no more than 100 characters
                    
                    $cmd->bindParam(':size',$size, PDO::PARAM_STR); // there is nothing decimal in this case, we have to str only
                    $cmd->bindParam(':brandId',$brandId, PDO::PARAM_INT);
                    $cmd->bindParam(':colorId',$colorId, PDO::PARAM_INT);

                    // very dangerous error
                    // if we dont upload the image, then it will not give error becaue we have taken this null. image value could be empty or null which is fine
                    $cmd->bindParam(':image',$name,PDO::PARAM_STR,100);

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
    }

    catch(Exception $error)
    {
      header('location:error.php');
    }

     
        
    ?>
    
    <br>
    <a href="shoes.php">Click here to display all the shoes</a>
    
</body>
<?php
   require 'includes/footer.php'
?>
</html>