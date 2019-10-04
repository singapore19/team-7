<?php

require_once 'include/common.php';
require_once 'include/protect.php';

$dao = new BookDAO();
$result = $dao->retrieveAll();

    
?>

<html>
    <body>
        <?php include 'include/header.php' ; ?>
        
        <h1>Delivery Listing</h1>
        <div class="col-md-6">
          <table class='table table-striped' id='book-list' border='1'>
              <tr>
                  <th>User Name</th>
                  <th>Postal From:</th>
                  <th>Postal To:</th>
                  <th>Date</th>
                  <th>Time (If Applicable)</th>
                  <th>Point of Contact</th>
                  <th>POC Contact Number</th>
              </tr>
  <?php            
          foreach($result as $book) {
              echo "
              <tr>
                  <td>$book->title</td>
                  <td>$book->isbn13</td>
                  <td>$book->price</td>
                  <td><a href='add-to-cart.php?id=$book->isbn13'>add to cart</a></td>
              </tr>
              ";
              
          }
  ?>
          
          </table>
        </div>
    </body>
</html>


