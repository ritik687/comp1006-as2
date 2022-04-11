<?php
      $title ='Welcome';
      require 'includes/header.php';

?>
    <!-- <main class="container" >  -->
             <h1 class = "display-1  text-white text-center"> PHP🤍FootLocker</h1>
            <h3 class="lead  text-white-50 text-center " style="font-weight: bold;"> COMP1006-Assignment 2</h3>
            <p class="text-center text-white"><a href="shoes.php" class=" text-white  btn btn-outline-warning btn-lg" >View the List</a></p>
            
           
            <!-- <h4 class="lead text-center mt-3 mb-3">Grid</h4> -->


            <!-- follwing is the carousel that show some kind of animation of images -->
<div class="home container-fluid">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                        <img class="d-block w-100" src="img/imageC-2.jpg" alt="First slide">
                          <div class="carousel-caption d-none d-md-block">
                            <h5>Welcome to PHP😊Locker</h5>
                            <p>This site was built for the COMP1006 using LAMP Stack</p>
                          </div>                
                        </div> 

                          <div class="carousel-item">
                            <img class="d-block w-100" src="img/imageC-3.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                            <h5>Shoes transform your body language and attitude.</h5>
                            <p>Lets click this  to show you whether 404.error is working or not?<a href="something.php" class="btn btn-outline-danger">404</a></p>
                          </div>  
                          </div>

                          <div class="carousel-item">
                            <img class="d-block w-100" src="img/imageC-4.jpg" alt="Third slide">
                          </div>
                    </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only"></span>
                        </a>
                        
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only"></span>
                        </a>
                  </div>
                  
</div>
 
</body>
<?php
   require 'includes/footer.php'
?>


</html>

<!-- <div class="d-grid gap-4    d-md-auto      col-4">
                <a href="brand-form.php"   class="btn btn-success" type="button">Add Brands & Colours</a>
                <a href="shoe-form.php" class="btn btn-success" type="button">Add FootWear Details</a>
                <a href="shoes.php" class="btn btn-success   btn-lg" >View the List</a>
              </div> -->