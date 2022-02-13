

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving Brand...</title>
</head>
<body>

<?php
       $brandName = $_POST['brandName'];
       // checking if brand name alreay exist or not
    

  ?>


<?php
                // storing the values entered in the form in variables
                $brandName = $_POST['brandName'];
                $color = $_POST['color'];

                $ok = true;



            // if(empty(trim($brandName)) || strlen($brandName)>100 || (empty(trim($color))) || strlen($color)>10)
            // {
            //     echo "There are already some Brand & Color names added to the shoe details form. If you love other brands or colors, then you can make your choice <br><br> <a href='shoe-form.php'>Click this link to redirect to shoe details form</a>";
                
            //     $ok= false;

            // }

            if(empty(trim($brandName)) || (empty(trim($color)  || strlen($brandName)>100  || strlen($color)>10 )))
            {
                $ok= false;
                header("Location: shoe-form.php"); 

            }

            

           
            




            if($ok==true)
            {
                // //connect to the database
                //     $db = new PDO('mysql:host=172.31.22.43;dbname=Ram200495974','Ram200495974','y4O4M_hDnR');
                //     // if you have an issue connecting database, this is going to print out like a debug trace in your browser
                //     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // //set up the sql insert command to add a new brand and color :this indicates the placeholder


                require "database.php";

                    $sql = "INSERT INTO brands(brandName, color) VALUES(:brandName, :color)";



                    //takes a database connectin and prepare the above sql command
                    $cmd = $db->prepare($sql);


                    // bind the parameter to insert the form input into the name param
                    //populate name field with the matching value from the variable
                    // In order to prevent the sql injection, try to do this one....
                    $cmd->bindParam(':brandName',$brandName,PDO::PARAM_STR,100);
                    $cmd->bindParam(':color',$color,PDO::PARAM_STR,10);
                    


                     //execute the save operation
                    $cmd->execute();


                     //disconnect
                    $db = null;


                    // confirmation message
                    $msg =" Brand Saved";


                    // used header function to redirect to the location
                    header("Location: shoe-form.php");  
            }


     ?>

</body>
</html>