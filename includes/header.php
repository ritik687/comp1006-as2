
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width= device-width, initial-scale=1.0">

  <!-- we are getting the same title all over the pages, so in order to remove this we are adding the php code to this title tag -->
  <title>PHPLocker | <?php echo $title;?></title>
  <!--  when you did not define the $title variable, it will display the warning in the title  of the page. -->


  <!-- Bootstrap CDN  ( Bootstrap CSS link)  this is just the compiled cached version, so it tend to be faster than local css-->
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  

  <!-- Google font (link) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&display=swap" rel="stylesheet">


  <!-- Custom Css for the google font -->
  <link rel="stylesheet" href="css/style.css" >

  <!-- scripts.js  for deletion confirmation -->
  <script src="js/scripts.js" type="text/javascript" defer></script>

            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  



</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e0c096;">


    
  <div class="container-fluid">
  <?php
               
               // access the current session
              // what we want to find out is if the user is logged in or not
              if(session_status() == PHP_SESSION_NONE){
                session_start();
                }
                if(empty($_SESSION['username']))
                      {
                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                      </svg>';
                      }
                 else{
                   echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                   <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                 </svg>';
                 }
?>
        <!-- <a class="navbar-brand"></a> -->
        <a class="navbar-brand " href="index.php">
          PHPLocker
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

          <ul class="navbar-nav ">
            <li class="nav-item active">
              <a class="nav-link" href="shoes.php">Collection</a>
            </li>
          </ul>

            <ul class="navbar-nav ms-auto gap-1">
              <?php
               
                       // access the current session
                      // what we want to find out is if the user is logged in or not
                      if(session_status() == PHP_SESSION_NONE){
                        session_start();
                        }

                      // if the user is not logged in, user is anonymous we will print register and login links
                      if(empty($_SESSION['username']))
                      {
                        echo' <li class="nav-item">
                        <a class="btn btn-warning nav-link" href="register.php">Register</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn btn-warning nav-link" href="login.php">Login</a>
                      </li>';
                      }

                      else{
                        // if user is logged in, showing their email address in the navigation bar, and also adding the logout link.

                        echo' <li class="nav-item">
                        <a class="btn btn-outline-light nav-link" href="#">'.$_SESSION['username'].'</a>
                      </li>
                      <li class="nav-item">
                        <a class="btn btn-outline-danger nav-link " href="logout.php">Logout</a>
                      </li>';


                      }
              
              
              ?>
             
            </ul>
  </div>
  </div>
</nav>
    

    


