<?php
require_once 'include/common.php';

if (isset ($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];
} 
?>

<html>
    <body>
        <?php include 'include/header.php' ?>
        Thank you for your purchase. Your order has been placed. <br />
        <br />
        <form>
          <input type="button" value="Continue Shopping" onclick="window.location.href='list-view.php'" />
        </form>
    </body>
</html>
