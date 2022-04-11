<?php
    //auth check. this will not give access to the user who has not logged in.
    require 'includes/auth-check.php';
    $title='Shoe Form';
    require 'includes/header.php';
    
    try{
    //check for movieId in the URL. If there is 1, fetch the selected movie from the database for display

    $shoeId = null;
    $shoeName = null;
    $size = null;
    $brandId =null;
    $colorId=null;
    $image =null;


        // if we add a new shoe there will be no shoeId for that purpose we use this if statment or if by chance shoe id is any character.
    if(isset($_GET['shoeId']))
    {
        if(is_numeric($_GET['shoeId']))
        {
                // if we have a number in the URL, store in a variable 
                $shoeId= $_GET['shoeId'];

                require 'includes/database.php';
                $sql ="SELECT * FROM shoes WHERE shoeId = :shoeId";

                $cmd = $db->prepare($sql);
                $cmd->bindParam(':shoeId',$shoeId,PDO::PARAM_INT);

                //execute the deletion
                $cmd->execute(); // this will go to the database and it will try to look up the movie with that primary key value that we can see in our address bar

                // use the PDO fetch command instead of fetchAll as we are getting only one row not many
                $shoe = $cmd->fetch();

                // populate each field from the movies record
                $shoeName = $shoe['shoeName'];
                $size = $shoe['size'];
                
                $brandId = $shoe['brandId'];
                $colorId =$shoe['colorId'];
                $image= $shoe['image'];



                 // disconnect
                 $db ='null';
                 


        }

    }
}

catch(Exception $error)
{
      // an error happened so redirect to the error page 
    header('location:error.php');
}
?>
<body>


<a href="shoes.php" class="p-4" style="color: cyan;">View the List
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg>
</a>

<br>
<br>



