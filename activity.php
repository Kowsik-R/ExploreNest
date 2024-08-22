<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>


    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>



    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   <!-- custom  css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- custom  js file -->
    <script src="js/script.js" type="scripttype"></script>

    <link rel="stylesheet" href="styles.css?v=1.1">
    

    <!-- shoping cart icon file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<!-- header section starts -->  
<section class="header">
    <a href="home.php" class="logo">ExploreNest</a>
    <nav class="navbar">
        <a href="home.php">home</a>
        <a href="about.php">about</a>
        <a href="package.php">package</a>
        <a href="book.php">book</a>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">custome package</a>
            <div class="dropdown-content">
                <a href="hotel.php">hotels</a>
                <a href="flight.php">flights</a>
                <a href="car_rental.php">car rental</a>
                <a href="tour_guide.php">tour guide</a>
                <a href="activity.php">activities</a>
            </div>
        </li>
        <a href="#"><i class="fa fa-search"></i></a>
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>

</section>
<!-- header section ends -->  

<div class="heading" style="background:url(pic/a1.jpg) no-repeat"> 
    <h1> activities </h1>
    
</div>
<?php
  include 'DBconnect.php';
  $conn = mysqli_connect('localhost', 'root', '', 'ExploreNest');
  $sql = "SELECT * FROM activity";
  $result = mysqli_query($conn, $sql);
  while ($row = $result->fetch_assoc()):
?>
<!-- activity section starts --> 
<section class="activities">
  <div class="box-container">
    <div class="box">
      <div class="image">
        <img src="<?= $row['product_image'] ?>" alt=""> 
      </div>
      <div class="content">
        <h3><?= $row['product_name'] ?></h3>
        <h3><i class="fas fa-dollar-sign"></i><?= $row['product_price'] ?></h3>
        <p>blah blah</p>
        <form action="cart.php" method="post" class="addItem">
          <input type="hidden" name="pname" value="<?= $row['product_name'] ?>">
          <input type="hidden" name="pprice" value="<?= $row['product_price'] ?>">
          <input type="hidden" name="pimage" value="<?= $row['product_image'] ?>">
          <input type="hidden" name="pcode" value="<?= $row['product_code'] ?>">
          <input type="date" name="slots" value="<?= $row['slots'] ?>">
          <input type="submit" value="Add to the cart" class="btn" name="addItem">
        </form>
      </div>
    </div>
  </div>
</section>
<?php endwhile; ?>
<!-- activity section ends -->




         




















<!-- footer section starts-->
<section class="footer">
    <div class="box-container">

        <div class="box">
            <h3>quick links</h3>
            <a href="home.php"><i class="fas fa-angle-right"></i>home</a>
            <a href="about.php"><i class="fas fa-angle-right"></i>about</a>
            <a href="package.php"><i class="fas fa-angle-right"></i>package</a>
            <a href="book.php"><i class="fas fa-angle-right"></i>book</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#"><i class="fas fa-angle-right"></i> ask questions</a>
            <a href="#"><i class="fas fa-angle-right"></i> about us</a>
            <a href="#"><i class="fas fa-angle-right"></i> privacy policy</a>
            <a href="#"><i class="fas fa-angle-right"></i> terms of use</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"><i class="fas fa-phone"></i> *123-456-7890 </a>
            <a href="#"><i class="fas fa-phone"></i> *111-222-3333 </a>
            <a href="#"><i class="fas fa-envelope"></i>fayeezayousuf360@gmail.com </a>
            <a href="#"><i class="fas fa-map"></i> dhaka, bangladesh - 1</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i>Facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> LinkedIn</a>
        </div>

    </div>
    
    <div class="credit"> created by <span> nameeeeeeee </span> | all rights reserved!</div>

</section>

<!-- footer section ends-->





<!-- swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- custom js file link -->
<script src="js/script.js"></script>
</body>
</html>