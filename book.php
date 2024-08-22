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
        <a href="cart.php"><i class="fa fa-shopping-cart"></i></a>
</section>
<!-- header section ends -->   


<div class="heading" style="background:url(pic/pic9.jpg) no-repeat"> <!-- pic folder and pic change########-->
    <h1> book now </h1>
    
</div>


<!-- booking section starts -->
<?php
if (isset($_GET['price'])) {
    $price = $_GET['price'];
    echo "The price is $" . htmlspecialchars($price);
} else {
    echo "Price not provided.";
}
?>
<section class="booking">
    <h1 class="heading-title">book your trip</h1>
    <form action="book_form.php" method="post" class="book-form">
        <div class="flex">
            <div class="inputBox">
                <span>First name :</span>
                <input type="text" placeholder="Enter your first name" name="fname">
            </div>

            <div class="inputBox">
                <span>last name :</span>
                <input type="text" placeholder="Enter your last name" name="lname">
            </div>

            <div class="inputBox">
                <span>email :</span>
                <input type="email" placeholder="Enter your email" name="email">
            </div>

            <div class="inputBox">
                <span>phone :</span>
                <input type="number" placeholder="Enter your number" name="phone">
            </div>

            <div class="inputBox">
                <span>address :</span>
                <input type="text" placeholder="Enter your address" name="address">
            </div>

            <div class="inputBox">
                <span>where to :</span>
                <input type="text" placeholder="Enter the place you want to visit" name="location">
            </div>

            <div class="inputBox">
                <span>arrivals :</span>
                <input type="date" name="arrivals">
            </div>

            <div class="inputBox">
                <span>leaving :</span>
                <input type="date" name="leaving">
            </div>
            <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">
        </div>

        <input type="submit" value="submit" class="btn" name="send">
    </form>
</section>
<!-- booking section ends -->

















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
            <a href="#"><i class="fas fa-envelope"></i> fayeezayousuf360@gmail.com </a>
            <a href="#"><i class="fas fa-map"></i> dhaka, bangladesh - 1</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> Facebook </a>
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