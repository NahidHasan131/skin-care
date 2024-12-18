<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Consult</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<h1 class="title show-consult-title"><i class="fa-solid fa-prescription"></i> Meet Our Specialist <i class="fa-solid fa-stethoscope"></i></h1>

<!--  Consultant List -->

<section class="show-consult">
   <div class="box-container">   
      <div class="box">
         <img src="./images/dr-female.jpg" alt="">
         <div class="name">Dr. SSS</div>
         <div class="designantion">MBBS, BCS (Health), FCPS (Skin & VD)</div>
         <a href="tel:+88017000000" class="option-btn">Call</a>
         <a href="mailto:someone@example.com" class="delete-btn">Mail Us</a>
      </div>
      <div class="box">
         <img src="./images/dr-female.jpg" alt="">
         <div class="name">Dr. JJJ</div>
         <div class="designantion">Dermatologist</div>
         <a href="tel:+88017000000" class="option-btn">Call</a>
         <a href="mailto:someone@example.com" class="delete-btn">Mail Us</a>
      </div>
      <div class="box">
         <img src="./images/dr-female.jpg" alt="">
         <div class="name">Dr. ZZZ</div>
         <div class="designantion">Skin Specialist</div>
         <a href="tel:+88017000000" class="option-btn">Call</a>
         <a href="mailto:someone@example.com" class="delete-btn">Mail Us</a>
      </div>
      
   </div>

</section>

<!-- Video List -->
<h1 class="title show-consult-title"><i class="fa-solid fa-prescription"></i> Buy Products from Related Video <i class="fa-solid fa-stethoscope"></i></h1>
<section class="Show-video">
    <div class="box-container">
        <div class="box">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/BkRb-TsG9mI?si=RPRpbMaIR3qkUwr-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="box">
        <iframe width="560" height="315"  src="https://www.youtube.com/embed/wFTPf7K71Ww?si=5gms2CYOKfj5sIEE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
    <div class="box-container">
        <div class="box">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/6flEzueaPck?si=O5BkOJYq8ZZHEwu8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="box">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/M3Q4zRhXluw?si=euHq5XoAU-RzHY47" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
    <div class="box-container">
        <div class="box">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/pKsfni_JhJY?si=GiVsoBDA9Ld6pmu2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="box">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/DkIoSnLI4yk?si=2gXCxm7yoR3z3aKN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </div>
    
</section>



<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>