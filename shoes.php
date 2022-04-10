<?php
    
    $title='Shoes';
    require 'includes/header.php';
?>
    

    <h1 class = "display-4 text-center" ><u>Shoes Collections</u></h1>
    <br>
    <br>

    <div class="d-grid gap-2 col-2  mx-auto">
    <a href="index.php" class="btn btn-info" type="button" >Home Page</a>
    <?php
    // we dont need to call session_start() because we already called it in the header above.
    if(!empty($_SESSION['username'])){
    echo '<a href="brand-form.php" class="btn btn-info" type="button" >Add other brands & colours</a><a href="shoe-form.php" class="btn btn-info" type="button" >Add new FootWear</a>';
    }
    ?>
    
    <br>
    <br>
    </div>
  

    <main class="container">
    <table class="table table-striped table-hover  table-borderless ">
      <thead>
        <tr>
        <?php 
        if(empty($_SESSION['username'])){
            echo ' <th>Shoes</th>
            <th>Size</th>
            <th>Colour</th>
            <th>Brand</th>
            <th></th>'; 
        }
        
            // we dont need to call session_start() because we already called it in the header above.
            if(!empty($_SESSION['username'])){
            echo ' <th style="text-align: center">Shoes</th>
            <th style="text-align: center">Size</th>
            <th style="text-align: center">Colour</th>
            <th style="text-align: center">Brand</th>
            <th style="text-align: center">Images</th>
            <th style="text-align: center">Actions</th>'
            ;
              }
          ?>
        
        </tr>
      </thead>

      <tbody>
          <?php
              //  $db= new PDO('mysql:host=172.31.22.43;dbname=Ram200495974','Ram200495974', 'y4O4M_hDnR');
              try
              {

                
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
                    if(empty($_SESSION['username'])){
                    echo '<tr>
                      <td>' .$shoe['shoeName']. '</td>
                      <td>' .$shoe['size']. '</td>
                      <td>' .$shoe['color']. '</td>
                      <td>' .$shoe['brandName']. '</td>
                      <td>';

                      if(!empty($shoe['image']))
                      {
                        echo '<img src ="imageDirectory/'.$shoe['image'].'" alt="Shoe Image" class="thumb" />';

                      }
                      echo '</td>';


                    }

                      if(!empty($_SESSION['username']))
                      {
                      echo'<tr>
                      <td style="text-align: center">' .$shoe['shoeName']. '</td>
                      <td style="text-align: center">' .$shoe['size']. '</td>
                      <td style="text-align: center">' .$shoe['color']. '</td>
                      <td style="text-align: center">' .$shoe['brandName']. '</td>
                      <td style="text-align:center">';

                      
                      if(!empty($shoe['image']))
                      {
                        echo '<img src ="imageDirectory/'.$shoe['image'].'" alt="Shoe Image" class="thumb" />';

                      }
                      echo '</td>';

                      echo '<td style="text-align: center"> <a href="shoe-form.php?shoeId='. $shoe['shoeId'] . '" 
                      class="btn btn-outline-primary" type="button"  ">Edit</a>
                      
                      <a href="delete-shoe.php?shoeId=' . $shoe['shoeId'] .'" 
                        class="btn btn-outline-danger" type="button"  onclick="return deletingShoes()">Delete</a></td>';
                      }
                      
                      
                      echo '</tr>';
        
                      // <td>' . $shoe['brandId']. '</td> --> this will display the brandId;


                      
                  }
        
                  $db=null;
              }

              catch(Exception $error)
              {
                 header('location:error.php');
              }


          ?>
      </tbody>
      

    
    </table>
    </main> 

</body>
</html>