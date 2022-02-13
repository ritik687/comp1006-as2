<?php
//The Require() function is used to put data of one PHP file to another PHP file. If there any errors then the require() function produces a warning and a fatal error and stops the execution of the script i.e. the script will continue to execute.(https://www.c-sharpcorner.com/UploadFile/051e29/include-and-require-in-php/#:~:text=The%20Require()%20function%20is,script%20will%20continue%20to%20execute.)

// bonus point work
      require "database.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <!-- Bootstrap Css link -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Quintessential&display=swap" rel="stylesheet">
    <!-- Custom Css for google fonts -->
    <link rel="stylesheet" type=text/css href="css/index.css" >

    
</head>
<body>
    <main class="container">
            <h1 class = "display-1  text-white"> PHP FootLocker</h1>
            <p class="lead  text-white-50"> COMP1006-Assignment 1</p>
            <br>
            <br>
            <!-- <p>Check out my top 5 collections <a href="shoes.php">list of Collections</a>!</p>
            <p>Click this link. <a href="brand-form.php">Add your most followed Brand & Color</a> </p>
            <p>Click this link. <a href="shoe-details.php">Add your favourite Footgear</a> </p> -->

            
            <!-- <div class=" d- flex align-items-center justify-content-center">
                <div class="row g-4" >

                  <div>
                    <a class="btn btn-primary" href="brand-form.php" role="a">Add Brands & Colours</a>
                  </div>
                  <div>
                    <a class="btn btn-primary" href="shoe-details.php" role="a">Add FootWear Details</a>
                  </div>
                  <div>
                    <a class="btn btn-primary"href="shoe-details.php" role="a">View the List</a>
                  </div>
                 
                </div>
              </div> -->

              <div class="d-grid gap-4    d-md-auto      col-4">
                <a href="brand-form.php"   class="btn btn-success" type="button">Add Brands & Colours</a>
                <a href="shoe-form.php" class="btn btn-success" type="button">Add FootWear Details</a>
                <a href="shoes.php" class="btn btn-success   btn-lg" type="button">View the List</a>
              </div>

              
    </main>


  

</body>
</html>