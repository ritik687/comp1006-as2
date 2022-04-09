
<?php
    $title ='Registration';
    require "includes/header.php";
?>

<main  class="form-signin" style="width: 100%; max-width:330px; padding: 10px; margin: auto; padding-top: 100px; ">
  <form action="save-registration.php" method="POST">
   
    <h1 class="h3 mb-3 fw-normal text-center text-primary">User Registration</h1>
    
  

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="username" placeholder="username" style="margin-bottom: -1px; border-bottom-right-radius:0; border-bottom-left-radius:0;"  required>
      <label for="username">Username</label>
    </div>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" style="margin-bottom: -1px; border-bottom-right-radius:0; border-bottom-left-radius:0;" >
      <label for="email">Email address</label>
    </div>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="password" placeholder="Password"  style="margin-bottom: 10px;  border-top-left-radius: 0; border-top-right-radius: 0;"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required oninvalid="this.setCustomValidity('Passwords must be a minimum of 8 characters, including one digit, one upper-case letter,and one lower-case letter.')"    oninput="setCustomValidity('')" >
      <label for="password">Password</label>
    </div>

    <div class="form-floating">
      <input name="confirm" type="password" class="form-control" id="confirm" placeholder="Password"  style="margin-bottom: 10px;  border-top-left-radius: 0; border-top-right-radius: 0;"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required oninvalid="this.setCustomValidity('Please match the password')"    oninput="setCustomValidity('')">
      <label for="confirm">Confirm Password</label>
    </div>

    <!-- <div class="form-floating">
      <input name="confirm" type="confirm" class="form-control" id="password" placeholder="Password"  style="margin-bottom: 10px;  border-top-left-radius: 0; border-top-right-radius: 0;" required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
      <label for="password">Confirm Password</label>
    </div> -->

    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <p  class="mt-5 mb-3 text-muted text-center">Already have account?<a href="login.php">Click here</a></p>
    
  </form>
</main>


    
  </body>
</html>