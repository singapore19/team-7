<?php

require_once 'include/common.php';
require_once 'include/protect.php';

// obtain user from session
$user = $_SESSION['user'];

// obtained the cart if available
if (isset ($_SESSION['cart'])) {
  $cart = $_SESSION['cart'];

  // save cartItems to order
  $orderDao = new OrderDAO();
  $order = new Order($user->name, $cart);
  $orderDao->add($order);

  include 'checkout-view.php';
} else {
  // no cart so nothing to checkout
  header('Location: list-view.php'); 

}

unset($_SESSION['cart']);
    
?>

