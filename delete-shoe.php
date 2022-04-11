<?php
    //authentication check. this will not give access to the user who has not logged in.
    require 'includes/auth-check.php';
    $title='Deleting Shoe....';
    require 'includes/header.php';

    try{
            // get the selected shoeId from the url parameter using the $_GET array because get array will show you the shoeId in the URL
            // $shoeId = $_GET['shoeId'];

            if(isset($_GET['shoeId']))
            {
                if (is_numeric($_GET['shoeId'])) 
                {

                    $shoeId = $_GET['shoeId'];

                    // connect
                    // $db = new PDO('mysql:host=172.31.22.43;dbname=Ram200495974', 'Ram200495974', 'y4O4M_hDnR');
                    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    require "includes/database.php";

                    // running the sql delete command
                    $sql = "DELETE FROM shoes WHERE shoeId = :shoeId"; // : the parameters
                    $cmd = $db->prepare($sql);
                    $cmd->bindParam(':shoeId', $shoeId, PDO::PARAM_INT);
                    $cmd->execute();

                    // disconnect
                    $db = null;

                    //show message to the user
                    echo '<h1>Shoe deleted</h1>
                                <a href="shoes.php" class"alert alert-info">Back to Shoe List</a> ';
                                echo '<script>location.href="shoes.php";</script>';
                }

                else{
                    // we have a showId but its not a number
                    echo 'Invalid Shoe'; 
                }

            }

            else{
                // shoeId is missing
                echo 'Invalid Shoe';
            }
    }

    catch(Exception $error)
        {
            // an error happened so redirect to the error page 
            echo '<script>location.href="error.php";</script>';
        }

// redirect again to the page shoes.php
// header('location:shoes.php');
?>
</body>
</html>