<a href="brand-form.php"  class="p-4" style="color: cyan;">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg>Go to Brand Form
</a>
        <main class="container">
            <br>
        <h1 class="headings">Shoe Details</h1>

            
            <!--  one more heading added -->
            <h5 class="alert alert-info">Please complete all fields</h5>


            
            <!-- by default method="get" if we do not use "post" -->
            <form method="post" action="save-shoe.php" enctype="multipart/form-data">

                <!-- first fieldset -->
                <fieldset class="row mb-3">
                    <label for="shoeName" class="col-sm-1 col-form-label headings">Shoe:</label>

                    <div class="col-sm-3">
                    <input name="shoeName" id="shoeName" class="form-control" required maxlength="100"  placeholder="Name" oninvalid="this.setCustomValidity('Shoe Name is Required')"    oninput="setCustomValidity('')"   value="<?php echo $shoeName?>"/> 
                    </div> 
                </fieldset>


                <!-- second fieldset -->
                <fieldset class="row mb-3">
                    <label for="size" class="col-sm-1 col-form-label headings">Size:</label>

                    <div class="col-sm-3">
                    <input name="size" id="size"  class="form-control" required  type="number"   min="6.5" max="15" step="0.5" placeholder="US only"  oninvalid="this.setCustomValidity('Size is Required')"    oninput="setCustomValidity('')"    value="<?php echo $size?>">
                    </div>
                </fieldset>



                <!-- third fieldset -->
                <fieldset class="row mb-3">
                      
                      <legend class="col-form-label col-sm-1 pt-0 headings">Colors:</legend>
                      <div class="col-sm-3">


                      <?php
                     
                    try
                    {
                        require "includes/database.php";

                        // selecting all the columns from the brands
                       
                       $sql ="SELECT * FROM colors";
                       $cmd =$db->prepare($sql);
                       
                       $cmd->execute();
                       $colors = $cmd->fetchAll();

                       
                    //    echo '<option selected>--Select--</option>';
                       foreach($colors as $color)
                       {
                        if($color['colorId'] == $colorId)
                        {

                           echo '<div class="form-check    form-check-inline">'; 
                           echo '<input name= colorId   id=colorId  class="form-check-input"  type= radio  required  value= "'.$color['colorId'].'" checked>';
                         echo '<label for=colorId  class="form-check-label sub-headings">'.$color['color'].'</label>';
                           echo '</div>';
                        }
                        if($color['color']!=null && $color['colorId'] != $colorId){
                            echo '<div class="form-check    form-check-inline">'; 
                            echo '<input name= colorId   id=colorId  class="form-check-input"  type= radio  required value= "'.$color['colorId'].'">';
                            echo '<label for=colorId  class="form-check-label sub-headings">'.$color['color'].'</label>';
                            echo '</div>';

                        }
                         

                       }

                    }

                    catch(Exception $error)
                        {
                            // an error happened so redirect to the error page 
                            echo '<script>location.href="error.php";</script>';
                        }
                    
                       
                       ?>
                       
 
                     </select>
                 </fieldset>

                       


                

                <!-- fourth fieldset -->
                <fieldset class="row mb-3">
                    <label for="brandId" class="col-sm-1 col-form-label headings">Brand:</label>

                    <div class="col-sm-3">
                    <select name="brandId" id="brandId" class="form-control form-select" aria-label="Default select example" required>
                      
                      <?php

                      try{
                        require "includes/database.php";
                       $sql ="SELECT * FROM brands";
                       $cmd =$db->prepare($sql);
                       
                       $cmd->execute();
                       $brands = $cmd->fetchAll();

                       
                    //    echo '<option selected>--Select--</option>';
                       foreach($brands as $brand){

                        if($brand['brandId']==$brandId){
                            echo '<option selected value= "'.$brand['brandId'].'">' .  $brand['brandName'] . '</option>';   
                        } 
                           
                        if($brand['brandId']!=$brandId  && $brand['brandName']!=null){
                           echo '<option value= "'.$brand['brandId'].'">' .  $brand['brandName'] . '</option>';
                            }
                         

                       }
            
                       $db =null;

                    }

                    catch(Exception $error)
                        {
                            // an error happened so redirect to the error page 
                            echo '<script>location.href="error.php";</script>';
                        }
                      ?>

                    </select>
                    </div>
                </fieldset>

                <fieldset class="row mb-3">
                    <label for="image" class="col-sm-1 col-form-label headings">Image:</label>

                    <div class="col-sm-3">
                    <input  type="file" name="image" id="image" class="form-control" accept=".png,.jpg,.jpeg">
                    </div>
                </fieldset>

                
                <!--  if a shoe has a image attached through the browse we can see the image through the edit link. -->
                <?php
                       if(!empty($image))
                       {
                          echo '<fieldset class="row mb-3"><img src ="imageDirectory/'.$image.'" alt="Shoe Image" class="offset-1 thumb"></fieldset>';

                       }
                       ?>

                



                <!-- this line is added will only be visible in the view page source section because the type is hidden 
                And moreover we are going to change the existing shoe, so we need the id of the shoe on the save-shoe.php-->
                <input name="shoeId" id="shoeId" value="<?php echo $shoeId; ?>" type="hidden">


                   <!-- this will prevent the image deleting when we editing the shoe-form without even touching the image.-->
                <input name="currentImage" id="currentImage" value="<?php echo $image;?>" type="hidden">
                
                <?php
                    if(isset($shoeId))
                    {
                        if(is_numeric($shoeId))
                        {
                           echo '<button class=" offset-1  btn btn-warning">Update</button> <a href="shoes.php" class="btn btn-primary ">Cancel</a>'; 
                        }

                         
                             
                        
                    }

                    else{
                        echo '<div><button class=" offset-1   btn btn-warning">Save</button> <a href="shoes.php" class="btn btn-primary ">Cancel</a></div>';


                     
                    }
                ?> 
                
                
            </form>


        </main>
        

      
    

</body>

<?php
   require 'includes/footer.php'
?>

</html>
