<?php
    
    $title='Brand Form';
    require 'includes/header.php';
?>
<a href="shoe-form.php"  class="p-4">Go to Shoe Form
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg>
</a>


<main class="container">
    <br>
<h1>Brand Information</h1>

<h5 class="alert alert-warning">Please complete all fields</h5>

 
        <!--  Required attribute is not used because some brands are already there in the shoe Details form. If we entered the same brand then it might cause mess problem. -->
        <form  method="post" action="save-brand.php" >

            <fieldset class="row mb-3">
                <label for="brandName" class="col-sm-1 col-form-label">Brand:</label>

                <div class="col-sm-3"> 
                    <input name="brandName" id="brandName" placeholder="any brand"  maxlength="100"  required oninvalid="this.setCustomValidity('Brand Name is Required')"    oninput="setCustomValidity('')" >
                    <!-- oninput will see if user enter something then it will not display error message( please enter valid brand)    BONUS POINT WORK-->
                </div>
            
            </fieldset>



            <fieldset class="row mb-3">
                <label for="color" class="col-sm-1 col-form-label">Color:</label>

                <div class="col-sm-3">
                <input name="color" id="color" placeholder="colour"  maxlength="10"  required oninvalid="this.setCustomValidity('Colour  is Required')"    oninput="setCustomValidity('')" >
                </div>
            </fieldset>

        

            <button class="offset-1    btn btn-warning    btn-md    p-2">Save</button>

            

            </main>


        </form>
</body>
</html>