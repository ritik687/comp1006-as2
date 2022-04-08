<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width= device-width, initial-scale=1.0">

  <!-- we are getting the same title all over the pages, so in order to remove this we are adding the php code to this title tag -->
  <title>PHPLocker | <?php echo $title;?></title>
  <!--  when you did not define the $title variable, it will display the warning in the title  of the page. -->


  <!-- Bootstrap CDN  ( Bootstrap CSS link)  this is just the compiled cached version, so it tend to be faster than local css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  <!-- Google font (link) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif&display=swap" rel="stylesheet">


  <!-- Custom Css for the google font -->
  <link rel="stylesheet" href="css/style.css" >

  <!-- scripts.js  for deletion confirmation -->
  <script src="js/scripts.js" type="text/javascript" defer></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">
    PHP Locker
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link" href="shoes.php">Collection</a>
      </li>
    </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
  </div>
  </div>
</nav>
    

    

