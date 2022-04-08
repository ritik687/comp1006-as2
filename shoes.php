<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Collections</title>
  <!-- Bootstrap Css link -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<!-- Google fonts link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Playfair+Display&family=Quintessential&display=swap" rel="stylesheet">
<!-- Custom Css for google fonts -->
<link rel="stylesheet" type=text/css href="css/shoes.css" >



<!-- javascript used for deletion  -->
<script type="text/javascript" src="js/deletion.js"></script>
</head>
<body>
    <h1 class = "display-4 text-center" ><u>Shoes Collections</u></h1>
    <br>
    <br>

    <div class="d-grid gap-2 col-2  mx-auto">
    <a href="index.php" class="btn btn-info" type="button" >Home Page</a>
    <a href="brand-form.php" class="btn btn-info" type="button" >Add other brands & colours</a>
    <a href="shoe-form.php" class="btn btn-info" type="button" >Add new FootWear</a>
    <br>
    <br>
    </div>
  

    <main class="container">
    <table class="table table-striped table-hover  table-borderless ">
      <thead>
        <tr>
        <th style="text-align: center">Shoes</th>
        <th style="text-align: center">Size</th>
        <th style="text-align: center">Colour</th>
        <th style="text-align: center">Brand</th>
        <th style="text-align: center"> Actions</th>
        </tr>
      </thead>

      <tbody>
          <?php
              //  $db= new PDO('mysql:host=172.31.22.43;dbname=Ram200495974','Ram200495974', 'y4O4M_hDnR');

               require "includes/database.php";

               $sql ="SELECT * FROM shoes INNER JOIN brands ON shoes.brandId = brands.brandId INNER JOIN colors ON shoes.colorId=colors.colorId";
               
              //  in this we are fetching the shoes but also fetching the related brand to each shoe with the help of the primary key that is brandId
              // this INNER JOIN will join one table with the another table based on a foreign key, primary key relationship
    
               $cmd = $db->prepare($sql);
               $cmd->execute();


               //The fetchAll() method allows you to fetch all rows from a result set associated with a PDOStatement object into an array.

               $shoes =$cmd->fetchAll();

               
    
               // loop through the records , new row for each record , new column for each value 
    
               foreach($shoes as $shoe)
               {
                 echo '<tr>
                  <td style="text-align: center">' .$shoe['shoeName']. '</td>
                  <td style="text-align: center">' .$shoe['size']. '</td>
                  <td style="text-align: center">' .$shoe['color']. '</td>
                  <td style="text-align: center">' .$shoe['brandName']. '</td>
                  <td style="text-align: center"> <a href="shoe-form.php?shoeId='. $shoe['shoeId'] . '" 
                  class="btn btn-outline-primary" type="button"  ">Edit</a>
                  
                  <a href="delete-shoe.php?shoeId=' . $shoe['shoeId'] .'" 
                     class="btn btn-outline-danger" type="button"  onclick="return deletingShoes()">Delete</a></td>
                  
                  
                  </tr>';
    
                  // <td>' . $shoe['brandId']. '</td> --> this will display the brandId;


                  
               }
    
               $db=null;


          ?>
      </tbody>
      

    
    </table>
    </main> 

</body>
</html>