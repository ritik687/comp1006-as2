
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shoe Details</title>

    <!-- Bootstrap Css link -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Playfair+Display&family=Quintessential&display=swap" rel="stylesheet">
    
    <!-- Custom Css for google fonts -->
    <link rel="stylesheet" type=text/css href="css/shoe-form.css" >

    
</head>
<body>


<a href="shoes.php" class="p-4">View the List
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg>
</a>

<br>
<br>


<a href="brand-form.php"  class="p-4">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg>Go to Brand Form
</a>
        <main class="container">
            <br>
        <h1>Shoe Details</h1>

            
            <!--  one more heading added -->
            <h5 class="alert alert-info">Please complete all fields</h5>


            
            <!-- by default method="get" if we do not use "post" -->
            <form method="post" action="save-shoe.php">

                <!-- first fieldset -->
                <fieldset class="row mb-3">
                    <label for="shoeName" class="col-sm-1 col-form-label">Shoe:</label>

                    <div class="col-sm-3">
                    <input name="shoeName" id="shoeName" class="form-control" required maxlength="100"  placeholder="Name" oninvalid="this.setCustomValidity('Shoe Name is Required')"    oninput="setCustomValidity('')" /> 
                    </div> 
                </fieldset>


                <!-- second fieldset -->
                <fieldset class="row mb-3">
                    <label for="size" class="col-sm-1 col-form-label">Size:</label>

                    <div class="col-sm-3">
                    <input name="size" id="size"  class="form-control" required  type="number"   min="6.5" max="15" step="0.5" placeholder="US only"  oninvalid="this.setCustomValidity('Size is Required')"    oninput="setCustomValidity('')">
                    </div>
                </fieldset>



                <!-- third fieldset -->
                <fieldset class="row mb-3">
                      
                      <legend class="col-form-label col-sm-1 pt-0">Colours:</legend>
                      <div class="col-sm-3">


                      <?php
                    //    $db = new PDO('mysql:host=172.31.22.43;dbname=Ram200495974', 'Ram200495974','y4O4M_hDnR');
                    //    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// debugging

                    require "includes/database.php";

                        // selecting all the columns from the brands
                        // Bonus work
                       $sql ="SELECT * FROM brands ORDER BY color";
                       $cmd =$db->prepare($sql);
                       
                       $cmd->execute();
                       $brands = $cmd->fetchAll();

                       
                    //    echo '<option selected>--Select--</option>';
                       foreach($brands as $brand){

                           echo '<div class="form-check    form-check-inline">'; 
                           echo '<input name= brandId   id=brandId  class="form-check-input"  type= radio  required >';
                           echo '<label for=brandId  class="form-check-label">'.$brand['color'].'</label>';
                           echo '</div>';
                         

                       }
                       $db =null;
                       ?>
 
                     </select>
                 </fieldset>

                       


                

                <!-- fourth fieldset -->
                <fieldset class="row mb-3">
                    <label for="brandId" class="col-sm-1 col-form-label">Brand:</label>

                    <div class="col-sm-3">
                    <select name="brandId" id="brandId" class="form-control form-select" aria-label="Default select example" required>
                      <?php
                       $db = new PDO('mysql:host=172.31.22.43;dbname=Ram200495974', 'Ram200495974','y4O4M_hDnR');
                       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// debugging


                       $sql ="SELECT * FROM brands  ORDER BY brandName";
                       $cmd =$db->prepare($sql);
                       
                       $cmd->execute();
                       $brands = $cmd->fetchAll();

                       
                    //    echo '<option selected>--Select--</option>';
                       foreach($brands as $brand){

                           
                           echo '<option value= "'.$brand['brandId'].'">' .  $brand['brandName'] . '</option>';
                         

                       }
            
                       $db =null;
                      ?>

                    </select>
                    </div>
                </fieldset>
                
                
                <button class="btn btn-primary">Save</button>
                
            </form>


        </main>
        

      
    

</body>

</html>
