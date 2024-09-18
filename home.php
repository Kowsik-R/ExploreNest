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

</head>
<body>
<!-- header section starts -->  
<?php include('design/header.php'); ?>

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
                <img src="pic/pic10.jpg" alt=""> 
            </div>
            <h3>adventure & tour</h3>
            <a href="package.php" class="btn">book now</a>

        </div>
        <div class="box">

            <div class="image">
                <img src="pic/pic11.jpg" alt=""> 
            </div>
            <h3>adventure & tour</h3>
            <a href="package.php" class="btn">book now</a>
            
        </div>
    </div>

    <div class="load-more"><a href="package.php" class="btn">load more</a></div>
    

</section>

<!--home packages section ends-->
<!-- footer section starts-->
<?php include('design/footer.php'); ?>
<!-- footer section ends-->
</body>
</html>