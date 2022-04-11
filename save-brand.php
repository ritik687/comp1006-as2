
<?php


$title='Saving Brand';
require 'includes/header.php';

?>

<?php
        try
        {        

                // storing the values entered in the form in variables
                $brandName = $_POST['brandName'];
                // $color = $_POST['color'];

                $ok = true;




            // if(empty(trim($brandName)))
            // {
            //      echo "Brand Name should not be empty";
            //     $ok= false;
                
                
            // }

            if(strlen($brandName) > 100)
            {
               echo "Brand Name should be smaller than 100 characters";
                $ok =false;
            }

            
          

            if($ok==true)
            {
             


                require "includes/database.php";

                    $sql = "INSERT INTO brands(brandName) VALUES(:brandName)";



                    //takes a database connectin and prepare the above sql command
                    $cmd = $db->prepare($sql);


                    // bind the parameter to insert the form input into the name param
                    //populate name field with the matching value from the variable
                    // In order to prevent the sql injection, try to do this one....
                    $cmd->bindParam(':brandName',$brandName,PDO::PARAM_STR,100);
                    // $cmd->bindParam(':color',$color,PDO::PARAM_STR,10);
                    


                     //execute the save operation
                    $cmd->execute();


                     //disconnect
                    // $db = null;


                    // confirmation message
                    $msg =" Information Saved";


                    // used header function to redirect to the location
                    echo '<script>location.href="shoe-form.php";</script>';
            }
        }
        catch(Exception $error)
        {
            header('location:error.php');
        }

?>



<?php
try{
                // storing the values entered in the form in variables
                // $brandName = $_POST['brandName'];
                $color = $_POST['color'];

                // $ok = true;




            
            // if(empty(trim($color)))
            // {
            //     echo "<br>Color field should not be empty";
            //     $ok= false;
            // }

            if(strlen($color) > 100)
            {
                echo "<br>Color field should be smaller than 100 characters";
                $ok=false;
            }



            if($ok==true)
            {
             
                require "includes/database.php";

                    $sql = "INSERT INTO colors(color) VALUES(:color)";



                    //takes a database connectin and prepare the above sql command
                    $cmd = $db->prepare($sql);


                    // bind the parameter to insert the form input into the name param
                    //populate name field with the matching value from the variable
                    // In order to prevent the sql injection, try to do this one....
                    // $cmd->bindParam(':brandName',$brandName,PDO::PARAM_STR,100);
                    $cmd->bindParam(':color',$color,PDO::PARAM_STR,100);
                    


                     //execute the save operation
                    $cmd->execute();


                     //disconnect
                    $db = null;


                    // confirmation message
                    $msg =" Information Saved";
                    echo $msg;

            


                    // used header function to redirect to the location
                    echo '<script>location.href="shoe-form.php";</script>';  
            }

        }

        catch(Exception $error){
            echo '<script>location.href="error.php";</script>';

        }


     ?>
</body>
<?php
   require 'includes/footer.php'
?>
</html>