<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

$grand_total = 0;
$promo_discount = 0;
$promo_message = '';

$select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select_cart) > 0){
   while($fetch_cart = mysqli_fetch_assoc($select_cart)){
      $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
      $grand_total += $total_price;
   }
}

if (isset($_POST['apply_promo'])) {
   $promo_code = $_POST['promo_code'];

   if ($promo_code == "PROMO100") {
      $promo_discount = 100;
      $grand_total = max(0, $grand_total - $promo_discount);
      $promo_message = "Promo code applied successfully! You saved Tk.$promo_discount";
   } 
   else if ($promo_code == "PROMO50") {
    $promo_discount = 50;
    $grand_total = max(0, $grand_total - $promo_discount);
    $promo_message = "Promo code applied successfully! You saved Tk.$promo_discount";
   }
    else {
      $promo_message = "Invalid promo code!";
   }
}

// Place the order
if(isset($_POST['order_btn'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = $_POST['number'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
    $placed_on = date('d-M-Y');
 
    $cart_products = [];
 
    // Get all cart items for the order summary
    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($cart_query) > 0){
       while($cart_item = mysqli_fetch_assoc($cart_query)){
          $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
       }
    }
 
    $total_products = implode(', ', $cart_products);
 
    // Get the grand total from the hidden input (to reflect any promo discount)
    $order_total = $_POST['grand_total']; 
 
    // Check if the cart is empty or order already placed
    if($order_total == 0){
       $message[] = 'your cart is empty';
    }else{
       $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$order_total'") or die('query failed');
       
       if(mysqli_num_rows($order_query) > 0){
          $message[] = 'order already placed!'; 
       }else{
          mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$order_total', '$placed_on')") or die('query failed');
          $message[] = 'order placed successfully!';
          mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
          $grand_total = 0;
       }
    }
 }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>checkout</h3>
   <p> <a href="home.php">home</a> / checkout </p>
</div>

<section class="display-order">
   <?php
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo 'Tk.'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
   ?>

   <div class="cartitems-promocode">
       <span>If you have a promo code, enter it here:</span>
       <form method="post">
           <div class="cartitems-promobox">
               <input type="text" name="promo_code" placeholder="promo code" required />
               <button type="submit" name="apply_promo">Apply</button>
           </div>
           <p><?php echo $promo_message; ?></p>
       </form>
   </div>

   <div class="grand-total"> grand total : <span>Tk.<?php echo $grand_total > 0 ? $grand_total : '0'; ?>/-</span> </div>
</section>


<section class="checkout">

<form action="" method="post">
      <h3>place your order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" name="name" required placeholder="enter your name">
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="number" required placeholder="enter your number">
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" required placeholder="enter your email">
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method">
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">credit card</option>
               <option value="paypal">paypal</option>
               <option value="paytm">paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 01 :</span>
            <input type="number" min="0" name="flat" required placeholder="e.g. flat no.">
         </div>
         <div class="inputBox">
            <span>address line 01 :</span>
            <input type="text" name="street" required placeholder="e.g. street name">
         </div>
         <div class="inputBox">
            <span>city :</span>
            <input type="text" name="city" required placeholder="e.g. mumbai">
         </div>
         <div class="inputBox">
            <span>state :</span>
            <input type="text" name="state" required placeholder="e.g. maharashtra">
         </div>
         <div class="inputBox">
            <span>country :</span>
            <input type="text" name="country" required placeholder="e.g. india">
         </div>
         <div class="inputBox">
            <span>pin code :</span>
            <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
         </div>
      </div>
      <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
      <input type="submit" value="order now" class="btn" name="order_btn">
   </form>

</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
