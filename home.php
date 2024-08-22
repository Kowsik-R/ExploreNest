<?php
    include 'DBconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>


    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />



    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   <!-- custom  css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- custom  js file -->
    <script src="js/script.js"></script>
    <script src="js/script.js" type="scripttype"></script>
    <script src="js/script.js" type="text/javascript"></script>

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
        <form action="search.php" method="POST">
            <input type="text" name="search" placeholder="Search">
            <button type="submit" name="submit-search"></button>
        </form>
        <a href="#"><i class="fa fa-search"></i></a>
        <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
</section>
<!-- header section ends -->  

<!-- home section starts --> 

<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">

            <div class="swiper-slide" style="background:url(pic/p8.png) no-repeat">
                <div class="content">
                    <span> explore, discover, travel </span>
                    <h3> travel arround the world </h3>
                    <a href="package.php" class="btn">explore more</a>
                </div>
            </div>

            <div class="swiper-slide" style="background:url(pic/p4.png) no-repeat">
                <div class="content">
                    <span> explore, discover, travel </span>
                    <h3>discover the new places</h3>
                    <a href="package.php" class="btn">explore more</a>
                </div>
            </div>

            <div class="swiper-slide" style="background:url(pic/p5.png) no-repeat">
                <div class="content">
                    <span> explore, discover, travel </span>
                    <h3>make your tour worthwhile</h3>
                    <a href="package.php" class="btn">explore more</a>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".home-slider", {
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    });

    </script>
</section>








<!-- home section ends -->  

<!--services section starts-->

<section class="services">

    <h1 class="heading-title"> our services </h1>

    <div class="box-container">

        <div class="box">
            <img src="pic/hotel1.jpg" alt=""> 
            <h3> hotel </h3>
        </div>

        <div class="box">
            <img src="pic/plane.jpg" alt=""> 
            <h3> flights </h3>
        </div>

        <div class="box">
            <img src="pic/adventure.jpg" alt=""> 
            <h3> adventure </h3>
        </div>

        <div class="box">
            <img src="pic/hikking.jpg" alt=""> 
            <h3> hiking </h3>
        </div>

        <div class="box">
            <img src="pic/pic11.jpg" alt=""> 
            <h3> campfire </h3>
        </div>

        <div class="box">
            <img src="pic/car rental.jpg" alt=""> 
            <h3> car rental </h3>
        </div>

        <div class="box">
            <img src="pic/camping.jpg" alt=""> 
            <h3> camping </h3>
        </div>

        <div class="box">
            <img src="pic/parasailing.jpg" alt=""> 
            <h3> parasailing </h3>
        </div>

        <div class="box">
            <img src="pic/scuba diving.jpg" alt=""> 
            <h3> scubadiving </h3>
        </div>

        <div class="box">
            <img src="pic/pic24.jpg" alt=""> 
            <h3> tour guide </h3>
        </div>
    </div>


</section>
<!--services section ends-->

<!-- home about section starts-->

<section class="home-about">

    <div class="image">
        <img src="pic/pic7.jpg" alt=""> 
    </div>

    <div class="content">
        <h3>about us</h3>
        <p>blah blah</p> <!-- edit ########-->
        <a href="about.php" class="btn">read more</a>
    </div>


</section>
<!-- home about section ends-->

<!--home packages section starts-->

<section class="home-package">

    <h1 class="heading-title">our packages</h1>

    <div class="box-container">

        <div class="box">

            <div class="image">
                <img src="pic/pic10.jpg" alt=""> <!-- photo ########-->
            </div>
            <h3>adventure & tour</h3>
            <p> blah blah </p>  <!-- edit ########-->
            <a href="book.php" class="btn">book now</a>

        </div>
        <div class="box">

            <div class="image">
                <img src="pic/pic11.jpg" alt=""> <!-- photo ########-->
            </div>
            <h3>adventure & tour</h3>
            <p> blah blah </p>  <!-- edit ########-->
            <a href="book.php" class="btn">book now</a>
            
        </div>
    </div>

    <div class="load-more"><a href="package.php" class="btn">load more</a></div>
    

</section>

<!--home packages section ends-->

<!-- home offer section starts -->

<section class="home-offer">
    <div class="content">
        <h3>upto 50% off</h3> 
        <p>blah balh</p> <!-- edit ########-->
        <a href="book.php" class="btn">book now</a>
    </div>
</section>

<!-- home offer section endss -->





























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