<?php
    $title ='Login';
    require "includes/header.php";
?>

<main  class="form-signin" style="width: 100%; max-width:330px; padding: 15px; margin: auto; padding-top: 100px;">


  <form action="login-validate.php" method="POST">
   
    <h1 class="h3 mb-3 fw-normal text-center">LOGIN</h1>
    <?php
    // click the login in the nav bar, you will see in the url there is no parameter. thats why we use empty....
     if(empty($_GET['invalid']))
     {
         echo '<h6 class ="alert alert-secondary text-center">Please enter your credentials</h6>';
     }        
     else{
         echo '<h6 class ="alert alert-warning text-center">Invalid Login</h6>';
     }
    ?>
    <div class="form-floating">
      <input name="username"type="username" class="form-control" id="username" placeholder="username" style="margin-bottom: -1px; border-bottom-right-radius:0; border-bottom-left-radius:0;">
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input name="password"type="password" class="form-control" id="password" placeholder="Password"  style="margin-bottom: 10px;  border-top-left-radius: 0; border-top-right-radius: 0;" >
      <label for="password">Password</label>
    </div>
    <div class="checkbox mb-3 text-center">
      <label>
        <input  type="checkbox" onclick="showHidePasswordLogin()"> Show Password
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p  class="mt-5 mb-3  text-center">Not Registered yet? <a href="register.php" class="text-white">Click here</a></p>
  </form>
</main>


    
  </body>
  <?php
   require 'includes/footer.php'
?>
</html>