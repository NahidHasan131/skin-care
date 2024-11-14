<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p> New <a href="login.php">Login</a> | <a href="register.php">Register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Skin<span><i class="fa-solid fa-user-doctor"></i></span>Care.</a>

         <nav class="navbar">
            <a href="home.php"><i class="fa-solid fa-house-user"></i> home</a>
            <!-- Dropdown menu for "Shop" -->
            <div class="dropdown">
               <a href="shop.php"><i class="fa-solid fa-cart-shopping"></i> shop <i class="fa-solid fa-caret-down"></i></a>
               <div class="dropdown-content">
                     <a href="#">Oily Skin</a>
                     <a href="#">Dry Skin</a>
                     <a href="#">Winter Product</a>
               </div>
            </div>

            <a href="consult.php"><i class="fa-solid fa-notes-medical"></i> Consult</a>
            <a href="contact.php"><i class="fa-solid fa-message"></i> contact</a>
            <a href="orders.php"><i class="fa-solid fa-truck-fast"></i> orders</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fa-solid fa-user-gear"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>

</header>