<?php
    $title ='Login';
    require "includes/header.php";
?>

<main  class="form-signin" style="width: 100%; max-width:330px; padding: 15px; margin: auto; padding-top: 100px;">
  <form action="" method="POST">
   
    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="margin-bottom: -1px; border-bottom-right-radius:0; border-bottom-left-radius:0;">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password"  style="margin-bottom: 10px;  border-top-left-radius: 0; border-top-right-radius: 0;" >
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p  class="mt-5 mb-3 text-muted text-center">Not Registered yet? <a href="register.php">Click here</a></p>
  </form>
</main>


    
  </body>
</html>