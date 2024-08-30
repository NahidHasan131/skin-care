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

   <div class="flex">

      <a href="admin_page.php" class="logo"><i class="fa-solid fa-shield-virus"></i>Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php"><i class="fa-solid fa-house-user"></i> home</a>
         <a href="admin_products.php"><i class="fa-solid fa-cart-shopping"></i> products</a>
         <a href="admin_orders.php"><i class="fa-solid fa-truck-fast"></i> orders</a>
         <a href="admin_users.php"><i class="fa-solid fa-user-plus"></i> users</a>
         <a href="admin_contacts.php"><i class="fa-regular fa-comment"></i> messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fa-solid fa-user-gear"></div>

      </div>

      <div class="account-box">
         <p>Username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>New <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>