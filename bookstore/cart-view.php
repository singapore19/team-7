<?php
require_once 'include/common.php';

if (isset ($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];
} 
?>

<html>
    <body>
        <?php include 'include/header.php' ?>
        
        <div class="container">
        <h1>Shopping Cart</h1>
  <?php            
      if (isset($cart)) {
  ?>
          <div class="row">
            <div class="col-md-6">
              <table class='table table-striped' id='cart-list' border='1'>
                  <tr>
                      <th>No.</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                  </tr>
  <?php
            $count = 1;
            $total = 0.0;
            foreach($cart as $cartItem) {
                $current_book = $cartItem->book;
                $amount = ($current_book->price)*($cartItem->quantity);
                $amount = number_format($amount, 2);
                $total += $amount;
                $total = number_format($total, 2);

                echo "
                <tr>
                    <td>$count</td>
                    <td>$current_book->title</td>
                    <td>$current_book->price</td>
                    <td>$cartItem->quantity</td>
                    <td>$amount</td>
                </tr>
                ";
                
                $count++;
            } // foreach
  ?>
                  <tr>
                      <td colspan="4" align="right">Total</td>
                      <td><?=$total?></td>
                  </tr>
              </table>
            </div> <!-- col-md-6 -->
           </div> <!-- row -->
  <?php
          } else {
            // no cart added yet
            echo "
            <div class='row'>
              <div class='col-md-6 alert alert-info' role='alert'>You have not added anything to the shopping cart.</div>
            </div>
            ";
          }

  ?>
  <?php
        if (isset($book)) {
          echo "
          <div class='row'>
            <div class='col-md-6 alert alert-success' role='alert'>$book->title added to cart</div>
          </div>
          ";
        }
  ?>
        <br \>
          <div class="row">
            <form action="checkout.php">
              <input class="btn btn-primary" type="submit" value="Checkout" />
              <input class="btn btn-primary" type="button" value="Continue Shopping" onclick="window.location.href='list-view.php'" />
            </form>
          </div>
        </div> <!-- container -->
    </body>
</html>
